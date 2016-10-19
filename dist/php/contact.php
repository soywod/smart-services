<?php

$to = 'clementdouin@soywod.fr';
$subject = 'Prise de contact sur smart-services.us';

$message = '<html><body><strong>Contact : </strong>M/Mme ' . $_POST['last-name'] . ' ' . $_POST['first-name'] . "\r\n";
$message .= '<strong>Société : </strong>' . $_POST['company'] . "\r\n";
$message .= '<strong>Adresse : </strong>' . $_POST['address'] . ', ' . $_POST['zip'] . ' ' . $_POST['city'] . "\r\n";
$message .= '<strong>Téléphone : </strong>' . $_POST['phone'] . "\r\n";
$message .= '<strong>Email : </strong>' . $_POST['email'] . "\r\n";
$message .= '<strong>Message : </strong>"' . $_POST['project'] . '"' . "\r\n";
$message .= '</body></html>';

$headers = 'From: ' . $_POST['email'] . "\r\n";
$headers .= 'Reply-To: ' . $_POST['email'] . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
$headers .= 'Reply-To: ' . $_POST['email'] . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

echo mail($to, $subject, $message, $headers);
