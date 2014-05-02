<?php
	error_reporting(E_ALL ^ E_NOTICE);
	// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css" />
<title>Humane Society Thrift Store of Fairfax</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>



<body>
<!-- Header --!>
<div id="header">
		<img style="float:left" src="logo.png" alt="logo">
		<img style="float:right" src="logo.png" alt="logo">
		<h1 style="margin-bottom:0;text-align: center">Humane Society Thrift Store</h1>
</div>

<!-- Navigation Bar --!>
	<div id="content">
		<ul id="navigation">
		    <li><a href="homepage.php">Homepage</a></li>
		    <li><a href="announcements.php">Announcements</a></li>
			<li><a href="about.php">About The Humane Society Thrift Store</a></li>
			<li><a href="products.php">Products We Have</a></li>
			<li><a href="contact.php">Contact The Humane Society Thrift Store</a></li>
		</ul>
	</div>
    
<!-- Contact Form --!>     
<?php
$submitCheck = $_POST['submit'];
    $nameOfSender = $_POST['nameofSender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $myemail = "lhall16@masonlive.gmu.edu";
$error_message="";
if ((empty($nameOfSender) || empty($email) || empty($subject) || empty($message)) && !empty($submitCheck)){
	$error_message= "Please fill out the form completely to contact us";
	}
	else {
	$error_message="";
//	contactForm();
}
	echo $error_message;
//	contactForm();
	
//	function contactForm(){
?>  
       <form method="post" action="contact.php">
                        <fieldset>
                                <legend>Leave a Message</legend>
                                <labelfor "name"> Name: </label>
<input type="text" name="nameofSender" id="nameofSender"/>

<label for "email"> Email: </label>
<input type="text" name="email" id="email"/>

<label for "subject">Subject:</label>
<input type="text" name="subject" id="subject"/>

<label for "message">Leave a Message:</label>
<textarea height="200px" name="message" id="message"/>


</textarea>

<input type="submit" name="submit" value="submit"/>
</fieldset>
</form>
                
</body>

<!-- User login -->
<?php	
	if (isset($_SESSION['user_email'])) {
		if($_SESSION['user_email']=="admin"){
			echo '<div id="sidebarUserLoggedIn">';
				echo '<fieldset>';
					echo '<legend>User Options</legend>';
					echo '<a href="adminPage.php">Administration Options</a>';
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					echo '<a href="logout.php">Logout</a>';
				echo '</fieldset>';
				echo '</form>	';
			echo '</div>';
		}
		else {	
			echo '<div id="sidebarUserLoggedIn">';
				echo '<fieldset>';
					echo '<legend>User Options</legend>';
					echo '<a href="profile.php">Profile</a>';
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					echo '<a href="logout.php">Logout</a>';
				echo '</fieldset>';
				echo '</form>	';
			echo '</div>';
		}

	}
	else {	
			echo '<form action="login.php" method="POST">';
			echo '<fieldset>';
				echo '<legend>User Login</legend>';
					echo '<label for="username">Username</label>';
					echo ' <input type="text" name="username" id="username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						
					echo '<label for="password">Password</label>';
					echo '<input type="password" name="password" id="password">&nbsp;&nbsp;&nbsp;';
						
					echo '<input type="submit" name="submit" value="submit">';
					
					echo '<br>';
					
					echo '<a href="register.php">New User Registration</a>';
			echo '</fieldset>';
			echo '</form>	';	
			echo '</div>';
	}	
//}
 
 // Assign $_POST to local variables


if (!empty($nameOfSender) && !empty($email) && !empty($subject) && !empty($message) && !empty($submitCheck)){
    
	mail("$myemail","$subject","Name: $nameOfSender\nMessage: $message","From: $email\n");

	echo "Thank you! Your message was sent";
}


 ?>  
 
     <div id="footer">
                <i>
                        The content of this site is the original work of Lindsey Hall and Karen Bacon and
                        intended for educational purposes.<br /> For more information visit:
                        <a href="http://www.gmu.edu/catalog/apolicies/">
                                http://www.gmu.edu/catalog/apolicies</a>
                </i>
	</div>

</body>
</html>


