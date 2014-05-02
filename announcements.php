<?php
	// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();
	}
?>

<!DOCTYPE html>
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
		    <li><a href="homepage.html">Homepage</a></li>
		    <li><a href="announcements.html">Announcements</a></li>
			<li><a href="about.php">About The Humane Society Thrift Store</a></li>
			<li><a href="project1.php">Products We Have</a></li>
			<li><a href="contact.php">Contact The Humane Society</a></li>
		</ul>
</html>				

<?php
$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");



                         
        $query = "SELECT announcement_date, announcement_title, announcement_content FROM announcements ORDER BY announcement_date";

              $result = mysqli_query($con, $query);            


echo "<table border='1'>
<tr>
<th>Announcement Date</th>
<th>Announcement Title</th>
<th>Announcement</th>
</tr> " ;



while ($row = mysqli_fetch_array($result))

 {

echo "<tr>";
echo "<td>" . $row['announcement_date'] . "</td>";
echo "<td>" . $row['announcement_title'] . "</td>";
echo "<td>" . $row['announcement_content'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

<html>
<!-- User login --!>		
    <form action="login.php" method="POST">
    <fieldset>
    <legend>Please Login</legend>   
        <labelfor "loginID">Login</label><br/>        
        <input type="text" name="loginID" id="loginID"><br/>

        <label for "password">Password</label><br/>
        <input type="text" name="password" id="password"><br/>

        <input type="submit" value="login">
    </fieldset>
    </form>
                <p>
                        The content of this site is the original work of Lindsey Hall and Karen Bacon and
                        intended for educational purposes.<br /> For more information visit:
                        <a href="http://www.gmu.edu/catalog/apolicies/">
                                http://www.gmu.edu/catalog/apolicies</a>
                </p>

 
</body>

</html>

