<?php

/**
* This file contains database information  
* Need of customized Survey prefix and title 
*        
* @author      Navdeep Bagga
* @authorEmail admin@navdeepbagga.com
* @category    database information
* @copyright   Copyright (c) June-July Testing and Consultancy Cell (http://www.navdeepbagga.com)
* @license     General Public License
* @version     $Id:Db.php 2012-01-08 $
*/

// Database information
$database = 'navdeep';
$dbHost   = 'localhost';
$dbUser   = 'root';
$dbPass   = 'expDB1';
$connection = mysql_connect ($dbHost, $dbUser, $dbPass);
mysql_select_db ($database, $connection);

$ldapHost = 'localhost';
$ldapLogin = 'cn=admin,dc=exp,dc=server';
$ldapDomain = 'ou=people,dc=exp,dc=server';
$ldapPass = 'navdeepAD';
$ldapConn = ldap_connect($ldapHost)
	or die("Could not connect to LDAP server.");
$ldapBind=ldap_bind($ldapConn, $ldapLogin, $ldapPass);
ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

//Tables
$prefixTable = 'wp_';
$sendTable   = 'send_sms';
$sentTable   = 'sent_sms';
$usersTable  = 'wp_users';
?>
