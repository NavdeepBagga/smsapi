<?php
include 'db.php';
$query = "INSERT INTO sms(message, number) VALUES('$_POST[message]', '$_POST[number]')";
mysql_query($query) or die (mysql_error());
echo "successfully sent";
?>
