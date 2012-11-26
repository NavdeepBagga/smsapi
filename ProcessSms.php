<?php

class Sms_Processor
{	
    function validNumber()
    {
        //if($number)//preg_match
    }
    function authUser($apikey,$Conn,$Domain)
    {
        $searchFor = $apikey;
        $searchField = "sn";
        $getField = array("cn", "uid");
        $filter = "($searchField=$searchFor)";
        $ldapSearch = ldap_search($Conn, $Domain, $filter, $getField);
	$info = ldap_get_entries($Conn, $ldapSearch);
	return $info["count"];
    }
    function checkSms()
    {
        
    }
}

?>
