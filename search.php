<!--Displays top of the website--!>
<?php
	include 'topOfPage.html';

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16") or die ("not connecting");

//Build function for search
function build_query($user_search){
$squery = "SELECT * FROM products";
//clean up the search
$cleanup_search = str_replace(',', ' ', $user_search);
//Explode them out so we can search
$search_for = explode(' ', $cleanup_search);
//Do the actual search by creating an array
$do_search_for = array();
if (count($search_for) > 0){
	foreach ($search_for as $search_pattern) {
		if (!empty($search_pattern)) {
			$do_search_for[] = $search_pattern;
			}
		}
	}

// Create the WHERE clause using the search keywords
$w_list = array();
if (count($do_search_for) > 0) {
	foreach($do_search_for as $search_pattern) {
		$w_list[] = "product_description LIKE '%$search_pattern%'";
		}
	}
$w_clause = implode(' OR ', $w_list);

// Add the keyword WHERE clause to search
    if (!empty($w_clause)) {
      $squery .= " WHERE $w_clause";
    }
return $squery;    
}

//Create the webpage function
//function generate_page($user_search)
  $user_search = $_GET['usersearch'];

  // Start generating the table of results

  // Query to get the total results 
  $query = build_query($user_search);
  $result = mysqli_query($con, $query);

echo '<table border="1" cellpadding="2">';
echo '<tr><th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Product Price</th></tr>';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['product_id'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['product_name'] . '</td>';
    echo '<td valign="top" width="20%">' . $row['product_description'] . '</td>';
    echo '<td valign="top" width="20%">' . '$' . $row['product_price'] . '</td>';

    echo '</tr>';
 }
  echo '</table>';


  mysqli_close($con);
?>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
