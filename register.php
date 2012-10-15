<?php
include 'db.php';
$ldaphost = "localhost";
$ldapuser = 'cn=admin,dc=navdeep,dc=bagga';
$ldappass = 'villa';
// Connecting to LDAP
$ldapconn = ldap_connect($ldaphost)
        or die("Could not connect to LDAP server.");
          
// bind LDAP
	//ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    //ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if ($ldapconn) { 
    //echo "Binding ..."; 
    $ldapbind=ldap_bind($ldapconn, 	$ldapuser, $ldappass);     // this is an "anonymous" bind, typically
                           // read-only access
   
    $info["cn"] = "pk";
    $info["sn"] = "Jones";
   
   

    // add data to directory
    $r = ldap_add($ldapconn, "cn=config,ou=Groups,dc=navdeep,dc=bagga", $info);
    if($r) {
		echo "ldapadd";
	}
	else {
		echo "noaddd";
		}
    
}
else
{
echo "ldap is not working";		
}

?>

