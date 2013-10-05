<?php

//session_start();

//error checking
if (!empty($_POST)){

	$error = array();

	//First Name
	if (empty($_POST['fname'])){
		$error['fname'] = 'Please enter your first name.';
	}
	else if (strlen($_POST['fname']) > 50){
		$error['fname'] = 'First name is too long (50 max).';
	}

	//Last Name
	if (empty($_POST['lname'])){
		$error['lname'] = 'Please enter your last name.';
	}
	else if (strlen($_POST['lname']) > 50){
		$error['lname'] = 'Last name is too long (50 max).';
	}

	//Email
	if (empty($_POST['email'])){
		$error['email'] = 'Please enter your email.';
	}
	else if (strlen($_POST['email']) < 5){
		$error['email'] = 'Your email is too short (5 min).';
	}
	else if (strlen($_POST['email']) > 100){
		$error['email'] = 'Your email is too long (100 max).';
	}


	//Message
	if (empty($_POST['message'])){
		$error['message'] = 'enter a product description';
	}
	else if (strlen($_POST['message']) < 2){
		$error['message'] = 'Your message is too short (2 min).';
	}
	else if (strlen($_POST['message']) > 500){
		$error['message'] = 'message is too long (500 max)';
	}

	//Captcha
	if ($_SESSION['c_verify'] != $_POST['captcha']){
		$error['captcha'] = 'characters do not match';
	}


	//Send email message after complete form submitted
	if (empty($error)){
			$to_email = 'rsvp@danandjen.us';
			$subject = 'RSVP from:'.$_POST['email']."\r\n";
			$body = 'First Name: '.$_POST['fname']."\r\n";
			$body .= 'Last Name: '.$_POST['lname']."\r\n";
			$body .= 'Email: '.$_POST['email']."\r\n";
			$body .= 'Message: '.$_POST['message']."\r\n";

			$headers = 'From: rsvp@danandjen.us' . "\r\n" .
					    'Reply-To: rsvp@danandjen.us' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

			mail ($to_email, $subject, $body, $headers);

			header('location:contact_confirm.php');
	}

}

?>
