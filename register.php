<?php
include 'db.php';
if ($ldapConn) { 
    $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);     
    if($_POST){
		// generate activation key
	    $activation=md5($_POST['username'].$_POST['password']);
	    // insert user input values
        $insertvalue= mysql_query("INSERT INTO users (firstname, lastname, email, password, gender, dob, phoneno, activation)
        VALUES ('$_POST[firstname]', '$_POST[lastname]','$_POST[username]', '$_POST[password]', '$_POST[gender]', '$_POST[birthdate]', '$_POST[phone]', '$activation' )");
        if($insertvalue) {
            $result = mysql_query("SELECT id,email,password,activation FROM users");
            while($row = mysql_fetch_array($result))
    	    {
    		    $userid = $row['id']; 
    		    $username = $row['email'];
    		    $userpasswd = $row['password'];
    		    $activkey = $row['activation'];
            }
            // ldap add    
            $info["uid"] = $userid;
            $info["sn"] = $activkey;
            $info["userpassword"] = $userpasswd;
            $info["objectclass"] = "inetOrgPerson";
            $ldapAdd = ldap_add($ldapConn, "cn=$username,$ldapDomain", $info);
            // send mail
            $to      = $_POST['username'];
            $subject = 'php';
            $message = 'Please click the link below to activate yourself on using smsapi.http://localhost/api/register.php?email='.$to.'&key='.$activkey;
            $headers = 'From: gottarocknow@gmail.com';
            //mail($to, $subject, $message);
            echo "Thank you for registering! A confirmation email has been sent to " . $_POST['username'] . " Please click on the Activation Link to Activate your account";
        }
    }
}
else
{
echo "ldap is not connected";		
}

?>
<form action="register.php" method="post" >
Firstname : <input type="text" name="firstname"/>
Lastname : <input type="text" name="lastname"/>
Email : <input type="text" name="username"/>
Password : <input type="password" name="password"/>
Gender : <input type="text" name="gender"/>
Birtdate : <input type="text" name="birthdate"/>
Contact No : <input type="text" name="phone"/>
<input type="submit" name="login"/>
</form>
