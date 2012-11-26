<?php
//Include database and class file
require_once 'Db.php';
require_once 'ProcessSms.php';

//Create object of class	
$Sms_Process_Obj = new Sms_Processor();
 $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);
    if($_POST['api']) {
$userAuth = $Sms_Process_Obj -> authUser($_POST['api'],$ldapConn,$ldapDomain);
}

print_r($userAuth);

//Define Array
/*$sampleArray = array(
    'gid', 'qid'
);
			
//Calling functions
$surveyId      = $Ques_Process_Obj -> createColumn('surveyls_survey_id', $langTable, 'surveyls_title', $surveyTitle);
$mainTable     = $prefixTable.'survey_'.$surveyId;
$emailId       = $Ques_Process_Obj -> createColumn($sampleArray,$quesTable,'question','Email');
$emailColm     = $surveyId."X".$emailId[0]."X".$emailId[1];
$questionsQid  = $Ques_Process_Obj -> createColumn('qid', $quesTable, 'parent_qid', 0);	
$quesInfo      = $Ques_Process_Obj -> getQuestionInfo($questionsQid, $quesTable);
$columnNames   = $Ques_Process_Obj -> questionColumnCreator($surveyId, $quesInfo, $quesTable);
$displayResult = $Ques_Process_Obj -> displayAnswer($columnNames, $mainTable, $emailColm);

//Display Answers
echo "<pre>";
print_r($columnNames);
print_r($displayResult);
echo "</pre>";	
*/
?>
