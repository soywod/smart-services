<?php

checkCaptcha('6Ldt2AkUAAAAAIU8I_OIEb-2CdzBd9sLEQmGPMEz', $_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

$to = 'services@smart-services.us';
$subject = 'Prise de contact sur smart-services.us';

$firstName = ucfirst(strtolower($_POST['last-name']));
$lastName = strtoupper($_POST['last-name']);
$company = strtoupper($_POST['company']);
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = strtoupper($_POST['city']);
$phone = $_POST['phone'];
$email = strtolower($_POST['email']);
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

if (! mail($to, $subject, $message, $headers)) {
    echo 'Erreur lors de l\'envoi du mail.';
    exit(1);
}

exit(0);

// ==================== Functions ==================== //

function checkCaptcha($secret, $response, $remoteip) {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=$secret&response=$response&remoteip=$remoteip");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $res = json_decode(curl_exec($curl), true);

    curl_close($curl);

    if ($res['success'] !== true) {
        echo 'Erreur lors de la validation du captcha.';
        exit(2);
    }
}
