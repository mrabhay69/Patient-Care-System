<?php
include("conn.php");
error_reporting(0);
session_start();
$file_err = "";


if(isset($_POST["upload"])) {
 
$filename = $_FILES['fup']['name'];
$filesize = $_FILES['fup']['size'];
$file_tmp = $_FILES['fup']['tmp_name'];
$filetype = $_FILES['fup']['type'];
$id = $_SESSION['id'];
// echo "<br>" .  $filename;
// echo "<br>" .  $filesize;
// echo "<br>" .  $filetempname;
// echo "<br>" .  $filetype;

$file_ext = explode('.',$filename);
$file_check = strtolower(end($file_ext));

$file_ext_store = array('jpg', 'jpeg', 'png');

if(in_array($file_check,$file_ext_store)){
    if($filesize < 5000000){
        $destination = 'uploads/'.$filename;
        if(move_uploaded_file($file_tmp,$destination)){
            $ins = "INSERT into doctimage values($id,'$destination')";
            $q = mysqli_query($conn,$ins);
if($q == TRUE){
    header("Location: Login.php");
}
else{
    $file_err = " ** Soemthing went wrong ";
}
        }
        else{
            echo "<div class='alert alert-success alert-dismissible fade show'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Success!</strong> Not Uploaded.
          </div>";
        }
    }
}
           
            
        }
        
    

    














?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
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
    <form  method="POST"  enctype='multipart/form-data' action="">
        <center><h4>Upload Your Image</h4></center>
<div class="inp form-group">
<input type="file" class="form-control" name="fup">
<span class="err"><?php echo $file_err;  ?></span>
</div>

<center><button class="btn bg-primary" name="upload">Upload</button></center>



</form>
    </div>
   
</body>
<script src="js/navbar.js"></script>
</html>