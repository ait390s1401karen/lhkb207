<?php
// if session not already started, begin one
if (!isset($_SESSION)){
session_start();
}
?>

<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';
?>

<h2>Products</h2>

<?php


$rev='desc';
$sort='product_id';

//Change the value based on what its set to in the GET request
if(isset($_GET['sort']))$sort = $_GET['sort'];
if(isset($_GET['rev']))$rev = $_GET['rev'];



$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");

             



        $query = "SELECT * from products";

if ($sort == 'product_id'){
    $query .= " ORDER BY product_id";
}
elseif ($sort == 'product_name'){
    $query .= " ORDER BY product_name";
}
elseif ($sort == 'product_description'){
    $query .= " ORDER BY product_description";
}
elseif($sort == 'product_price'){
    $query .= " ORDER BY product_price";
}
elseif($sort == 'product_quantity'){
    $query .= " ORDER BY product_quantity";
}
elseif($sort == 'category_id'){
    $query .= " ORDER BY category_id";
}




//Check and switch the sorting order
if($rev == 'asc') {
$query .= ' desc';
$rev = 'desc';
}
else {
$query .= ' asc';
$rev = 'asc';
}


echo '<table border="1">';
echo '<tr>';
echo '<th><a href="fullProductInfo.php?sort=product_id&rev=' . $rev . '"> &nbsp;Product ID&nbsp;</a></th>';
echo '<th><a href="fullProductInfo.php?sort=product_name&rev=' . $rev . '">&nbsp;Product Name&nbsp;</a></th>';
echo '<th><a href="fullProductInfo.php?sort=product_description&rev=' . $rev . '">&nbsp;Description&nbsp;</a></th>';
echo '<th><a href="fullProductInfo.php?sort=product_price&rev=' . $rev . '">&nbsp; Price&nbsp;</a></th>';
echo '<th><a href="fullProductInfo.php?sort=product_quantity&rev=' . $rev . '">&nbsp;Quantity&nbsp;</a></th>';
echo '<th><a href="fullProductInfo.php?sort=category_id&rev=' . $rev . '">&nbsp;Category ID&nbsp;</a></th>';






echo '</tr>';





$result = mysqli_query($con, $query);


// While loop to populate the different results
while ($row = mysqli_fetch_array($result)) {
//Create the table and place contents form the database in the appropriate places
    echo '<tr class="results">';
    echo '<td valign="top" width="8%">' . $row['product_id'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['product_name'] . '</td>';
    echo '<td valign="top" width="11%">' . $row['product_description'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['product_price'] . '</td>';
    echo '<td valign="top" width="6%">' . $row['product_quantity'] . '</td>';
  echo '<td valign="top" width="6%">' . $row['category_id'] . '</td>';




    echo '</tr>';
  
  }
echo '</table>';







mysqli_close($con);






?>
<?php
include 'bottomOfPage.html';
?>	
</html>

