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
        echo "register urself";
	    }
    }
    function checkSms($select1,$select2,$usersTable,$userid,$sendTable,$number,$message,$sender)
    {

      $check = mysql_query("SELECT $select1,$select2 FROM $usersTable WHERE ID='$userid'");
        while($account = mysql_fetch_array($check))
        {
            if($account[$select1] == 0)
            {
                echo "You are left with empty message account";
	        }
	    else {
		 foreach($number as $numbers){   
              $query="INSERT INTO $sendTable(momt,sender,receiver,msgdata,account) VALUES ('MT','$sender','$numbers','$message','$account[ID]')";
		        mysql_query($query) or die (mysql_error());
		        $current = $account['user_status'] - 1;	
			$minus = mysql_query("UPDATE $usersTable SET $select1='$current' WHERE id='$account[ID]'");
		}
                if($query) {
                    echo "message successfully sent";
		        }		    } 
        }
    } 
}

?>
