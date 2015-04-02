<?php
$hostname_phpimage = "localhost";
$database_phpimage = "login";
$username_phpimage = "root";
$password_phpimage = "";
$phpimage = mysql_connect($hostname_phpimage, $username_phpimage, $password_phpimage) or trigger_error(mysql_errormysql_error(),E_USER_ERROR);
?>