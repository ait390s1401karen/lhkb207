<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="main.css" />
<title>Products</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>

<?php


$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");



                         
        $query = "SELECT category_name, product_description, product_price, product_quantity, products.category_id FROM products, category where category.category_id = products.category_id ORDER BY category_id";

              $result = mysqli_query($con, $query);            


echo "<table border='1'>
<tr>
<th>Category ID</th>
<th>Category Name</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>


</tr> " ;



while ($row = mysqli_fetch_array($result))

 {

echo "<tr>";
echo "<td>" . $row['category_id'] . "</td>";
echo "<td>" . $row['category_name'] . "</td>";
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
