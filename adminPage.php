<!--Displays top of the website--!>
<?php
// if session not already started, begin one
	if (!isset($_SESSION)){
		session_start();
	}
	
	include 'topOfPage.html';
	
error_reporting(E_ALL ^ E_NOTICE);
$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");

?>

<form action="adminPage.php" method="GET">
<fieldset>
	<label for="adminChose"> Please select a option you would like to edit: </label>
	<select name="adminChose" id="adminChose">
		<option disabled="disabled" selected="selected">Select:</option>
		<option value="ann">Announcement</option>
		<option value="cat">Category</option>
		<option value="prod">Product</option>
		<option value="user">User </option>
	</select>
	
		<input type="submit" name="submit" value="submit">

</fieldset>

<?php
//ANNOUNCEMENTS EDIT
if($_GET['adminChose'] == 'ann'){
	$queryAnnouncements = 'SELECT * from announcements';
	$resultAnnouncements = mysqli_query($con, $queryAnnouncements);

echo '<br>';	
echo '<table border="1" align="center">';
echo '<form method="post" action="adminpage.php">

<tr>
<th>Announcement ID</th>
<th>Admin ID</th>
<th>Announcement Date</th>
<th>Announcement Title</th>
<th>Announcement</th>
</tr> ';

while ($row = mysqli_fetch_array($resultAnnouncements)){    
    echo "<tr>";    
    echo "<td>" . $row['announcement_id'] . "</td>";
    echo "<td>" . $row['admin_id'] . "</td>";
    echo "<td>" . $row['announcement_date'] . "</td>";
    echo "<td>" . $row['announcement_title'] . "</td>";
    echo "<td>" . $row['announcement_content'] . "</td>";        
    echo '</tr>'; 
}
echo '</table>';
?>

<input type="submit1" name="delete" value="Delete Announcement"></td>
<input type="submit2" name="update" value="Update Announcement"></td>
</form>

<br>

<?php
if (isset($_GET['submit1'])){
	echo '<label>Please enter id of announcement you would like to delete</label>';
	echo '<input type="text" name="id">';

    $id = $_POST["id"];

    if (!mysqli_query($con, "DELETE FROM announcements WHERE announcement_id = $id")){
        echo mysqli_error($con);
      }
    else{
        //redirect $_SERVER["REQUEST_URI"];
      }
  }

if (isset($_POST["update"])){
	echo '<label>Please enter id of announcement you would like to update</label>';
	echo '<input type="text" name="id"/>';
    
    $id      = $_POST["id"];
    $title   = $_POST["title"];
    $content = $_POST["content"];
    
    $query11 = 'update announcements set announcement_title="$title",  announcement_content = "$content" where announcement_id = "$id"';
    
    $result = mysqli_query($con, $query11);   
  }

echo '<fieldset>';
echo '<label for="announcement_title">Title</label>';
echo '<input type = "text" name="title"  id="title" />';
echo '<label for="acontent">Announcement</label>';
echo '<input type = "text" name="content"  id="content" />';
echo '<input type= "submit" name="submit" value="Add Announcement"/>';
echo '</fieldset>';

echo '</form>';

if (isset($_POST["submit"])){
    $title   = $_POST["title"];
    $content = $_POST["content"];
     
    $query222 = 'insert into announcements(announcement_date, admin_id, announcement_title, announcement_content) values  ( NOW() , 1,  "$title" , "$content")';
        
    $result = mysqli_query($con, $query222);
  }
}









//CATEGORY EDIT
if($_GET['adminChose'] == 'cat'){
$queryCategories = 'SELECT * FROM category';
$resultCategories = mysqli_query($con, $queryCategories);

echo '<table border="1" align="center">';
echo '<form method="post" action="adminpage.php">

<tr>
<th>Category ID</th>
<th>Category Name</th>
<th>Category Description</th>
</tr> ';

while ($row = mysqli_fetch_array($resultCategories)){           
    echo '<tr>';
    echo '<td> <label name="id">' .  $row["category_id"] . '</td>';
    echo '<td><input type="text" name="catName" size="20" value="' . $row['category_name'] . '"></td>';
    echo '<td><input type="text" name="catDesc" size="30" value="' . $row['category_description'] . '"></td>';
    echo '</tr>';
}

 echo '<input type="submit" name="delete" value="delete category">';
    echo '<input type="submit" name="update" value="update category">';


echo '</table>';

if (isset($_POST["delete"])){
	echo '<label>Please enter id of category you would like to delete</label>';
	echo '<input type="text" name="id"  />';

    $id = $_POST["id"];
     mysqli_query($con, "SET FOREIGN KEY CHECKS = 0");
  


  if (!mysqli_query($con, "DELETE FROM category WHERE category_id = $id"))
      {
        echo mysqli_error($con);
      }
    else
      {
        mysqli_query($con, "SET FOREIGN KEY CHECKS = 1");
      }
}
  


if (isset($_POST["update"]))
  {


echo '<label for="category_Name">Category Name</label>';
echo '<input type = "text" name="catName"  id="catName" />';
echo '<label for="category_desc">Description</label>';
echo '<input type = "text" name="catDesc"  id="catDesc" />';






echo '<label>Please enter id of category you would like to update</label>';
echo '<input type="text" name="id" />';

    
    $id      = $_POST["id"];
    $catName   = $_POST["catName"];
    $catDesc = $_POST["catDesc"];
    
    $query11 = 'update category set category_name="$catName",  category_description = "$catDesc" where category_id = "$id"';
    
    $result = mysqli_query($con, $query11);
    
  }



echo '<fieldset>';


echo '<label for="category_Name">Category Name</label>';
echo '<input type = "text" name="catName"  id="catName" />';
echo '<label for="category_desc">Description</label>';
echo '<input type = "text" name="catDesc"  id="catDesc" />';


echo '<input type= "submit" name="submit" value="Add Category"/>';
echo '</fieldset>';
echo '</form>';
if (isset($_POST["submit"]))
  {
    
    $catName   = $_POST["catName"];
    $catDesc = $_POST["catDesc"];
     
    
    echo '</form>';
    $query222 = 'insert into category(category_name, category_description) values  ( "$catName" , "$catDesc")';
    
    
    $result = mysqli_query($con, $query222);
  }
}



//PRODUCT EDIT
if($_GET['adminChose'] == 'prod'){
$queryProducts = 'SELECT * FROM products';
$resultProducts = mysqli_query($con, $queryProducts);

echo '<table border="1" align="center">';
echo '<form method="post" action="adminpage.php">


<tr>
<th>Product ID</th>
<th>Product Name</th>
<th> Description</th>
<th>Price</th>
<th>Quantity</th>
<th>Category Id</th>
</tr> ';

$i = 0;


while ($row = mysqli_fetch_array($resultProducts))
  {
    
    
    
    
    
    echo '<tr>';
    
    
    echo '<td><label  name="id">' . $row['product_id']  . '</label></td>';
    
    echo '<td><input type="text" name="prodName" size="20" value="' . $row['product_name'] . '"></td>';
    echo '<td><input type="text" name="prodDesc" size="30" value="' . $row['product_description'] . '"></td>';
    echo '<td><input type="text" name="prodPrice" size="8" value="' . $row['product_price'] . '"> </td>';
echo '<td><input type="text" name="qty" size="8" value="' . $row['product_quantity'] . '"></td>';
    echo '<td><input type="text" name="catID" size="8" value="' . $row['category_id'] . '"> </td>';

    
   
    echo '</tr>';

     
  }


echo '<input type="submit" name="update" value="update product">';
       echo '<input type="submit" name="delete" value="delete product">';


echo '</table>';

if (isset($_POST["delete"]))
  {
echo '<label>Please enter id of product you would like to delete</label>';
echo '<input type="text" name="id"  />';

    $id = $_POST["id"];
    if (!mysqli_query($con, "DELETE FROM products WHERE product_id = $id "))
      {
        echo mysqli_error($con);
      }
    else
      {
        //redirect $_SERVER["REQUEST_URI"];
      }
  }

 if (isset($_POST["update"])){   
	echo '<label>Please enter id of product you would like to update</label>';
	echo '<input type="text" name="id"  />';



    $id = $_POST["id"];
    $name = $_POST["prodName"];
    $desc = $_POST["prodDesc"];
    $price = $_POST["prodPrice"];
	$qty = $_POST["qty"];
	$catID = $_POST["catID"];
    
    $query11 = 'update products set product_name="$name",  product_description = "$desc", product_price = "$price", product_quantity = "$qty" where product_id = "$id"';
    
    $result = mysqli_query($con, $query11);
  }
  
echo '<fieldset>';
echo '<label for="prodName">Product Name</label>';
echo '<input type = "text" name="prodName"  id="prodName" />';
echo '<label for="content">Description</label>';
echo '<input type = "text" name="prodDesc"  id="prodDesc" />';
echo '<label for="prodPRice">Product Price</label>';
echo '<input type = "text" name="prodprice"  id="prodprice" />';
echo '<label for="qty">Quantity</label>';
echo '<input type = "text" name="qty"  id="qty" />';
echo '<label for = "catID"> Category ID</label>';
echo '<input type="text" name="catID" id="catID"/>';

echo '<input type= "submit" name="submit" value="Add Product"/>';
echo '</fieldset>';
echo '</form>';
if (isset($_POST["submit"]))
  {
    
    $name  = $_POST["prodName"];
    $desc = $_POST["prodDesc"];
    $price = $_POST["prodprice"];
    $qty= $_POST["qty"];
	$catID = $_POST["catID"];

    
    
    echo '</form>';
    $query222 = 'insert into products(product_name, product_description, product_price, product_quantity, category_ID) values  ($name, $desc, $price, $qty, $catID)';
    
    
    $result = mysqli_query($con, $query222);
  }
}

//USER EDIT
if($_GET['adminChose'] == 'user'){
$queryProfiles = 'SELECT * from userProfiles';
$resultProfiles = mysqli_query($con, $queryProfiles);
}

mysqli_close($con);
?>
</form>
<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
