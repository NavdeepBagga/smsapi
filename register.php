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
    
    if($ldapbind){ echo "bind successfull"; }
    else { echo "not bind"; }
    if($_POST){
	    
	    $info["cn"] = "yuvraj";
    $info["sn"] = "singh";
    $info["userpassword"] = $_POST['password'];
$user= $_POST['username'];
    $info["objectclass"] = "inetOrgPerson";
    
    // add data to directory
    $r = ldap_add($ldapconn, "uid=$user,ou=People,dc=XXX,dc=XXX", $info);
    
    if($r){ echo "ADD successfull"; }
    else { echo "not ADD "; }
    }
    
}
else
{
echo "ldap is not working";		
}

?>
<form action="register.php" method="post">
Username : <input type="text" name="username"/>
Password : <input type="password" name="password"/>
<input type="submit" name="login"/>
</form>
