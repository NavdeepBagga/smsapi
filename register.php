<?php
include 'db.php';
if ($ldapConn) { 
    $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);     
    
    if($_POST){
    //mysql insert
   $insertvalue= mysql_query("INSERT INTO users (firstname, lastname, email, password, gender, dob, phoneno)
	   VALUES ('$_POST[firstname]', '$_POST[lastname]','$_POST[username]', '$_POST[password]', '$_POST[gender]', '$_POST[birthdate]', '$_POST[phone]')");

   if($insertvalue)
   {
	   $result = mysql_query("SELECT id,email,password FROM users");

	   while($row = mysql_fetch_array($result))
		     {
			 $userid=    $row['id']; 
			 $username=    $row['email'];
			 $userpasswd=    $row['password'];
			         }
   }	   
	   //ldap insert	    
    $info["uid"] = $userid;
    $info["sn"] = "singh";
    $info["userpassword"] = $userpasswd;
    $info["objectclass"] = "inetOrgPerson";
    
    // add data to directory
     $ldapAdd = ldap_add($ldapConn, "cn=$username,$ldapDomain", $info);
     
    if($ldapAdd){
	    echo "ADD successfull";
    }
    else { 
	    echo "not ADD "; }
    }
    
}
else
{
echo "ldap is not working";		
}

?>
<form action="register.php" method="post">
Firstname : <input type="text" name="firstname"/>
Lastname : <input type="text" name="lastname"/>
Email : <input type="text" name="username"/>
Password : <input type="password" name="password"/>
Gender : <input type="text" name="gender"/>
Birtdate : <input type="text" name="birthdate"/>
Contact No : <input type="text" name="phone"/>
<input type="submit" name="login"/>
</form>
