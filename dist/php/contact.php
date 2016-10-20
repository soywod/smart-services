<?php

$to = 'services@smart-services.us';
$subject = 'Prise de contact sur smart-services.us';

$firstName = ucfirst(strtolower($_POST['last-name']));
$lastName = strtoupper($_POST['last-name']);
$company = strtoupper($_POST['company']);
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$project = $_POST['project'];

$message = '<html><body>';
$message .= "<p>Prise de contact sur <a href='http://www.smart-services.us'>smart-services.us</a> :</p>";
$message .= "<ul style='margin: 0;padding: 0;list-style-type: none'>";
$message .= "<li>Mr ou Mme $lastName $firstName</li>";
$message .= "<li>Société $company</li>";
$message .= "<li>$address, $zip $city</li>";
$message .= "<li>$phone</li>";
$message .= "<li><a href='mailto:$email'>$email</a></li>";
$message .= "</ul>";
$message .= "<p><em>&laquo; $project &raquo;</em></p>";
$message .= '</body></html>';

$headers = 'From: ' . $_POST['email'] . "\r\n";
$headers .= 'Reply-To: ' . $_POST['email'] . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
$headers .= 'Reply-To: ' . $_POST['email'] . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

echo mail($to, $subject, $message, $headers);
