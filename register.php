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

<?php
	$dbc = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16") or die ("not connecting");
	if(isset($_POST['submit'])){

		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		$user_email = $_POST["user_email"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$user_address = $_POST["user_address"];

            if(!empty($password) && !empty($password2) && ($password == $password2) && !empty($user_email) && !empty($fname) && !empty($lname) && !empty($user_address)){
			$query = "SELECT user_email FROM userProfiles WHERE user_email= '$user_email'";
		
			$data = mysqli_query($dbc, $query);
			
			if (mysqli_num_rows($data) == 0) {
				$query="INSERT INTO userProfiles (user_email, user_password, user_firstName, user_lastname, user_address) VALUES " . "('$user_email', '$password', '$fname', '$lname', '$user_address'))";
				mysqli_query ($dbc, $query);
				echo 'New Account created';
				mysqli_close ($dbc);
				exit ();
			}
			else {
				echo "User already exists. Enter a new email address to create a new account";
				$user_email = "";
			}
				}
			else if($password != $password2) {
				echo "Passwords do not match.";
			}
			else {
				echo "You must enter all of the sign-up data, including desired password";
			}
		}
	mysqli_close($dbc);
?>

	
<p>Please enter your email address and desired password to register as a new user.</p> <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>
<legend>Registration</legend> <label for="user_email">Email Address:</label>
	<input type="text" id="user_email" name="user_email"
	value="<?php if (!empty($user_email)) echo $user_email; ?>" /> <br />
	<label for="password"> Password:</label>
	<input type="password" id="password" name="password" /> <br />
	<label for="password2"> Password (retype):</label>
	<input type="password" id="password2" name="password2" /> <br />
		<label for="fname"> First name:</label>
	<input type="fname" id="fname" name="fname" /> <br />
		<label for="lname"> Lastname:</label>
	<input type="lname" id="lname" name="lname" /> <br />
		<label for="user_address"> Address:</label>
	<input type="user_address" id="user_address" name="user_address" /> <br />
	
	
</fieldset>
<input type="submit" value="Sign up" name="submit" />
</form>

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
