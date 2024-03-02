<?php
error_reporting(0);
session_start();
include("conn.php");
$contact = $_POST['contact'];
$dob = $_POST['dob'];

$contact_err = $dob_err = "";
if(isset($_POST['change'])){
    if($contact == "" ){
$contact_err = " ** Contact Number Required **";

    }
    else if($dob == ""){
        $contact_err = "";
        $dob_err = " ** Date of Birth Required **";
    }
    else{
        $contact_err = "";
        $dob_err = "";
        $sel = "SELECT * FROM `doctorpersonaldetail` where Doc_contact = $contact and Doc_dob = '$dob';";
        $q = mysqli_query($conn,$sel);

$row = mysqli_num_rows($q);
// echo $row;
$res = mysqli_fetch_assoc($q);

$_SESSION['doc_id'] = $res['Doc_id'];
if($contact != $res['Doc_contact']){
   $dob_err = "<div class='alert alert-danger alert-dismissible fade show'>
   <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
   <strong>Sorry!</strong> Data not match.
 </div>";
}
else if($dob != $res['Doc_dob']){
   
    $dob_err = "<div class='alert alert-danger alert-dismissible fade show'>
   <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
   <strong>Sorry!</strong> Data not match.
 </div>";
}
else{
   
    header("Location: changepass.php");
echo  " <br> " . $_SESSION['doc_id'];
}

    }
}
else{
    // echo "not click yet";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>
        
      $(document).ready(function(){
        $("#navbar").css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19")
      })
      </script>
      <style>
.err{
    width: 100%;
    display: block;
    text-align: center;
    padding: 14px 18px;
    letter-spacing: 1.2px;
    color: red;
    font-family: arial;
}
.inp{
    margin: auto;
   padding-top: 25px;
    width: 80%;
}
form{
    width: 70%;
    margin:35px auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
}
h4{
    padding-top: 18px
}
button{
    text-align: center;
    width: 100px;
    font-family: Arial;
    margin-bottom: 28px;
    color: white !important;


}
        </style>
    
</head>
<body>
   
    <?php include("navbar.php"); ?>
    <div class="container">
    <form  method="POST"  action="">
        <center><h4>Change Password</h4></center>
<div class="inp form-group">
    <input type="number" class="form-control" name="contact"placeholder="Enter your register Contact number...." value="<?php echo $contact;  ?>">
<span class="err"><?php echo $contact_err;  ?></span>
</div>

<div class="inp form-group">
<input type="date" class="form-control" name="dob" value="<?php echo $dob;  ?>">
<span class="err"><?php echo $dob_err;  ?></span>
</div>

<center><button class="btn bg-primary" name="change">Change</button></center>



</form>
    </div>
   
    
</body>
</html>