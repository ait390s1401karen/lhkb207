<?php
session_start();
	if(!isset($_SESSION['user_email'])){
		
			$user_email = $_POST['username']; 
			$user_password = $_POST['password'];
            
						$dbc = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16") or die ("not connecting");
						
						
					if($user_email == "admin"){	
						//if the user_email and user_password fields are not empty check the database to see if the selected combo is right
						if(!empty($user_email) && !empty($user_password)){
							$query = "SELECT admin_login FROM admin WHERE admin_login = '$user_email' AND admin_password = '$user_password'";
						
							$data = mysqli_query($dbc, $query);
						 				
							if(mysqli_num_rows($data) == 1) {
								$row = mysqli_fetch_array($data);
								$_SESSION['user_email'] = $row['admin_login'];
							          setcookie('user_email', $row['admin_login'], time() + (60 * 60 * 24 * 30));
							          
								echo "Login successful.  You will be redirected automatically to the homepage.";
								header('Refresh: 0; url=homepage.php'); 
							}						
						//else if user_email/user_password combo not correct display error message
						else {
							echo "Invalid user_email/user_password";
?>
							
							<form action="login.php" method="POST">
							<fieldset>
							<legend>User Login</legend>
								<label for="username">user_email</label>
						<input type="text" name="username" id="username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<label for="password">password</label>
						<input type="passowrd" name="password" id="password">&nbsp;&nbsp;&nbsp;
							
						<input type="submit" value="Login">
											
						<ul>
							<li><a href="register.php">New User Registration</a></li>
						</ul>
				</fieldset>
				</form>	
<?php					
						}
						}
		}
		else {
									//if the user_email and user_password fields are not empty check the database to see if the selected combo is right
						if(!empty($user_email) && !empty($user_password)){
							$query = "SELECT user_email FROM userProfiles WHERE user_email = '$user_email' AND user_password = '$user_password'";
						
							$data = mysqli_query($dbc, $query);
						 				
							if(mysqli_num_rows($data) == 1) {
								$row = mysqli_fetch_array($data);
								$_SESSION['user_email'] = $row['user_email'];
							          setcookie('user_email', $row['user_email'], time() + (60 * 60 * 24 * 30));
							          
								echo "Login successful.  You will be redirected automatically to the homepage.";
								 foreach ($logarray as $fields) {
                                            fputcsv($logfile, $fields);
                                                                }
							header('Refresh: 0; url=homepage.php'); 
							}						
						//else if user_email/user_password combo not correct display error message
						else {
							echo "Invalid user_email/user_password";
?>
							
							<form action="login.php" method="POST">
							<fieldset>
							<legend>User Login</legend>
								<label for="username">user_email</label>
						<input type="text" name="username" id="username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<label for="password">password</label>
						<input type="passowrd" name="password" id="password">&nbsp;&nbsp;&nbsp;
							
						<input type="submit" value="Login">
											
						<ul>
							<li><a href="register.php">New User Registration</a></li>
						</ul>
				</fieldset>
				</form>	
<?php					
						}
						}
		}
	}
?>				
