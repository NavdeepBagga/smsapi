<?php
include 'db.php';

if(isset($_GET['key']) && ($_GET['email']))
{
    $res = mysql_fetch_array(mysql_query("SELECT activation FROM users WHERE email='$_GET[email]'"));
    if($res['activation'] = $_GET['key']) {
        echo "Your account is now activated ".$_GET['email'];
    }
}

if ($ldapConn) { 
    $ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);
    if ($_POST['email']) {
        $SearchFor = $_POST['email'];
        $SearchField = "cn";
        $justthese = array("cn", "password");
        $filter = "($SearchField=$SearchFor)";
        $ldapSearch = ldap_search($ldapConn, $ldapDomain, $filter, $justthese);
        $info = ldap_get_entries($ldapConn, $ldapSearch);
        if ($info["count"] == 1) {
            header("location: home.php");
        }
    }
}
?>
<form action="login.php" method="post" >
Email : <input type="text" name="email"/>
Password : <input type="password" name="password"/>
<input type="submit" name="login"/>
</form>
