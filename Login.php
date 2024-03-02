<?php
session_start();
error_reporting(0);
include("conn.php");
$doc_pass_err = " ** This is required **";
$doc_name = $doc_pass = $doc_name_err = $doc_pass_err =  $doc_contact_err= "";
$doc_name = $_POST['doc_id'];

$_SESSION['LoginName'] = $doc_name;

$doc_pass = $_POST['doc_pass'];
$doc_contact = $_POST['doc_contact'];

if(isset($_POST['login'])){
if($doc_name == ""){
    $doc_name_err = " ** Username is required **";
    
}
else{
    $doc_name_err = "";
    
}

if($doc_contact == ""){
    $doc_contact_err = " ** Contact number is required **";
    
}
else{
    $doc_contact_err = "";
    
}

if($doc_pass == ""){
    $doc_pass_err = " ** This is required **";
}
else{
    $doc_pass_err = "";
}
if(!empty($doc_name) && !empty($doc_pass) ){

    
    $sel_name = " SELECT * FROM `doctorpersonaldetail` where Doc_name = '$doc_name' ;";
    $check = mysqli_query($conn,$sel_name);
    
    $row_name = mysqli_num_rows($check);
    $res_name = mysqli_fetch_assoc($check);
    $check_name = $res_name['Doc_name'];
    $check_id = $res_name['Doc_id'];
    $check_contact = $res_name['Doc_contact'];
    $_SESSION['image_id'] = $check_id;
    // password
    $encrpt_pass = md5($doc_pass);
    $sel_pass = "SELECT * FROM `doctorsecurity` where password = '$encrpt_pass' and Doc_id = '$check_id';";
    $check_pass = mysqli_query($conn,$sel_pass);
    
    $row_pass = mysqli_num_rows($check_pass);
    $res_pass = mysqli_fetch_assoc($check_pass);
    $check_pass_en = $res_pass['password'];
// echo $check_name;
// echo  $check_pass_en;
    if($row_name and $row_pass > 0){
        // echo $check_name . " " . $check_pass_en;
        if($doc_name == $check_name && $encrpt_pass == $check_pass_en && $check_contact == $doc_contact){
            echo "Match data";
            header("Location: adminDashboard.php");
        } 
    else{
        $doc_name_err = " ** No data found **";
        $doc_pass_err = " ** No data found **";
        $doc_contact_err = " **This number have not register  **";
    }
}

echo "
<div class='alert alert-danger alert-dismissible fade show' id='denymess'>
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
  <strong>Sorry!</strong> Login Failed Creditantials not found.
</div>";
}
else{
    // echo "Not login yet";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <style>
.login{
        width: 95%;
        margin: auto;
    }
    .head_login {
        margin: 45px 0;
    }
    .container{
       
        margin-top: 50px;
        height: auto;
        width: 510px;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 15px;;
    }
    .login_sec{
       text-align: center;
       margin: 10px auto;
        
    }
    .login_btn{
        width: 150px;
        font-size: 17px;
        letter-spacing: 1.3px;
        /* margin-bottom: 12px; */

    }
    .forgot{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .forgot a{
        text-decoration: none;
    font-size: 18px;
letter-spacing: 1px;
word-spacing: 1px;
padding: 8px;   }

.error{
    width: 100%;
    padding: 8px;
    font-size: 16px;
    color:red;
    text-align:center;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>
        
      $(document).ready(function(){
        $("#navbar").css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19")
      })
       
    </script>
</head>
<body>
    <!-- <header id="navbar">
    <div class="logo">
<h4 class="logo_head">Patient Care System</h4>
    </div>
    <div class="links">
<ul id="ul">
<li><a href="#" class=" link_menu menu_active">Home</a></li>
<li><a href="#" class=" link_menu ">History</a></li>
<li><a href="#" class=" link_menu ">About Us</a></li>
<li><a href="#" class=" link_menu ">Help</a></li>
<li><a href="#" class=" link_menu ">Book</a></li>
</ul>
    </div>
    <div class="op">
<buton class="opbtn reg"><a href="reg1.html">Register</a></buton>
<buton class="opbtn log"><a href="login.php">Login</a></buton>
    </div>
</header> -->

<?php  include("navbar.php");   ?>



    <div class="container">
<center>
    <h2 class="head_login">Login Here..</h2>
</center>
<div class="login">
    <form method="POST" action="">
<div class="mt-4 input-group">
    <!-- <span class="input-group-text">Enter Your Id</span> -->
              <input type="text" class="form-control" id="doc_id" name="doc_id" placeholder="Enter your Id...." value="<?php echo $doc_name;  ?>">
<span class="error"><?php  echo $doc_name_err;  ?></span>
            </div>
            <div class="mt-4 input-group">
    <!-- <span class="input-group-text">Enter Your Password</span> -->
              <input type="number" class="form-control" id="doc_contact" name="doc_contact" placeholder="Contact Number." value="<?php echo $doc_contact;  ?>">
              <span class="error"><?php  echo $doc_contact_err;  ?></span>
            </div>

<div class="mt-4 input-group">
    <!-- <span class="input-group-text">Enter Your Password</span> -->
              <input type="password" class="form-control" id="doc_pass" name="doc_pass" placeholder="Password" value="<?php echo $doc_pass;  ?>">
              <span class="error"><?php  echo $doc_pass_err;  ?></span>
            </div>
           


<div class="mt-4 login_sec">
    <button class="btn btn-primary login_btn" name="login">Login</button>
</div>
<div class="mt-4 forgot">
    <span><a href="password_rec.php">forgot Password?</a></span>
    <span>Not Sign in Yet<a href="reg1.html">Register</a>
    </span>
</div>
</form>
</div>
<script>
    window.onscroll = function() {myFunction()};

let navbar = document.getElementById("navbar");
let  sticky = navbar.offsetTop;



let ul = document.getElementById("ul");
let btns = ul.getElementsByClassName("link_menu");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("menu_active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" menu_active", "");
  }
  this.className += " menu_active";
  });
}
</script>
</body>
</html>
