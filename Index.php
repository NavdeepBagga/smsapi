<?php
//Include database and class file
require_once 'Db.php';
require_once 'ProcessSms.php';

//Create object of class	
$Sms_Process_Obj = new Sms_Processor();
$numValid = $Sms_Process_Obj -> validNumber($_POST['number']);
$userAuth = $Sms_Process_Obj -> authUser($_POST['api'],$ldapConn,$ldapDomain);
$sendSms = $Sms_Process_Obj -> checkSms('smsaccount',$usersTable,$userAuth,$sendTable,$numValid,$_POST['message']);
echo $sendSms;

?>
