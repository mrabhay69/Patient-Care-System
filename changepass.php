<?php

session_start();
if(!isset($_SESSION['LoginName'])){
    header("Location: Login.php");
}

include("conn.php");
error_reporting(0);
$pass_err = "";
$pass = $_POST['pass'];

// echo $_SESSION['doc_id'];

$id = $_SESSION['doc_id'];;

$e_pass = md5($pass);

if(isset($_POST['upd'])){
    if(!empty($pass)){
        $update = "UPDATE `doctorsecurity` SET password = '$e_pass' where Doc_id = $id;";
        if(mysqli_query($conn,$update) == TRUE ){
            $pass_err = "Password change successfully";
            header("Location:Login.php");
        }
        else{
            $pass_err = "** Password doesnot change **";
        }
    }
    else{
        $pass_err = "** Password cannot be empty **";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
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
    <input type="password" class="form-control" name="pass"placeholder="Update Your Pasword...." >
<span class="err"><?php echo $pass_err;  ?></span>
</div>


<center><button class="btn bg-primary" name="upd">Update</button></center>



</form>
    </div>
</body>
</html>