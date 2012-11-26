<?php
//Include database and class file
require_once 'Db.php';
require_once 'ProcessSms.php';

//Create object of class	
$Sms_Process_Obj = new Sms_Processor();
$userAuth = $Sms_Process_Obj -> authUser($_POST['api'],$ldapConn,$ldapDomain);
$sendSms = $Sms_Process_Obj -> checkSms('smsaccount',$usersTable,$userAuth,$sendTable,$_POST['number'],$_POST['message']);
echo $sendSms;

?>
