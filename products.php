<?php
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
	
<!-- Search Option -->
<form action="search.php" method="GET">
<fieldset>
			<legend>Product Search</legend>
					<label for="usersearch">Product Search:</label>
					<input type="text" name="usersearch" id="usersearch">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" name="submit" value="submit">
</fieldset>
</form>					


<?php
$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");

        $query = "SELECT category_name, product_name, products.category_id FROM products, category where category.category_id = products.category_id ORDER BY category_id";

              $result = mysqli_query($con, $query);            


echo "<table border='1' align='center'>
<tr>
<th>Category ID</th>
<th>Category Name</th>
<th>Product Name</th>

</tr> " ;

while ($row = mysqli_fetch_array($result))

 {

echo "<tr>";
echo "<td>" . $row['category_id'] . "</td>";
echo "<td>" . $row['category_name'] . "</td>";
echo "<td>" . $row['product_name'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

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
?>
</div>
    
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
