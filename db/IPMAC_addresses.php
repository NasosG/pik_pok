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

?>