<?php
//$input=getInput();
// $result =  getLevel($text);
// $level = $result['level'];
// $message = $result['latest_message'];
$text=$_REQUEST['text'];
$myLevel = getLevel($text);
$levelUserAt=$myLevel['level'];
$message = $myLevel['latest_message'];
switch ($levelUserAt) {
    case 0:
      $response = getMenu1();
      break;
    case 1:
      $response = getMenu2($message);
      break;
    case 2:
      $response = getMenu3($message);
      break;
    case 3:
      $response = getMenu4($message);
      break;
    default:
     $response = getMenu1();
        break;
}
sendOutput($response,1);
exit;
function getInput(){
  $input=array();
  $input['text']=$_REQUEST['text'];
// $input = array();
// $input['sessionId']   = $_REQUEST["sessionId"];
// $input['serviceCode'] = $_REQUEST["serviceCode"];
// $input['phoneNumber'] = $_REQUEST["phoneNumber"];
// $input['text']        = $_REQUEST["text"];
return $input;
}
 //if ($input['text'] == ""){
   //$response=getMenu1();
 //}else{
  //switch (strtolower($input['text'])){
      //case 1:
      //$response=getMenu2($text);
       //break;
       //case 2;
       //$response=getMenu3($text);
     //}
     //sendOutput($response,1);
function getLevel($text){
  if($text == ""){
    $response['level'] = 0;
  }else{
    $exploded_text = explode('*',$text);
    $response['level'] = count($exploded_text);
    $response['latest_message'] = end($exploded_text);
  }
  return $response;
}
 function getMenu1(){
   $response ="Select 1 or 2".PHP_EOL;
   $response .="1. Motivational Quotes".PHP_EOL;
   $response .="2. Guidance";
  sendOutput($response,1);
 }
 function getMenu2($text){
   switch ($text){
   case 1:
   $response="Select 1 or 2".PHP_EOL;
   $response .="1.Bible Quote".PHP_EOL;
   $response .="2.Motivational";
   sendOutput($response,1);
   break;
   case 2:
   $response=getMenu4($text);
   break;
  }
 }
 function getMenu3($text){
   switch ($text){
     case 1:
   $response="Select 1 or 2".PHP_EOL;
   $response .="1. Life".PHP_EOL;
   $response .="2. Decision Making";
   sendOutput($response,1);
   break;
    case 2:
   $response=getMenu4($text);
   break;
   }
 }
 function getMenu4($text){
   switch ($text){
   case 1:
   $response="Hard work Pays";
   sendOutput($response,2);
   break;
   case 2:
   $response= "Go for what your instinct tells you";
   sendOutput($response,2);
   break;
  }
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
 ?>