<?php
include_once(__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');

$zs = new ZenophSMSGH();
$zs->setUser('tonyankomah1@gmail.com');
$zs->setPassword('Bwz4suzUU8TANcS');

// set other parameters.
$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('KENHASS');
$message = 'Hello {$name1},'."\r\n".' {$name2} has returned to school safely.'."\r\n".' THANK YOU ';
$zs->SetMessage($message);

// add destinations.
$zs->addDestination($number,true, array($name1,$name2));

// send the message.
$response = $zs->sendMessage();


?>