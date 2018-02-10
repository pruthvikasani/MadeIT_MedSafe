<?php 
echo "hello";
$command = escapeshellcmd('/temp.py');
$output = shell_exec($command);
echo $output;

?>