<?php  
error_reporting(0);
session_start();
if(!isset($_SESSION['LoginName'])){
    header("Location: Login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/navbar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
   .info{ width: 80%;
            height: 180px;
           
            margin: 25px auto;
            padding: 16px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   }
   .head{
    width: 80%;
    margin: 35px auto;
    padding: 18px;
    border: 1px solid black;
    display: flex;
    justify-content: space-between;
    align-items: center;
   }
   .visit{
    display: flex;
    justify-content: space-between;
    align-items: center;
   }
</style>
    
</head>
<body>
<div class="container">
    <?php 
    include("conn.php");
   $id =  $_GET['id'];
   echo $id;

   $sel_pf = "SELECT * from patientinfo where patient_id = $id;";

   $dis = "SELECT * from disease where patient_id = $id;";

   

   $pi_q = mysqli_query($conn,$sel_pf);
   $dis_q = mysqli_query($conn,$dis);
   
   $res_pf = mysqli_fetch_assoc($pi_q);
   
   $pat_health = "SELECT * from patienthealth where patient_id = $id;";
        $ph_q = mysqli_query($conn,$pat_health);
         $res_phat = mysqli_fetch_assoc($ph_q);

    if(mysqli_num_rows($pi_q) > 0 ){
        echo "<div class='head'>
        <p><strong>Patient Id : </strong>$res_pf[patient_id]</p>
        <p><strong>Patient Name : </strong>$res_pf[patient_name]</p>
       
    </div>";

echo " <div class='info'>
<p><strong>Medical History: </strong> $res_phat[medicalhistory]</p>
<p><strong>Affairs if any: </strong>$res_phat[affairsinfo]</p>
<p><strong>Social Life:  </strong>$res_phat[socialinfo]</p>

<p><strong>Stress if any: </strong>$res_phat[stress]</p></div>
";
      
    while($res_dis= mysqli_fetch_assoc($dis_q)){
        
echo "
<div class='info'>
<div class='visit'>
<p><strong>Visit Number: </strong>$res_dis[visit_no]</p>
<p><strong>Visit Date: </strong>$res_dis[visit_date]</p>
</div>

<p><strong>Disease Condition Type: </strong>$res_dis[disease_name]</p>
<p><strong>Symptom: </strong>$res_dis[symptom]</p>


    </div>
        ";
    }
        }
    
    ?>
   </div>
    
    <!-- </div>
    <div class='head'>
        <p><strong>Patient Id : </strong>$res_pf[patient_id]</p>
        <p><strong>Patient Name : </strong>$res_pf[patient_name]</p>
        <p><strong>Disease Duration When appears : </strong>$res_dis[disease_duration]</p>
    </div>
      
        
    <div class='info'>
<div class='visit'>
<p><strong>Visit Number: </strong>$res_dis[visit_no]</p>
<p><strong>Visit Date: </strong>$res_dis[visit_date]</p>
</div>

<p><strong>Disease Condition Type: </strong>$res_dis[disease_name]</p>
<p><strong>Symptom: </strong>$res_dis[symptom]</p>
<p><strong>Medical History: </strong> $res_phat[medicalhistory]</p>
<p><strong>Affairs if any: </strong>$res_phat[affairsinfo]</p>
<p><strong>Social Life:  </strong>$res_phat[socialinfo]</p>

<p><strong>Stress if any: </strong>$res_phat[stress]</p>


    </div> -->
</body>
</html>