<?php
$sessionId   = $_REQUEST["sessionId"];
$serviceCode = $_REQUEST["serviceCode"];
$phoneNumber = $_REQUEST["phoneNumber"];
$text        = $_REQUEST["text"];



echo "END Your Phone number is: ".$phoneNumber.". Session is: ".$sessionId." You have sent text as: ".$text;
?>