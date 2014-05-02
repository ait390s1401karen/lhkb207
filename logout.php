<?php
	session_start();
		if (isset($_SESSION['user_email'])) {
			$username = $_SESSION['user_email'];

			if (isset($_COOKIE[session_name()])) {
				session_destroy();
			}
			
  		setcookie('user_email', '', time() - 3600);

  		echo "Logout successful.  You will now be automatically redirected to the homepage.";
  		header('Refresh: 0; url=homepage.php');

}
?>
