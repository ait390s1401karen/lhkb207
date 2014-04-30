
<?php

$usePass=$_POST['usePass'];
$useFirst=$_POST['useFirst'];
$useLast=$_POST['useLast'];
$useAddress=$_POST['useAddress'];
$useEmail=$_POST['useEmail']; 


$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");


       

$order = "UPDATE userProfiles
SET user_email ='$useEmail', user_password='$usePass', user_firstName='$useFirst', user_lastName='$useLast', user_address='$useAddress' WHERE user_email='$useEmail'"; 




$result1 = mysqli_query($con, $order);


mysqli_close($con);       





?>
