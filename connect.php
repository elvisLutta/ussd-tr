<?php
$hostname = "localhost";
$username = "kplc";
$password = "pass";
$connection = @mysql_connect($hostname , $username , $password) or trigger_error(mysql_error() ,E_USER_ERROR);
mysql_select_db("KPLC");
print_r(mysql_error());

?>