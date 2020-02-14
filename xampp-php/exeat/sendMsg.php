<?php
include_once(__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');

$zs = new ZenophSMSGH();
$zs->setUser('tonyankomah1@gmail.com');
$zs->setPassword('Bwz4suzUU8TANcS');

// set other parameters.
$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('KENHASS');
$message = 'Hello {$name1},'."\r\n".' {$name2} is issued an exeat.'."\r\n".' Reason: {$reason} '."\r\n".'Must return on '.$date_r;
$zs->SetMessage($message);

// add destinations.
$zs->addDestination($number,true, array($name1,$name2,$reason));

// send the message.
$response = $zs->sendMessage();


?>