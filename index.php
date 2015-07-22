<?php

//Getting user input
$input = getInput();
//Getting user level
$level =  getLevel($input);
$message = $level['latest_message'];

//Switch through user level to give specific menus
switch ($level) {
    case 0:
    	$response = getHomeMenu();
        break;
    case 1:
    	$response = getLevelOneMenu($message);
    	break;
    case 2:
		$response = getLevelTwoMenu($message);
    	break;
    case 3:
    	$response = getLevelThreeMenu($message);
    default:
    	$response = getHomeMenu();
    	break;
}

function getInput(){
$input = array();
$input['sessionId']   = $_REQUEST["sessionId"];
$input['serviceCode'] = $_REQUEST["serviceCode"];
$input['phoneNumber'] = $_REQUEST["phoneNumber"];
$input['text']        = $_REQUEST["text"];

return $input;

}


function getLevel($text){
  if($text == ""){
    $response['level'] = 0;
  }
  else{
	$exploded_text = explode('*',((string)($text)));
	$response['level'] = count($exploded_text);
	$response['latest_message'] = end($exploded_text);

  }
  return $response;
}

function sendOutput($message,$type=2){
	//Type 1 is a continuation, type 2 output is an end

	if($type==1){
		echo "CON ".$message;
	}
	elseif($type==2){
		echo "END ".$message;
	}
	else{
		echo "END We faced an error";
	}
	exit;
}

function getLevelOneMenu($text){
	switch ($text) {
		case 1:
			$response  = "Send Birth Certificate No.".PHP_EOL;
			break;
		case 2:
		    $response = "Enter your I.D. number:";
		    break;
		default:
      		$response = "We could not understand your response";
			break;
	}
	
    sendOutput($response,1);
    
  return $response;
}

function getLevelTwoMenu($text){
	switch($text){
		case 1:
	      	$response  = "Thankyou for cooperation send picture to www.ussd.lutta.website and pay a small fee of sh.150 to paybill no. 747474";
	      	sendOutput($response, 2);
	      	break;
	    case 2:
	    	$response = "1. Search for I.D.".PHP_EOL;
	    	$response .= "2. Pay for new one.";
       		sendOutput($response,1);
       		break;
   }
   }

function getLevelThreeMenu($input){
	switch($input){
		case 1:
		case 2:
			$response = "Request received we'll get back to you. Thankyou for ur cooperation.";
			sendOutput($input , 2);
			break; 
		default:
			getLevelTwoMenu();
			break;
	}
}

function getHomeMenu(){
  $response  = "1. Register I.D.".PHP_EOL;
  $response  .= "2. Claim Lost I.D.";

  return $response;
}

?>
