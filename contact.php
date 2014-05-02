<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   <title>Form Contact</title>

</head>

<body> 

<?php

 
 // Assign $_POST to local variables
    $nameOfSender = $_POST['nameofSender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $myemail = "lhall16@masonlive.gmu.edu";
if (!empty($nameOfSender) && !empty($email) && !empty($subject) && !empty($message)){
    

mail("$myemail","$subject","Name: $nameOfSender\nMessage: $message","From: $email\n");

echo "Thank you! Your message was sent. You will be automatically redirected to the homepage.";
header('Refresh: 2; url=homepage.php'); 
}
else {
echo "Please fill out the form completely to contact us";
}
 ?>    
