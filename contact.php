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
    if (((empty($nameOfSender)) == true) || ((empty($email)) == true) || ((empty($subject)) == true) || ((empty($email)) == true)){
        echo "Please fill out each form";      
    }
    else{
    
   $message = str_replace("\n.", "\n..", $message);
        $headers = 'From: ' . $email;
  mail (  $email ,  $subject ,  $message , $headers  );
}

echo "Thank you! Your message was sent";

 ?>    
