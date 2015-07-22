<?php
$hostname = "localhost";
$username = "luttswxb_test";
$password = "printf(test)";
$connection = @mysql_connect($hostname , $username , $password) or trigger_error(mysql_error() ,E_USER_ERROR);
mysql_select_db("luttswxb_test");
print_r(mysql_error());

?>