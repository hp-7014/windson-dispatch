<?php

require 'mailsend/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'parmarchetan726@gmail.com';                 // SMTP username
$mail->Password = 'chetan@4484';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('parmarchetan726@gmail.com', 'Chetan');
$mail->addAddress('chetancp01@gmail.com');
$mail->addReplyTo('parmarchetan726@gmail.com', 'chetan');

$mail->addAttachment('invoice\carrier_rate_confirmation.pdf');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Send Mail with PDF';
$mail->Body = '<h1>This Mail Send With Attachment</h1>';

if (!$mail->send()) {
    echo 'Mail could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mail has been sent';
}