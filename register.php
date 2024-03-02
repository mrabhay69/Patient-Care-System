 <?php 
 error_reporting(0);
 session_start(); 
include("conn.php");
$ph = $_SESSION['Phone-No'];
// echo $ph;
$sel = "SELECT * FROM `doctorpersonaldetail` WHERE Doc_contact = $ph;";
$sel_query = mysqli_query($conn,$sel);

$rows = mysqli_num_rows($sel_query);
$res = mysqli_fetch_assoc($sel_query);



echo "rows " . $rows;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
    
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    
    <!-- <script src="js/script.js"></script> -->


</head>
<body>
    <?php include("navbar.php");   ?> 
    
   
     <?php include("regDocExtra.php");  ?>    
     

     
</body>
<script src="js/regex_personal.js"></script>
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

</html>
<?php 



// $doc_id = $_POST['doc_id'];
// $pin_ins = $_POST['pin'];
// $state_ins = $_POST['state'];
// $dis_ins = test_inp($_POST['dis']);
// $city_ins = test_inp($_POST['city']);
// $buildname_ins = test_inp($_POST['build_name']);
// $qual_ins = test_inp($_POST['qualification']);
// $ugDeg_ins = test_inp($_POST['ugDeg']);
// $pgDeg_ins = test_inp($_POST['pgDeg']);
// $ugc_ins = test_inp($_POST['ugDeg_college']);
// $oucn_ins = test_inp($_POST['other_ug_college_name']);
// $opcn_ins = test_inp($_POST['other_pg_college_name']);
// $pgc_ins = test_inp($_POST['pgDeg_college']);
// $yps_ins = test_inp($_POST['Year_prac_start']);
// $pass_ins = test_inp($_POST['pass']);
// $sub_ins = test_inp($_POST['submit']);


// function test_inp($data){
//   $data = htmlspecialchars($data);
//   $data = stripcslashes($data);
//   $data = trim($data);
//   return $data;
// }


// if($_SERVER["REQUEST_METHOD"] == "POST"){
//   echo $doc_id;
//   echo "<br>";
//   echo $pin_ins;echo "<br>";
//   // echo $doc_id;echo "<br>";
// //  echo $pin_ins;echo "<br>";
//  echo $state_ins;echo "<br>";
// //  echo $dis_ins;echo "<br>";
// //  echo $city_ins ;echo "<br>";
// //  echo $buildname_ins ;
// //  echo $qual_ins ;
// //  echo $ugDeg_ins; 
// //  echo $pgDeg_ins;
// //  echo $ugc_ins ;
// //  echo $oucn_ins ;
// //  echo $opcn_ins ;
// //  echo $pgc_ins ;
// //  echo $yps_ins ;
// //  echo $pass_ins; 
// //  echo $sub_ins;

// }

?>