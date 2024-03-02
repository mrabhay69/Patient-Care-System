<?php 
include("conn.php");
error_reporting(0);
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$name = $_POST['name'];
$status = $_POST['status'];
$t_sd =$_POST['tsd'];
$date = date("h-m-Y");


$age_cal = date_diff(date_create($date),date_create($dob));

$age = $age_cal->format("%y");

if(!empty($name) && !empty($email) && !empty($contact) && !empty($dob) && !empty($gender) && !empty($t_sd) && !empty($status)){
    $ins = "INSERT INTO `patientinfo` (`patient_name`, `patient_email`, `patient_contact`, `patient_dob`, `patient_age`, `patient_gender`, `Treatment_start`, `Treatment_status`) 
    VALUES ('$name', '$email', $contact, '$dob', $age, '$gender', '$t_sd', '$status');";

    if(mysqli_query($conn,$ins) == TRUE){
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    "Not entered";
}



?>