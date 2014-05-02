<?php
// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
</html>		


<?php


$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");



                         
        $query = "SELECT category_name, product_name, products.category_id FROM products, category where category.category_id = products.category_id ORDER BY category_id";

              $result = mysqli_query($con, $query);            


echo "<table border='1'>
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
