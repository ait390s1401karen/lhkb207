<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$useremail=$_SESSION['user_email'];

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");

$newpassword= $_POST['password'];
$newpassword2= $_POST['password1'];
$newfname= $_POST['firstName'];
$newlname=$_POST['lastName'];
$newaddress=$_POST['address'];
if ($newpassword == $newpassword2){
$matchpassword=$newpassword;
}


$updatequery = "UPDATE userProfiles SET user_firstName='$newfname', user_lastName='$newlname', user_address='$newaddress' WHERE user_email='$useremail'";
$updatepass = "UPDATE userProfiles SET user_password='$matchpassword' WHERE user_email='$useremail'";

//Allows user to change password
if(isset($matchpassword)){
$uppass = mysqli_query($con, $updatepass);
echo "Your password has been updated successfully. You will be automatically redirected to your profile page.";
header('Refresh: 2; url=profile.php'); 
}

//Allows user to update profile
if(isset($newfname) && isset($newlname) && isset($newaddress)){
$upprofile = mysqli_query($con, $updatequery);
echo "Your profile has been updated successfully.  You will be automatically redirected to your profile page.";
header('Refresh: 2; url=profile.php'); 
}

?>
