<?php
$output = shell_exec("ipconfig");
preg_match_all('/IPv4 Address.*: (\d+\.\d+\.\d+\.\d+)/', $output, $matches);

$ipAddresses = $matches[1];
$server_ip = $ipAddresses[count($ipAddresses)-1];
return [
    'username' => 'yourgamilId@gmail.com', // Replace with Your Gmail address
    'password' => 'XXXX XXXX XXXX XXXX', // Replace with Your Gmail app password
    'server_url' => $server_ip, // Replace with server ip password
];
?>
