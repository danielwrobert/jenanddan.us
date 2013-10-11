<?php

//session_start();

//error checking
if (!empty($_POST)) {

	$error = array();

	//First Name
	if (empty($_POST['name'])) {
		$error['name'] = 'Please enter your name.';
	}
	else if (strlen($_POST['name']) > 50) {
		$error['name'] = 'Name input must be less than 50 characters.';
	}

	//Email
	if (empty($_POST['email'])) {
		$error['email'] = 'Please enter a valid email address.';
	}
	else if (strlen($_POST['email']) < 5) {
		$error['email'] = 'Your email is too short (5 min).';
	}
	else if (strlen($_POST['email']) > 100) {
		$error['email'] = 'Your email is too long (100 max).';
	}

	//NUMBER
	if ((empty($_POST['number'])) || (strlen($_POST['number']) < 0)) {
		$error['number'] = 'Please enter a valid head count.';
	}

	//Send email message after complete form submitted
	if (empty($error)){
			$to_email = 'rsvp@danandjen.us';
			$subject = 'RSVP from:'.$_POST['email']."\r\n";
			$body = 'Name: '.$_POST['name']."\r\n";
			$body .= 'Email: '.$_POST['email']."\r\n";
			$body .= 'Number Attending: '.$_POST['number']."\r\n";
			$body .= 'Message: '.$_POST['message']."\r\n";

			$headers = 'From: rsvp@danandjen.us' . "\r\n" .
					    'Reply-To: rsvp@danandjen.us' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

			mail($to_email, $subject, $body, $headers);

			header('location:contact-confirm.php');
	}
}

//exit;

?>
