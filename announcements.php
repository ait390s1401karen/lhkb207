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

<h2>Announcements</h2>

<?php
//Variable to track ascending or decending state
$rev='desc';
$sort='admin_id';

//Change the value based on what its set to in the GET request
if(isset($_GET['sort']))$sort = $_GET['sort'];
if(isset($_GET['rev']))$rev = $_GET['rev'];

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");
                         
$query = "SELECT * FROM announcements";            

//Sorting loop, Check the GET parameter and sort based on the variable in the sort paramter
if ($sort == 'announcement_id'){
    $query .= " ORDER BY announcement_id";
}
elseif ($sort == 'announcement_title'){
    $query .= " ORDER BY announcement_title";
}
elseif ($sort == 'admin_id'){
    $query .= " ORDER BY admin_id";
}
elseif($sort == 'announcement_date'){
    $query .= " ORDER BY announcement_date";
}
elseif($sort == 'announcement_content'){
    $query .= " ORDER BY announcement_content";
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
echo '<th><a href="announcements.php?sort=announcement_id&rev=' . $rev . '"> &nbsp;Announcement ID&nbsp;</a></th>';
echo '<th><a href="announcements.php?sort=announcement_title&rev=' . $rev . '">&nbsp;Title&nbsp;</a></th>';
echo '<th><a href="announcements.php?sort=admin_id&rev=' . $rev . '">&nbsp;Admin ID&nbsp;</a></th>';
echo '<th><a href="announcements.php?sort=announcement_date&rev=' . $rev . '">&nbsp;Date Submitted&nbsp;</a></th>';
echo '<th><a href="announcements.php?sort=announcement_content&rev=' . $rev . '">&nbsp;Content&nbsp;</a></th>';
echo '</tr>';

// Run the QUERY to extract the data from the database 
$result = mysqli_query($con, $query);

// While loop to populate the different results  
while ($row = mysqli_fetch_array($result)) {
//Create the table and place contents form the database in the appropriate places
    echo '<tr class="results">';
    echo '<td valign="top" width="8%">' . $row['announcement_id'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['announcement_title'] . '</td>';
    echo '<td valign="top" width="11%">' . $row['admin_id'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['announcement_date'] . '</td>';
    echo '<td valign="top" width="6%">' . $row['announcement_content'] . '</td>';
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
