<?php

class Helper
{
    public static function sendEmail($email)
    {
        try {
            require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        } catch(Execption $e) {
            die("Unable to load phpmailer : ".$e->getMessage());
        }
        $mail = new PHPMailer();

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'your mail';                        // SMTP username
        $mail->Password = 'your password';                    // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('contact@php_mvc', 'PHP_MVC');
        $mail->addAddress($email);                      // Add a recipient

        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        //$mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments

        $mail->isHTML(true);                                   // Set email format to HTML

        $mail->Subject = 'Your subject';

        ob_start();
        include("views/mail/mail.html.php");
        $body = ob_get_clean();


        $mail->Body    = $body;

        if(!$mail->send()) {
            echo "<span class='info'> Message could not be sent. </span>";
            echo "<span class='info'> Mailer Error: " . $mail->ErrorInfo . "</span>";
            return FALSE;
        } else {
            return TRUE;
        }
    }
}