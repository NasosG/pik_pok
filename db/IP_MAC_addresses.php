<?php

function getBrowser(): array
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser_name = 'Unknown';
    $user_browser = 'Unknown';
    $platform = 'Unknown';
    $is_mobile = false;

    //First get the platform
    $platform_details = getPlatform($platform, $is_mobile, $user_agent);
    $platform = $platform_details[0];
    $is_mobile = $platform_details[1];

    // Next get the name of the user agent separately
    $user_agent_name = getUserAgentName($browser_name, $user_browser, $user_agent);
    $browser_name = $user_agent_name[0];
    $user_browser = $user_agent_name[1];

    // finally get the correct version number
    $version_pattern = getVersion($user_browser, $user_agent);
    $version = $version_pattern[0];
    $pattern = $version_pattern[1];

    return array(
        'is_mobile' => $is_mobile,
        'name' => $browser_name,
        'version' => $version,
        'platform' => $platform,
        'pattern' => $pattern
    );
}

function getPlatform($platform, $is_mobile, $user_agent): array
{
    if (preg_match('/android/i', $user_agent)) {
        $platform = 'android';
        $is_mobile = true;
    } else if (preg_match("/(avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
        $platform = 'non android mobile';
        $is_mobile = true;
    } else if (preg_match('/windows|win32/i', $user_agent)) {
        $platform = 'windows';
    } else if (preg_match('/macintosh|mac os x/i', $user_agent)) {
        $platform = 'mac';
    } else if (preg_match('/linux/i', $user_agent)) {
        $platform = 'linux';
    }

    return array($platform, $is_mobile);
}

function getUserAgentName($browser_name, $user_browser, $user_agent): array
{
    if (preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
        $browser_name = 'Internet Explorer';
        $user_browser = "MSIE";
    } else if (preg_match('/Firefox/i', $user_agent)) {
        $browser_name = 'Mozilla Firefox';
        $user_browser = "Firefox";
    } else if (preg_match('/Chrome/i', $user_agent)) {
        $browser_name = 'Google Chrome';
        $user_browser = "Chrome";
    } else if (preg_match('/Safari/i', $user_agent)) {
        $browser_name = 'Apple Safari';
        $user_browser = "Safari";
    } else if (preg_match('/Opera/i', $user_agent)) {
        $browser_name = 'Opera';
        $user_browser = "Opera";
    } else if (preg_match('/Netscape/i', $user_agent)) {
        $browser_name = 'Netscape';
        $user_browser = "Netscape";
    }

    return array($browser_name, $user_browser);
}

function getVersion($user_browser, $user_agent): array
{
    $known = array('Version', $user_browser, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $user_agent, $matches)) {/* no matching number, just continue*/}

    // how many do we have
    $i = count($matches['browser']);
    if ($i != 1) {
        // we will have two since we are not using 'other' argument yet
        // check if version is before or after the name
        if (strripos($user_agent, "Version") < strripos($user_agent, $user_browser))
            $version = $matches['version'][0];
        else
            $version = $matches['version'][1];
    }
    else $version = $matches['version'][0];

    // check if we have a number
    if ($version == null || $version == "") $version = "?";

    return array($version, $pattern);
}

/**
 * get client's MAC address
 *
 * @return string
 */
function getClientsMAC(): string
{
    // get the MAC address of Client by storing 'getmac' value in $MAC -> not the best method
    // exec() only works in Windows, generally we can't get MAC with complete safety so don't use these methodW in production
    $MAC = exec('getmac');

    // space is used as split character of strtok(splits the string into tokens), because getmac returns transport name after MAC address
    $MAC = strtok($MAC, ' ');
    return $MAC;
}

/**
 * get IP address
 *
 * @return mixed
 */
function getClientsIP() {
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * fetches user's IP and MAC from the database
 *
 * @param string $username
 * @param $con
 * @return array|null
 */
function fetchDatabaseMacAndIP(string $username, $con): ?array
{
    $get_mac = "SELECT mac_address, IP_address FROM ip_mac_addresses WHERE user_name='$username'";
    $result1 = mysqli_query($con, $get_mac) or die("Not able to execute the query");
    return mysqli_fetch_array($result1);
}

/**
 * @param string $username
 * @param $con
 * @return array|null
 */
function fetchDatabaseIP(string $username, $con): ?array
{
    $get_ip = "SELECT IP_address FROM ip_mac_addresses WHERE user_name='$username'";
    $result1 = mysqli_query($con, $get_ip) or die("Not able to execute the query");
    return mysqli_fetch_array($result1);
}

/**
 * save user login, login date and time, user's IP, MAC and user agent details.
 *
 * @param $IP
 * @param $MAC
 * @param $username
 * @param $login_date
 * @param $ua
 * @param $con
 * @return bool|mysqli_result
 */
function saveUserAgentAndLogin($IP, $MAC, $username, $login_date, $ua, $con)
{
    $ua_browser = $ua['name'];
    $ua_OS = $ua['platform'];
    $is_mobile = $ua['is_mobile'];

    $query_ip_mac = "UPDATE ip_mac_addresses 
                     SET  IP_address = '$IP', mac_address = '$MAC', user_name = '$username', login_date = '$login_date', mobile = '$is_mobile', OS = '$ua_OS', browser = '$ua_browser'
                     WHERE user_name='$username' AND IP_address='$IP' AND MAC_address='$MAC'";

    return mysqli_query($con, $query_ip_mac);
}

/**
 * save user login and user agent. This version excludes mac address
 * if mac address isn't needed in table's structure
 *
 * @param $IP
 * @param $username
 * @param $login_date
 * @param $ua
 * @param $con
 * @return bool|mysqli_result
 */
function saveUserAgentIPAndLogin($IP, $username, $login_date, $ua, $con)
{
    $ua_browser = $ua['name'];
    $ua_OS = $ua['platform'];
    $is_mobile = $ua['is_mobile'];

    $query_ip_mac = "UPDATE ip_mac_addresses 
                     SET  IP_address = '$IP', user_name = '$username', login_date = '$login_date', mobile = '$is_mobile', OS = '$ua_OS', browser = '$ua_browser'
                     WHERE user_name='$username' AND IP_address='$IP'";

    return mysqli_query($con, $query_ip_mac);
}
