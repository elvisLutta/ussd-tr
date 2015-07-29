<?php
require_once("connect.php");
//Get information from the gateway eg. phonenumber , and the text that was input
$getsinput = getInput();
$input = $getsinput['text'];
//Get the users level according to their input
$level = getLevel($input);
$leveluserat = $level['level'];
//Gets the last input of the user
$message = $level['latest_message'];
//Get users phonenumber
$phoneNumber = "0".substr(trim($_GET["phoneNumber"]),3,9);


switch ($leveluserat) {
	case 0:
		getHomeMenu();
		break;

	case 1:
		getMenu1($message);
		break;

	case 2:
		getMenu2($message , $phoneNumber);
		break;

	default:
		getHomeMenu();
		break;
}

function getInput(){
	//Declare an array to get input from the user,
	//assign the user a session id, get phone id, and phone no.
	$input = array();
	//$input['sessionId']   = $_REQUEST["sessionId"];
	//$input['serviceCode'] = $_REQUEST["serviceCode"];
	$input['phoneNumber'] = $_REQUEST["phoneNumber"];
	$input['text']        = $_REQUEST["text"];

	return $input;
}

function sendOutput($message,$type=2){
	//Type 1 is a continuation, type 2 output is an end

	if($type==1){
		echo "CON ".$message;
	}elseif($type==2){
		echo "END ".$message;
	}else{
		echo "END We faced an error";
	}
	exit;
}

function getLevel($input){

	if($input == ""){
		$level['level'] = 0;
		}
	else{
		$exploded_text = explode('*', $input);
		$level['level'] = count($exploded_text);
		$level['latest_message'] = end($exploded_text);
		}

	return $level;

}

function createStaff($message , $phoneNumber){

  	$query = mysql_query("INSERT INTO users (username , phonenumber)
  		VALUES ('$message' , '$phoneNumber')");

  	return $query;
}

function getStaff($phoneNumber){
    $query = mysql_query("SELECT * FROM users WHERE phonenumber='$phoneNumber'");

    if (mysql_num_rows($query) > 0) {
        $row = mysql_fetch_assoc($query);
    } else {
      $row['phonenumber'] = 0;
    }

   return $row;

}

function getHomeMenu(){
	$response = "1.Register".PHP_EOL;
	$response .= "2.Retreive Info";
	sendOutput($response , 1);
}

function getHomeMenu2(){

	$phoneNumber = "0".substr(trim($_GET["phoneNumber"]),3,9);
	$result = getStaff($phoneNumber);
	$name = $result['name'];
	$response = "Welcome back ".$name.". Thanks for using our service";
	return $response;


}

function getMenu1($input){
	switch($input){
		case 1:
			$response = "Please enter your names";
			break;

		case 2:
			$result = getStaff($phoneNumber);
			$phonecheck = $result['phoneNumber'];

			if ($phoneNumber == $phonecheck){
				$response = getHomeMenu2();
				sendOutput($response , 2);
				exit();
			}
			$response = "Please register as you aren't in our records";

			break;

		default:
			getHomeMenu();
			break;

	}
	sendOutput($response , 1);

	return $response;
}
function getMenu2($message , $phoneNumber){
	createStaff($message , $phoneNumber);
	sendOutput($response , 1);
	}


?>