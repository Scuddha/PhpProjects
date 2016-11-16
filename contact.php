<?php 

//!		
//!		This is the contact webpage for my website.  
//!		The form inputs are sanitized with php.
//!		I use inc/phpmailer/class.phpmailer.php to send 
//!		an email to me whenever the form is submitted. 
//!		It is also used validate the form field inputs.
//!		I haven't actually got the email to send, but i 
//!		think i am close.  
//!
//!

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	$name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING));

	if ($name = "" || $email == ""){
		include("inc/header.php");
		echo "<h1>Whoops!! You need to enter a name AND an E-mail!</h1>";
		include("inc/footer.php");

		exit;
	}
	if ($_POST["address"] != "") {
		echo "Bad form input";
		exit;
	}

	require("inc/phpmailer/class.phpmailer.php");

	$mail = new PHPMailer;

	//! Validates email address with php mailer
	if (!$mail->ValidateAddress($email)) {
		echo "Invalid Email";
		exit;
	}


	$email_body = "";
	$email_body .= "Name " . $name . "\n"; 
	$email_body .= "Email " . $email . "\n";

	//! This codeblock sends email with php mailer

	$mail->setFrom('$email', '$name');
	$mail->addAddress('harrettscott@yahoo.com', 'Scuddha');     //! Add a recipient ; Name is optional
	
	$mail->isHTML(false);                                  //! Set email format to HTML

	$mail->Subject = 'Email from Scuddha.com';
	$mail->Body    =  $email_body;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    exit;
	} 
	
	//! sets status after form is filled out
	header("location:contact.php?status=thanks");
}

$pageTitle = "Contact";

include("inc/header.php");
 ?>
<div>
	
	<div>	
		<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
			echo "<h3>Thanks for your interest in my art! I will reach out to you in an e-mail as soon as possible</h3>";
		} else { ?>

		<div id="contactform" class="row centertext">				
			<div class="col-md-4">
				<p>If you are interested in hanging any of my paintings in your business or want to purchase anything to keep for your own, leave your E-mail and I will contact you!</p>
			</div>
			 <div class="col-md-4" id="formfield">	
				<form method="post" action="contact.php">
					<div class="form-group">
						<table>
						<tr>
							<th><label for="name">Name</label></th>
							<td><input type="text" id="name" name="name" class="form-control" /></td>
						</tr>
						<tr>
							<th><label for="email">E-mail</label></th>
							<td><input type="text" id="email" name="email" class="form-control"/></td>
							
						</tr>
						<tr style="display:none">
							<th><label for="address">Address</label></th>
							<td><input type="text" id="address" name="address" />
							<p>please leave this field blank</p></td>
							
						</tr>
						<tr><th><input type="submit" value="send" class="btn btn-secondary"/></th></tr>
						</table>
						
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<p>You can also contact me and check out my bands at <a href="http://scuddiepuff.com/scottharrett.com/">scottharrett.com</a></p>
			</div>	
		</div>	
		<?php } ?>
	</div>
	<div class="mediaimage">
				<a href="img/foureyes.jpg"><img src="img/foureyes.jpg" alt=""></a>
	</div>	
</div>
 	
 <?php include("inc/footer.php"); ?>

