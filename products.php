<?php
	error_reporting(E_ALL ^ E_NOTICE);
// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();
	}
?>

<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>	

<h2>Product In Stock</h2>
	
<p>Below you may view the available products we currently have in stock. You may search by category or by specific a product.</p>	
<!--Category Search -->
<form action="products.php" method="GET">
	<label for="products"> Product Category: </label>
	<select name="products" id="products">
		<option disabled="disabled" selected="selected">Select:</option>
		<option value="1">Antiques</option>
		<option value="4">Books</option>
		<option value="5">Clothing</option>
		<option value="3">Household Items</option>
		<option value="2">Toys</option>
	</select>
		<input type="submit" name="submit1" value="submit">
</form>
	
<!-- Search Option -->
<form action="search.php" method="GET">
	
		<label for="usersearch">Product Name:</label>
		<input type="text" name="usersearch" id="usersearch">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input type="submit" name="submit" value="submit">
	<br><br>
</form>

<?php
$productChosen = $_GET['products'];
$catName = "";
		
switch($productChosen){
	case 1: $catName = "Antiques";
		break;
	case 2: $catName = "Toys";
		break;
	case 3: $catName = "Household Items";
		break;
	case 4: $catName = "Books";
		break;
	case 5: $catName = "Clothing";
		break;
}

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");

//If user has not selected a category or searched for a product then display all products
if(empty($_GET['products']) && empty($_GET['usersearch'])){	
    $query = "SELECT * from products";
    $result = mysqli_query($con, $query);            

	echo "<table border='1' align='center'>
	<tr>
	<th>Product ID</th>
	<th>Product Name</th>
	<th>Product Price</th>
	<th>Product Quantity</th>
	<th>Category ID</th>
	</tr> " ;

	while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['product_id'] . "</td>";
	echo "<td><a href=./search.php?usersearch=" . $row['product_name'] . ">". $row['product_name'] ."</a></td>";
	echo "<td>" . "$" . $row['product_price'] . "</td>";
	echo "<td>" . $row['product_quantity'] . "</td>";
	echo "<td>" . $row['category_id'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	
}

//If user has selected a category then display all products of that category
if(!empty($_GET['products']) && empty($_GET['usersearch'])){
	echo 'Results for ' . $catName;
	
	$query1 = "SELECT product_name, product_description, category_id FROM products WHERE category_id = '$productChosen'";
    
    $result1 = mysqli_query($con, $query1);            
	
	echo "<table border='1' align='center'>
	<tr>
	<th>Category ID</th>
	<th>Category Description</th>
	<th>Product Name</th>
	</tr> " ;

	while ($row = mysqli_fetch_array($result1)) {
	echo "<tr>";
	echo "<td>" . $row['category_id'] . "</td>";
	echo "<td>" . $catName . "</td>";
	echo "<td>" . $row['product_name'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
}
	
mysqli_close($con);
?>

<html>
</fieldset>

</body>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
