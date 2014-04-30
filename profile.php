<?php




$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");





session_start();
    




    $user = $_POST['loginID'];
    $pass = $_POST['password'];

 
$query1 = "SELECT * FROM userProfiles WHERE user_email = '".$user."' AND user_password = '".$pass."'";

$result = mysqli_query($con,$query1);


if ($result)
{
$_SESSION['logged'] = $user;

   echo "<html>";
    echo "<h1>";
   echo "Edit your Profile information " . $_SESSION['logged'];
     echo "</h1>";



                         
$query = "SELECT *  FROM userProfiles WHERE user_email = '" . $user ."'";

 $result1 = mysqli_query($con, $query);            


echo "<table border='1'>
<tr>
<th>EMAIL </th>
<th>PASSWORD</th>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>ADDRESS</th>

</tr> " ;



while ($row = mysqli_fetch_array($result1))

 {

echo "<tr>";
echo "<td>" . $row['user_email'] . "</td>";
echo "<td>" . $row['user_password'] . "</td>";
echo "<td>" . $row['user_firstName'] . "</td>";

echo "<td>" . $row['user_lastName'] . "</td>";
echo "<td>" . $row['user_address'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);



}

else{
echo "Invalid login";

}





   
  
   ?>
