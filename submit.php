<?php 
include 'db.php';

$query="INSERT INTO sms(message, number) VALUES ('$_POST[message]', '$_POST[number]')";
mysql_query($query);
echo "message successfully sent";
?>
