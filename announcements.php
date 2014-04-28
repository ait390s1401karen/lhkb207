

<?php

$con = mysqli_connect("helios.vse.gmu.edu","kb","password"
, "kb");



                         
        $query = "SELECT announcement_date, announcement_title, announcement_content FROM announcements ORDER BY announcement_date";

              $result = mysqli_query($con, $query);            


echo "<table border='1'>
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
