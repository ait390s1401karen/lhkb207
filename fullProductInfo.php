<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>	

<?php


$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");

$order = 'category_id';

                         



        $query = "SELECT category_name, product_name, product_description, product_price, product_quantity, products.category_id FROM products, category where category.category_id = products.category_id ORDER BY " . $order;


  $result = mysqli_query($con, $query);            



echo "<table border='1'>
<tr>
<th><a href='?orderBy=category_id'>Category ID</a></th>
<th><a href='?orderBy=category_name'>Category Name</a></th>
<th><a href='?orderBy=product_name'>Product Name</a></th>
<th><a href='?orderBy=product_description'>Product Description</a></th>
<th><a href='?orderBy=product_price'>Price</a></th>
<th><a href='?orderBy=product_quantity'>Quantity</a></th>


</tr> " ;




$orderBy = array('category_id', 'category_name', 'product_name', 'product_description', 'product_price', 'product_quantity');

$order = 'category_id';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}



 $query = "SELECT category_name, product_name, product_description, product_price, product_quantity, products.category_id FROM products, category where category.category_id = products.category_id ORDER BY " . $order;


$result = mysqli_query($con, $query);



while ($row = mysqli_fetch_array($result))

 {

echo "<tr>";
echo "<td>" . $row['category_id'] . "</td>";
echo "<td>" . $row['category_name'] . "</td>";
echo "<td>" . $row['product_name'] . "</td>";

echo "<td>" . $row['product_description'] . "</td>";
echo "<td>" . $row['product_price'] . "</td>";
echo "<td>" . $row['product_quantity'] . "</td>";

echo "</tr>";
}
echo "</table>";






mysqli_close($con);






?>

</body>
</html>

