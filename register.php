<?php
include 'db.php';
if ($ldapConn) { 
    $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);     
    
    if($_POST){
    //mysql insert

    //ldap insert	    
    $info["cn"] = "yuvraj";
    $info["sn"] = "singh";
    $info["userpassword"] = $_POST['password'];
    $user= $_POST['username'];
    $info["objectclass"] = "inetOrgPerson";
    
    // add data to directory
    $ldapAdd = ldap_add($ldapConn, "uid=$user,$ldapDomain", $info);
    
    if($ldapADD){
	    echo "ADD successfull";
    }
    else { 
	    echo "not ADD "; 
    }
    }
}
else
{
echo "ldap is not working";		
}

?>
<form action="register.php" method="post">
<!--Firstname : <input type="text" name="firstname"/>
Lastname : <input type="text" name="lastname"/>-->
Email : <input type="text" name="username"/>
Password : <input type="password" name="password"/>
<!--Gender : <input type="text" name="gender"/>
Birtdate : <input type="text" name="birthdate"/>-->
<input type="submit" name="login"/>
</form>
