<?php



                                                                                                                                                                                                                      
$con = mysqli_connect("helios.vse.gmu.edu","kb","password", "kb");         



    $title = $_POST['title'];
    $content = $_POST['content'];




$query = "insert into announcements(announcement_date, announcement_title, announcement_content) values  ( NOW() , '$title' , '$content')";


$result = mysqli_query($con, $query);

mysqli_close($con);

?>
