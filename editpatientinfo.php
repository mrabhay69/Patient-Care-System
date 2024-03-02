<?php
include("conn.php");
error_reporting(0);
$pid = $_GET['pid'];
$pname = $_GET['pname'];
// echo "pid " . $pid . "<br> pname " . $pname;

$sel = "SELECT * FROM `patientinfo` where patient_id  = $pid ; ";

$query = mysqli_query($conn,$sel);

$rows = mysqli_num_rows($query);
// echo $rows;

$res = mysqli_fetch_assoc($query);

echo $res['patient_name'];

$sel_vis = "SELECT * FROM `disease` where patient_id = $pid;";

$query_vis = mysqli_query($conn,$sel_vis);

$rows_vis = mysqli_num_rows($query_vis);
echo $rows_vis;

if($rows_vis < 1){
    $nov = "Not Visted Yet";
}
else{
    $nov = $rows_vis;

}
$id = $_POST['id'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$TSD = $_POST['TS'];
$TED = $_POST['TE'];
$status = $_POST['status'];
$N_O_V = $_POST['TV'];

if(isset($_POST['update'])){
    $upd = "UPDATE `patientinfo`
     SET `Treatment_start` = '$TSD', `Treatment_status` = '$status', `Treatment_end` = '$TED', 
     `Total Visits` = '$N_O_V', `patient_email` = '$email', 
     `patient_contact` = '$contact' WHERE `patient_id` = $id;";
     if(mysqli_query($conn,$upd) == TRUE){
        header("Location: adminDashboard.php");
     }
     else{
        echo "<div class='alert e alert-danger alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Sorry!</strong> Not Updated .
      </div>";
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="css/diagnose.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    <form method="POST" action="">
         <table id="mytable">
           

<tr><th>Id</th><td><input type="number" class="form-control u" name="id" value="<?php echo $res['patient_id'];  ?>" readonly></td></tr>
<tr><th>Name</th><td><input class="form-control u"  name="name" value="<?php echo $res['patient_name'];  ?>" readonly></td></tr>
<tr><th>Email</th><td><input type="email" name="email" class="form-control u" value="<?php echo   $res['patient_email']; ?>" ></td></tr>
<tr><th>Contact</th><td><input type="number" name="contact" class="form-control u" value="<?php echo  $res['patient_contact'];  ?>"></td></tr>
<tr><th>DOB</th><td><input type="date" name="dob" class="form-control u" value="<?php echo  $res['patient_dob'];  ?>" readonly></td></tr>
<tr><th>Age</th><td><input type="number" name="age" class="form-control u" value="<?php  echo $res['patient_age'];  ?>" readonly></td></tr>
<tr><th>Gender</th><td><input class="form-control u"  name="gender" value="<?php echo  $res['patient_gender'];  ?>" readonly></td></tr>
<tr><th>Treatment Start</th><td><input type="date" name="TS" class="form-control u" value="<?php echo  $res['Treatment_start'];  ?>"></td></tr>
<tr><th>Status</th><td><select id="status" name="status" class="form-control u">
    <option value="Ongoing">Ongoing</option>
    <option value="Complete">Complete</option>
</select>
</td>
</tr>
<tr><th>Treatment End</th><td><input type="date" name="TE" class="form-control u" value="<?php  echo $res['Treatment_end'];  ?>"></td></tr>
<tr><th>Total Visits</th><td><input class="form-control u"  name="TV" value="<?php  echo $nov;  ?>"></td></tr>
        </table>
        <button class="btn bg-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>