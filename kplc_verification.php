<?php
include("connect.php");
//$first_name = "Hal";
//$last_name = "Jordan";
//createStaff($first_name , $last_name);
$id = $_REQUEST['id'];
$result = getStaff($id);
print_r($result);

function createStaff($first_name , $last_name){
	$query = mysql_query("INSERT INTO Staff (first_name , last_name)
		VALUES ('$first_name' , '$last_name')");
	return $query;
}

function getStaff($id){
	$query = mysql_query("SELECT * FROM Staff WHERE id='$id'");

	if (mysql_num_rows($query) > 0){
		$row = mysql_fetch_assoc($query);
	}else {
		$row['id'] = 0;
	}
	return $row;

}
function deleteStaff($id){
	$query = mysql_query("DELETE FROM Staff WHERE id = '$id'");
	return $query;
}
function updateStaff($id){
	$query = mysql_query("UPDATE FROM Staff WHERE id= '$id'");
	return $query;
}
?>