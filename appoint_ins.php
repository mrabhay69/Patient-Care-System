<?php 

include("conn.php");
error_reporting(0);
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$date = $_POST['date'];
// $time = $_POST['time'];


if(!empty($name) && !empty($contact) && !empty($email) && !empty($date)){
$ins_app = "INSERT INTO `appointment` (`Name`, `contact`, `Email`, `Appoint_date`) 
VALUES ('$name', '$contact', '$email', '$date');";

 if(mysqli_query($conn,$ins_app)){
    echo 1;
 }
 else{
    echo 0;
 }
}
else{
    echo "empty";
}

 mysqli_close($conn);
?>