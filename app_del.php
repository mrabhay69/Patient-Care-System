<?php
include("conn.php");

echo $id = $_GET['id'];

$sql = "DELETE from checkappoint where Appoint_id = '$id';";

$q = mysqli_query($conn,$sql);

if($q == TRUE){
    header("Location: adminDashboard.php");
}


?>