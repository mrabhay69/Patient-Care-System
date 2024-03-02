<?php 
session_start();
error_reporting(0);
include("conn.php");
function test_inp($data){
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data; }
$fname = test_inp($_POST['fname']); 
$lname = test_inp($_POST['lname']);
$email = test_inp($_POST['email']);
$dob = test_inp($_POST['dob']);
$gender = test_inp($_POST['gender']);
$contact = test_inp($_POST['contact']);

$date = date("h-m-Y");


$age_cal = date_diff(date_create($date),date_create($dob));

$age = $age_cal->format("%y");
$fullname = $fname . " " . $lname;
$_SESSION['Phone-No'] = $contact;
$_SESSION['Email'] = $email;

if(!empty($email) && !empty($contact) && !empty($fullname) && !empty($gender) && !empty($dob)){
$insert = "INSERT INTO `doctorpersonaldetail` (`Doc_name`, `Doc_gen`, `Doc_email`, `Doc_contact`, `Doc_dob`, `Doc_age`) 
VALUES ('$fullname', '$gender', '$email', '$contact', '$dob', '$age');";

$query = mysqli_query($conn,$insert);
if($query){
    echo 1;
}
else{
    echo 0;
}
}
mysqli_close($conn);

?>