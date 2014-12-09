<?php
	
	$email_from = 'nigerianhackergroup@hackersociety.com';
	$email_to = 'lymuel.doming@gmail.com';
	$email_subject = 'FACEBOOK HAS BEEN HACKED!!!';
	$email_message = "Hello,";
	$email_message .= "Good day!";
	$email_message .= "This is from a nigerian group of hackers please be sorry for your facebook account has been hacked.";
	$email_message .= "Cheers!";
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);



echo "SENT";

?>