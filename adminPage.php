<?php


if ($_SESSION['logged'] = 'admin') 
{


$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");
                    
        $query = "SELECT announcement_date, announcement_title, announcement_content FROM announcements ORDER BY announcement_date";

              $result = mysqli_query($con, $query);            


echo "<table border='1'>";
echo "<form method='post' action='editAnnouncements.php'>


<tr>
<th>Announcement Date</th>
<th>Announcement Title</th>
<th>Announcement</th>
<th>Delete button</th>


</tr> " ;



while ($row = mysqli_fetch_array($result))

 {





echo "<tr>";
echo "<td><input type='text' name='date' size='20' value=" . $row['announcement_date'] . "></td>";
echo "<td><input type='text' name='title' size='20' value=" . $row['announcement_title'] . "></td>";
echo "<td><input type='text' name='content' size='50' value="   . $row['announcement_content'] ."> </td>";
echo "<td><button type='submit' formaction='delete.php'>Click to delete announcement</button></td>";
echo "</tr>";




}
echo "</fieldset>";
echo "</form>";

echo "<input type='submit' name='submit' value='Update'>";
echo "</table>";


 echo "<form method='POST' action='add.php'>";
    echo "<fieldset>";

    
 echo "<label for='announcement_title'>Title</label>";
    echo "<input type = 'text' name='title' required='required' id='title' />";
 echo "<label for='content'>Announcement</label>";
    echo "<input type = 'text' name='content' required='required' id='content' />";
 

echo "<input type= 'submit' name='submit' value='Add Announcement'/>";
    echo "</fieldset>";
    echo "</form>";


    $title = $_POST['title'];
    $content = $_POST['content'];    




$query = "insert into announcements(announcement_date, announcement_title, announcement_content) values  ( NOW() , '$title' , '$content')";


$result = mysqli_query($con, $query);
 

mysqli_close($con);
}

else{
echo "Access Denied";

}

?>
