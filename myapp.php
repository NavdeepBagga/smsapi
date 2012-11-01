<?php

include 'db.php';
if ($ldapConn) { 
    $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);
	if($_POST['api']){
		$SearchFor = $_POST['api'];
        $SearchField = "sn";
        $justthese = array("cn", "password");
		$filter = "($SearchField=$SearchFor)";
		$ldapSearch=ldap_search($ldapConn, $ldapDomain, $filter, $justthese);
		$info = ldap_get_entries($ldapConn, $ldapSearch);
		echo $info["count"]." entries returned\n";
		
		
		 for ($x=0; $x<$info["count"]; $x++) {
    $username=$info[$x]['cn'][0];
    
    print "CN is: $username \n"; 
  } 
  
  
	}
}
	
	

/*$query="INSERT INTO sms(message,number) VALUES ('$_POST[message]','$_POST[number]')";
mysql_query($query) or die (mysql_error());
if($query)
{
	echo"message successfully sent";
	}*/
?>
