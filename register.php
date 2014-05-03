<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>	

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

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
