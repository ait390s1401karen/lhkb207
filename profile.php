<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';

session_start();

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");

    $user = $_SESSION['user_email'];


 
$query = "SELECT * FROM userProfiles WHERE user_email = '$user'";

$result = mysqli_query($con,$query);


   echo "<html>";
    echo "<h2>";
   echo "Edit " . $_SESSION['user_email'] . "Profile information ";
     echo "</h2>";




echo "<table border='1'>";
echo "<form method='post' action='edit.php'>


<tr>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>ADDRESS</th>

</tr> " ;

while ($row = mysqli_fetch_array($result))
 {

echo "<tr>";
echo "<td><input type='text' name='firstName' size='50' value="   . $row['user_firstName'] ."> </td>";

echo "<td><input type='text' name='lastName' size='50' value="  . $row['user_lastName'] . "></td>";
echo '<td> <input type="text" name="address" size="80" value="'  . $row['user_address'] . '"></td>';


echo "</tr>";
}
echo "</table>";
echo "<input type='submit' name='submit' value='Update Profile'>";
echo "</form>";

mysqli_close($con);

echo "<br>";
echo "<br>";

echo "<table border='1'>";
echo "<form method='post' action='edit.php'>


<tr>
<th>PASSWORD</th>
<th>Verify PASSWORD</th>

</tr> " ;
echo "<td> <input type='password' name='password' size='80' value=''></td>";
echo "<td> <input type='password' name='password1' size='80' value=''></td>";

echo "</tr>";
echo "</table>";
echo "<input type='submit' name='submit1' value='Change Password'>";
echo "</form>";
   ?>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
