<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/autoload.php';

//require ('mailer/class.phpmailer.php');

function send_mail($email,$messag,$subject){

	$mail = new PHPMailer(true);
	
	try {
		include '../../functions.php';
		//Server settings
		$mail->SMTPDebug = 0;      
		$mail->isSMTP();                         
		$mail->Host       = $host;                     
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = $siteemail;                     
		$mail->Password   = $password;                               
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
		$mail->Port       = 465;                                    
	
		//Recipients
		$mail->setFrom($siteemail, $sitename);
		$mail->addAddress($email);       
		$mail->addReplyTo($siteemail, $sitename);
	
		//Content
		$mail->isHTML(true);                                  
		$mail->Subject = $subject;
		$mail->Body    = $messag;
	
		$mail->send();
		// echo 'Message has been sent';
	} catch (Exception $e) {
		// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	}