<?php 
session_start();
include("conn.php");
error_reporting(0);
function test_inp($data){
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
  }
$doc_id = $_POST['doc_id'];
$pin_ins = $_POST['pin_ins'];
$state_ins = $_POST['state_ins'];
$dis_ins = test_inp($_POST['dis_ins']);
$city_ins = test_inp($_POST['city_ins']);
$buildname_ins = test_inp($_POST['buildname_ins']);
$qual_ins = test_inp($_POST['qual_ins']);
$ugDeg_ins = test_inp($_POST['ugDeg_ins']);
$pgDeg_ins = test_inp($_POST['pgDeg_ins']);
$ugc_ins = test_inp($_POST['ugc_ins']);
$oucn_ins = test_inp($_POST['oucn_ins']);
$opcn_ins = test_inp($_POST['opcn_ins']);
$pgc_ins = test_inp($_POST['pgc_ins']);
$yps_ins = test_inp($_POST['yps_ins']);
$pass_ins = test_inp($_POST['pass_ins']);

$encrpt_pass = md5($pass_ins);
$_SESSION['id'] = $doc_id;

// $select = "SELECT * FROM `doctorsecurity` where doc_id = $doc_id;";
// // $query = 

// if(mysqli_query($conn,$select) == TRUE){
   
//  $row = mysqli_num_rows(mysqli_num_rows($query));
//  if($row < 1){
//      $insert_security = "INSERT INTO `doctorsecurity` (`Doc_id`,`Password`)
// VALUES ($doc_id, '$pass_ins');";
// // if(mysqli_query($conn,$insert_security)){
// //  echo 1;
// // }

//  }
// }

if($doc_id != "" && $pin_ins != "" && $state_ins != ""){
    $insert = "INSERT INTO `doctorclinic` (`Building_name`, `district`, `city`, `state`, `zip_code`, `Doc_id`)
    VALUES ('$buildname_ins ', '$dis_ins', '$city_ins', '$state_ins ', $pin_ins, $doc_id);";


$insert_security = "INSERT INTO `doctorsecurity` (`Doc_id`,`password`) VALUES ($doc_id, '$encrpt_pass');";
mysqli_query($conn,$insert_security);



     if(mysqli_query($conn,$insert) == TRUE){
        $insert_qual = "INSERT INTO `doctorqual` (`qualification`, `ug_deg`, `pg_deg`, `ug_coll_name`, `pg_coll_name`,`practice_start_year`, `Doc_id`)
        VALUES ('$qual_ins ', '$ugDeg_ins', '$pgDeg_ins', '$ugc_ins ', '$pgc_ins ' , $yps_ins , $doc_id);";
        if(mysqli_query($conn,$insert_qual)){
            echo 1;
        }
     }
     else{
        echo 0;
     }

}
else{
   echo  "Something went wrong ";
}


mysqli_close($conn);
    



?>