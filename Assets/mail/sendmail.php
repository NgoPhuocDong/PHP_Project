<?php
include ("PHPMailer/PHPMailer-master/src/PHPMailer.php");
include ("PHPMailer/PHPMailer-master/src/Exception.php");
include ("PHPMailer/PHPMailer-master/src/OAuthTokenProvider.php");
include ("PHPMailer/PHPMailer-master/src/POP3.php");
include ("PHPMailer/PHPMailer-master/src/SMTP.php");
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer {

public function mailToken($tieude, $noidung, $tomail) {
$mail = new PHPMailer(true);  
$mail->CharSet = 'UTF-8';  
      
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'th4796681@gmail.com';                 // SMTP username
    $mail->Password = 'qalogmgxfwcetfdo';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('th4796681@gmail.com', 'Mailer');
    $mail->addAddress($tomail, 'HP');     // Add a recipient
    $mail->addAddress('phucn1435@gmail.com', 'HP');     // Add a recipient
    $mail->addAddress('quoctai1412@gmail.com', 'HP');
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('th4796681@gmail.com');
    // $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content

    $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = $tieude;
    // $mail->Body    = $noidung;

    $mail->Subject = $tieude;
    $mail->Body = $noidung;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}  
}
}              
?>  