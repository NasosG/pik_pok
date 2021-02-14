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

// get MAC address
function getClientsMAC() {
    //$MAC = shell_exec("arp -a ".escapeshellarg($IP)." | grep -o -E '(:xdigit:{1,2}:){5}:xdigit:{1,2}'");
    //$MAC = shell_exec("arp -a ".escapeshellarg($IP));
    //$mac_string = shell_exec("arp -a $IP");
    //$mac_array = explode(" ",$mac_string);
    //$MAC = $mac_array[3];

    // get the MAC address of Client by storing 'getmac' value in $MAC -> not the best method
    // exec() only works in Windows, generally we can't get MAC with complete safety
    // so we don't use these methods in production
    $MAC = exec('getmac');
    /*
     * Updating $MAC value using strtok function, strtok is used to split the string into tokens,
     * space is used as split character of strtok, because getmac returns transport name after MAC address
     * */
    $MAC = strtok($MAC, ' ');
    return $MAC;
}

// get IP address
function getClientsIP() {
    // $IP stores the ip address of client
    return $_SERVER['REMOTE_ADDR'];
}

?>
