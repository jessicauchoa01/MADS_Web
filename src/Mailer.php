<?php

namespace GoEat;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class Mailer
{
    public static function send(Mailable $object): bool
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'carlosnorte95@gmail.com';
            $mail->Password   = 'sniznzkhxnhsniyk';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
        
            //Recipients
            $mail->setFrom('carlosnorte95@gmail.com', 'GoEat');
            $mail->addAddress($object->getDestination());
   
            //Content
            $mail->isHTML(true);
            $mail->Subject = $object->getSubject();
            $mail->Body    = $object->getBody();
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}