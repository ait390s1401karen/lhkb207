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

<html>
<div id="bodyContainer">
		<h2>Welcome to the Humane Society Thrift Store website!</h2>
		<p>The Humane Society of Fairfax County depends upon the proceeds of our thrift store to assist with the substantial and ever-increasing costs of medical care for our rescued animals.
Additionally, this funding helps support the general feeding and care of the animals while they await their new loving families.

When you are in the mood for Spring cleaning or if you have occasion to go through that attic or storage room, please keep us in
mind and donate your well-cared for wares. Household items, toys, books and [clean] clothing that can be sold without repair are greatly appreciated.
And when you drop off your donations, take a moment to browse the thrift store for fine collectibles, antiques, or other treasures.

We hope to see you soon at our shop!</p>
	
	<div id="pic">
			<td><img style="float:left" src=".png" alt="dog"></td>
	</div>

<h2>Announcements</h2>

<?php

$con = mysqli_connect("helios.vse.gmu.edu","lhall16","it207", "lhall16");



                         
        $query = "SELECT announcement_date, announcement_title, announcement_content FROM announcements ORDER BY ANNOUNCEMENT_DATE DESC LIMIT 1";

              $result = mysqli_query($con, $query);            

echo "<table border='1' align='center'>
<tr>
<th>Announcement Date</th>
<th>Announcement Title</th>
<th>Announcement</th>
</tr> " ;


while ($row = mysqli_fetch_array($result))

 {

echo "<tr>";
echo "<td>" . $row['announcement_date'] . "</td>";
echo "<td>" . $row['announcement_title'] . "</td>";
echo "<td>" . $row['announcement_content'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>

<br>

<p><a href='http://helios.ite.gmu.edu/~lhall16/group/announcements.php'>Click here for ALL Announcements</a>

</p>

<br>

<h2>HSFC MISSION STATEMENT</h2>
<p>The mission of the Humane Society of Fairfax County, Inc. is to promote humane education; 
to prevent all forms of cruelty to animals, both domestic and wild, by every legitimate means; and to assist the community with all matters pertaining to the welfare of animals.
</p>

<!--Displays bottom of the website--!>
<?php
	include 'bottomOfPage.html';
?>	
</html>
