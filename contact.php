<?php
	error_reporting(E_ALL ^ E_NOTICE);
	// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();	
	}
?>

<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>	

<h2>Contact The Humane Society Thrift Store</h2>
    
<!-- Contact Form --!>     
<?php
$submitCheck = $_POST['submit'];
    $nameOfSender = $_POST['nameofSender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $emailSend = $email;
$error_message="";
if ((empty($nameOfSender) || empty($email) || empty($subject) || empty($message)) && !empty($submitCheck)){
	$error_message= "Please fill out the form completely to contact us";
	}
	else {
	$error_message="";
}
	echo $error_message;
?>  
       <form method="post" action="contact.php">
                        <fieldset>
                                <legend>Leave a Message</legend>
                                <labelfor "name"> Name: </label>
<input type="text" name="nameofSender" id="nameofSender"/>
<br>
<label for "email"> Email: </label>
<input type="text" name="email" id="email"/>
<br>
<label for "subject">Subject:</label>
<input type="text" name="subject" id="subject"/>
<br>
<label for "message">Message:</label><br>
<textarea rows="15" cols="90" name="message" id="message"></textarea><br><br>


</textarea>

<input type="submit" name="submit" value="submit"/>
</fieldset>
</form>
                
</body>

<?php
if (!empty($nameOfSender) && !empty($email) && !empty($subject) && !empty($message) && !empty($submitCheck)){
    
	mail("$emailSend","$subject","Name: $nameOfSender\nMessage: $message","From: $email\n");

	echo "Thank you! Your message was sent";
}
?>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
