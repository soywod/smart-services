<?php

$to = 'clementdouin@soywod.fr';
$subject = 'Prise de contact sur smart-services.us';
$message = '<strong>Contact : </strong>M/Mme ' . $_POST['last-name'] . ' ' . $_POST['first-name'] . "\r\n";
$message .= '<strong>Société : </strong>' . $_POST['company'] . "\r\n";
$message .= '<strong>Adresse : </strong>' . $_POST['address'] . ', ' . $_POST['zip'] . ' ' . $_POST['city'] . "\r\n";
$message .= '<strong>Téléphone : </strong>' . $_POST['phone'] . "\r\n";
$message .= '<strong>Email : </strong>' . $_POST['email'] . "\r\n";
$message .= '<strong>Message : </strong>"' . $_POST['project'] . '"' . "\r\n";

$headers = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$hasBeenSent = mail($to, $subject, $message, $headers);

header('Location: /?sent=' . $hasBeenSent);
