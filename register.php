<?php
include 'db.php';
$ldaphost = "localhost";
$ldapuser = 'cn=admin,dc=XXX,dc=XXX';
$ldappass = 'XXX';
// Connecting to LDAP
$ldapconn = ldap_connect($ldaphost)
        or die("Could not connect to LDAP server.");
          
// bind LDAP
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if ($ldapconn) { 
    $ldapbind=ldap_bind($ldapconn, $ldapuser, $ldappass);     
    $info["cn"] = "pk";
    $info["sn"] = "Jones";
    // add data to directory
    $r = ldap_add($ldapconn, "cn=XXX,ou=XXX,dc=XXX,dc=bagga", $info);
}
else
{
echo "ldap is not working";		
}

?>

