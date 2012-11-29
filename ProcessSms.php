<?php

class Sms_Processor
{	
    function validNumber($number)
    {
        $str= strlen($number);
        if($number == '') {
            echo "Add atleast one recipient";
	}
	elseif($str != 10) {
            echo "You enter wrong mobile number.";
	}
	else {
            $mobNums = explode(",",$number);
	}
    return $mobNums; 
    }
    function authUser($apikey,$ldapConn,$ldapDomain)
    {
        $searchFor = $apikey;
        $searchField = "sn";
        $getField = array("cn", "uid");
        $filter = "($searchField=$searchFor)";
        $ldapSearch = ldap_search($ldapConn, $ldapDomain, $filter, $getField);
        $info = ldap_get_entries($ldapConn, $ldapSearch);
        if($info["count"] == 1) {
	        for ($x=0; $x<$info["count"]; $x++) {
                $user = $info[$x]['uid'][0];
            }
        return $user;
	    }
	    else {
            print_r("register urself");
	    }
    }
    function checkSms($select,$usersTable,$userid,$sendTable,$number,$message)
    {
        $check = mysql_query("SELECT $select FROM $usersTable WHERE id='$userid'");
        while($account = mysql_fetch_array($check))
        {
            if($account['smsaccount'] == 0)
            {
                echo "You are left with empty message account";
	        }
	    else {
		foreach($number as $numbers){    
                $query="INSERT INTO $sendTable(momt,sender,receiver,msgdata,boxc_id) VALUES ('MT','$userid','$numbers','$message','mysqlbox')";
		        mysql_query($query) or die (mysql_error());
		        $current = $account['smsaccount'] - 1;	
			$minus = mysql_query("UPDATE $usersTable SET $select='$current' WHERE id='$userid'");
		}
                if($query) {
                    echo "message successfully sent";
		        }
		    }
        }
    }
}

?>
