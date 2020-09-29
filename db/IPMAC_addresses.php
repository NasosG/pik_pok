<?php
// PHP program to get IP address of client 
$IP = $_SERVER['REMOTE_ADDR']; 
  
// $IP stores the ip address of client 
// echo "Client's IP address is: $IP"; 
  
// Print the ip address of client 

// PHP code to get the MAC address of Client 
$MAC = exec('getmac'); 
  
// Storing 'getmac' value in $MAC 
$MAC = strtok($MAC, ' '); 
  
// Updating $MAC value using strtok function,  
// strtok is used to split the string into tokens 
// split character of strtok is defined as a space 
// because getmac returns transport name after 
// MAC address    
// echo "MAC address of client is: $MAC"; 

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";
    $is_mobile = false;

    //First get the platform?
	if (preg_match('/android/i', $u_agent)) {
        $platform = 'android';
        $is_mobile = true;
    }
	else if (preg_match("/(avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $u_agent)) {
        $platform = 'non android mobile';
        $is_mobile = true;
    }
	else if (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
	else if (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    else if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    else if(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    else if(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    else if(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    else if(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    else if(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version = $matches['version'][0];
        }
        else {
            $version = $matches['version'][1];
        }
    }
    else {
        $version = $matches['version'][0];
    }
   
    // check if we have a number
    if ($version == null || $version == "") {$version = "?";}
   
    return array(
    	'is_mobile' => $is_mobile,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

// now try it
//$ua = getBrowser();

// lines below for debugging purposes
// $yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] ;
// print_r($yourbrowser);



?>