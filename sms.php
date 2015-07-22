<?php
//RECEIVE THE SMS,PHONE, MESSAGE
//SEND BACK A MESSAGE TO THE NUMBER THAT SENT US T
/*
$linus = array('name' =>'Linus' ,'staff_id' => 5 );
$bob = array('name' => 'Bob','staff_id' => 6);
$workers= array($linus , $bob);

$staff = array();
*/

/*$payload = array('task' => 'send' , 'secret' => '');
    $reply = array();

    $messages = array('to' => 0711847121 , 'messages' => 'hi');

    array_push($reply['messages'] , $messages);
    array_push($payload , $reply);*/

   /* $sms_sync_json='{
    "payload": {
        "task": "send",
        "secret": "secret_key",
        "messages": [
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "aada21b0-0615-4957-bcb3"
            },
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "1ba368bd-c467-4374-bf28"
            },
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "95df126b-ee80-4175-a6fb"
            }
        ]
    }';*/




/*
$elv = array('name' => 'Emerald','staff_id' =>33 );
$s = json_encode($elv);


print_r($sup);*/



$reply = "Thank you for your sms and have a good day.";

sendSmsOutput($sms['from'], $reply);

$sms = getSmsInput();
print_r($sms);

exit;



function getSmsInput(){
	$sms['from'] = $_REQUEST['from'];
	$sms['message'] = $_REQUEST['message'];

	return $sms;
}

function sendSmsOutput($to,$message){
  $payload['payload'] = array('task'=>'send','secret'=>'');

  $messages = array('to'=>$to,'message'=>$message);

  //array_push($reply['messages'],$message1);
  $payload['payload']['messages'] = $messages;
  header('content-type: application/json; charset=utf-8');
	echo json_encode($payload);
  //array_push($payload['payload'],$reply);
  // print_r($payload);
  exit;

}


?>



