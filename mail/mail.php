<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
 function sendEmail($email,$name)
{
	global $hsmtp, $usmtp, $psmtp, $posmtp, $fsmtp;
  $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = $hsmtp;
    $mail->SMTPAuth = true;
    $mail->Username = $usmtp;
    $mail->Password = $psmtp;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $posmtp;

    //Recipients
   $mail->setFrom($fsmtp, 'Open Minds Club');
   $mail->addAddress($email);
  // Add attachments
 $mail->AddEmbeddedImage('mail/logo1.png', 'omc.png');
 $mail->AddEmbeddedImage('mail/logo2.png', 'arduino.png');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Arduino Set Up';
    $mail->Body    = '<!DOCTYPE html>
                      <html lang="fr">
                        <head>
                        <meta charset="utf-8"/></head><body>
                        <div style="text-align:center;font-family:Verdana;font-size:22px;color:black;">Félicitations, ' .$name.' !<br/>
                          Votre <strong style="color:red;">pré-inscription</strong> a été enregistrée avec succès !
                          Veuillez vérifier votre boîte mail à la fin de la période d’inscriptions, pour savoir si vous êtes séléctionné(e)s pour cette édition du « <strong style="color:orange;">Arduino Set Up </strong>».
                          <br/><br/><br/>
                          Amicalement, Open Minds Club.<br/><br/><br/><br/>
                          <img src="cid:omc.png" style="width:144px;height:120px;" />&nbsp;&nbsp;&nbsp;<img src="cid:arduino.png" style="width:210px;height:140px;" /></div>
                          </body></html>';

    $mail->send();

} catch (Exception $e) {}
}
