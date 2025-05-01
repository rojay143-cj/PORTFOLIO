<?php
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

try {
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Username = 'support@airtech.sg';
  $mail->Host = 'airtech.sg';
  $mail->Password = 'Emi;]d+3]}N8';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->SMTPOptions = [
    'ssl' => [
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true,
    ],
  ];
  

  $mail->setFrom($email, $name);
  $mail->addAddress('rojaymerlin@gmail.com', "Chris");
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $message;

  $mail->send();

  echo 'Email sent successfully';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>