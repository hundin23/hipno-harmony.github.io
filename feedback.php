<?php
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 1;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "k.totoonova@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "qwerty34";

$mail->CharSet = 'UTF-8';

//Set who the message is to be sent from
$mail->setFrom('k.totoonova@gmail.com', $_POST['name']);
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$recepient = "k.totoonova@gmail.com";
$sitename = "Гипнотерапия";

$mail->addAddress($recepient, $_POST["name"]);
//Set the subject line
$mail->Subject = "Новая заявка с сайта \"$sitename\"";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$message ="Новая заявка с сайта \"$sitename\"";
$postEmail = $_POST['email'];
$postName = $_POST['name'];
$postMessage = $_POST['message'];
$message.= "Имя: $postName \nТелефон: $postEmail \nТекст: $postMessage";

$mail->msgHTML($message);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>﻿
