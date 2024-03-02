<?php 
error_reporting(0);
include("conn.php");
$pid = $_GET['pid'];
$pname = $_GET['pname'];

// echo $pid . "id<br>" . $pname;

$sel = "SELECT * FROM `disease` where patient_id = $pid;";

$query = mysqli_query($conn,$sel);

$sel_lastvis = "SELECT * FROM `disease` WHERE patient_id = $pid ORDER by visit_no desc limit 1;";
$query_lastvis = mysqli_query($conn,$sel_lastvis);
$rows_lastvis = mysqli_num_rows($query_lastvis);

$rows = mysqli_num_rows($query);

$res = mysqli_fetch_assoc($query);

if($rows < 1){
    header("Location: adminDashboard.php");
}

$res_visit_last = mysqli_fetch_assoc($query_lastvis);
// echo "rows " . $rows;
// echo "<br>rows_last visit " . $rows_lastvis;

// echo $res_visit_last['visit_no'] + 1 . "<br>";
// echo $res_visit_last['patient_id'] . "<br>";
// echo $res_visit_last['patient_name'] . "<br>";
// echo $res_visit_last['disease_name'] . "<br>";
// echo $res_visit_last['condition_type'] . "<br>";
// echo $res_visit_last['disease_duration'] . "<br>";
// echo $res_visit_last['symptom'] . "<br>";
// echo $res_visit_last['visit_date'] . "<br>";


$visitNo = $_POST['visit_no'];
$disName = $_POST['disease_name'];
$disCType = $_POST['d_type'];
$disDuration = $_POST['duration_no'];
$symptom = $_POST['symptom'];
$date = date("Y:m:d");
// 
$visitNo_err = $disName_err = $disCType_err = $disDuration_err = $symptom_err = "";
 
if(isset($_POST['save_dis'])){
    
if($visitNo == ""){
    $visitNo_err = "** This is Required **";
}
else{
    $visitNo_err = "";
}



if($disName == ""){
    $disName_err = "** This is Required **";
}
else{
    $disName_err = "";
}


if($disCType == ""){
    $disCType_err = "** This is Required **";
}
else{
    $disCType_err = "";
}


if($disDuration == ""){
    $disDuration_err = "** This is Required **";
}
else{
    $disDuration_err = "";
}
   
if($symptom == ""){
    $symptom_err = "** This is Required **";
}
else{
    $symptom_err = "";
    if(!empty($visitNo) && !empty($pid) && !empty($pname) && !empty($disName) && !empty($disCType) && !empty($symptom)){
        // echo "<br>" . $visitNo ;
        // echo "<br>" . $disName ;
        // echo "<br>" . $disCType ;
        // echo "<br>" . $disDuration ;
        // echo "<br>" . $symptom ;
        // echo "<br>" . $pid  ;
        // echo "<br>" . $p_name ;

        $ins = "INSERT INTO `disease` (`visit_no`, `patient_id`, `patient_name`, `disease_name`, `condition_type`, `disease_duration`, `symptom`, `visit_date`) 
        VALUES ($visitNo, $pid, '$pname', '$disName', '$disCType', $disDuration, '$symptom','$date');";
        if(mysqli_query($conn,$ins) == true){
        echo "<div class='alert alert-success alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Success!</strong> Data Inserted Successfully.
      </div>";
        ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $("#hide").hide();
        })
    </script>

    <?php
        }
        else{
            echo "<div class='alert e alert-danger alert-dismissible fade show'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Sorry!</strong> data not insetred .
          </div>";
        }
        }
        else{
            echo "<div class='alert e alert-warning alert-dismissible fade show'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Sorry!</strong> connection failde .
          </div>";
        }

}
  
    }


    // 2nd form

    $sel2_lastvis = "SELECT * FROM `patienthealth` WHERE patient_id = $pid ORDER by visit_no desc limit 1;";
    $query2_lastvis = mysqli_query($conn,$sel2_lastvis);
    $rows2_lastvis = mysqli_num_rows($query2_lastvis);
$res2 = mysqli_fetch_assoc($query2_lastvis);

    $stress = $_POST['stress'];
    $social = $_POST['social'];
    $mh = $_POST['mh'];
    $affair = $_POST['affair'];
    $health_pid = $_POST['health_pid'];
    $health_pname = $_POST['health_patient_name'];
    $health_visitDate = $_POST['health_visit_date'];
    $health_visit_no = $_POST['health_visit_no'];
   
    $stress_err = $social_err = $mh_err = $affair_err = "";
if(isset($_POST['save_patient_rec'])){
if($stress == ""){
    $stress_err = "** This cannot be empty **";
 
}
else{
    $stress_err = "";
}

if($affair == ""){
    $affair_err = "** This cannot be empty **";
 
}
else{
    $affair_err = "";
}

if($mh== ""){
    $mh_err = "** This cannot be empty **";
 
}
else{
    $mh_err = "";
}

if($social == ""){
    $social_err = "** This cannot be empty **";
 
}
else{
    $social_err = "";
    if(!empty($stress) && !empty($affair) && !empty($pname) && !empty($mh) && !empty($social) ){
        echo "<br>" . $stress . "<br>" . $social . "<br>" . $mh . "<br>" . $affair . "<br>" . $health_pid . "<br>" . $health_visit_no;
        $ins_health = "INSERT INTO `patienthealth` (`visit_no`, `patient_id`, `patient_name`, `stress`, `medicalhistory`, `socialinfo`, `affairsinfo`,`visit_date`) 
        VALUES ($health_visit_no, $health_pid, '$health_pname', '$stress', '$mh', '$social', '$affair','$health_visitDate');";
if(mysqli_query($conn,$ins_health) == TRUE){
    header("Location: adminDashboard.php");
}
else{
    echo "<div class='alert e alert-warning alert-dismissible fade show'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    <strong>Sorry!</strong> Not Inserted 
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
    <title>Document</title>
    <title>Diagnose Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="css/diagnose.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<form method="POST" action="" id="myform">
            <div class="container-fluid">
        <div class="mt-4  text-light p_info">
<p><b>Patient Id:</b> <span><?php echo $pid;  ?></span></p>
<p> <b>Patient Name:</b> <span><?php echo $pname;  ?></span></p>
<p> <b>Date:</b>  <span><?php echo date("d:m:Y");  ?></span>
<br><span><b>Total Visits till : </b><?php echo $rows;  ?></span>
</p>
        </div>
    </div>



    <div class="container visit" id="hide">
        <center><h4 class="pt-2">Disease Information Form</h4></center>
        <div class="row">
            <div class="mt-4  col-md-6">
                <label>Enter Visit Number</label>
                <input type="number" class="form-control" id="visit_no" name="visit_no" placeholder="Enter Visit Number....." value="<?php echo $res_visit_last['visit_no'] + 1; ?>" readonly>
            <span class="err"><?php echo $visitNo_err;    ?></span>
            </div>
            <div class="mt-4 col-md-6">
                <label>Enter Disease Name</label>
                <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder="Enter Visit Number....." value="<?php echo  $res_visit_last['disease_name']; ?>">
                <span class="err"><?php echo $disName_err;  ?></span>
            </div>

            <div class="mt-4  col-md-6">
                <label>Select condition Type</label>
               <select class="form-control" id="d_type" name="d_type" readonly>
<option value="<?php echo $res_visit_last['condition_type']; ?>"><?php echo $res_visit_last['condition_type']; ?></option>
<!-- <option value="Minor">Minor</option>
<option value="Moderate">Moderate</option>
<option value="Severve">Severve</option> -->

               </select>
               <span class="err"><?php echo $disCType_err;    ?></span>
            </div>
            <div class="mt-4 col-md-6">
                <label>Enter Duration for Disease</label>
                <input type="text" class="form-control" id="duration_no" name="duration_no" placeholder="Enter Duration for Disease....." value="<?php echo $res_visit_last['disease_duration']; ?>">
                <span class="err"><?php echo  $disDuration_err;   ?></span>
            </div>
            
            <div class="mt-4">
                <label>Enters Symptms</label>
                <textarea class="form-control" name="symptom"  placeholder="Enters Symptms......" value="" ><?php echo $res_visit_last['symptom']; ?></textarea>
                <span class="err"><?php echo  $symptom_err;   ?></span>
            </div>
            <button  id="save_dis"  name="save_dis" class="btn btn-primary save_btn">Save</button>
        </div>
        </div>
        </form>
       

        <div class="container mt-4 patient_rec">
        <form  method="POST" action="">
        <center><h4 class="pt-2">Speical Information Form</h4></center>
        <div class="data-for-insert form-group">
<input type="text" class="form-control"  name="health_visit_no" value="<?php echo $res_visit_last['visit_no'] + 1 ;  ?>">
<input type="text" class="form-control" name="health_patient_name"  value="<?php echo $res_visit_last['patient_name'];  ?>">
<input type="text" class="form-control"  name="health_pid" value="<?php echo $res_visit_last['patient_id'];  ?>">
<input type="text" class="form-control" name="health_visit_date"  value="<?php echo $res_visit_last['visit_date'];  ?>">
        </div>
<div class="mt-4" form-group>
    <label>Enters Patient Stress related info</label>
    <textarea class="form-control" name="stress" placeholder="Enters Patient Stress related info......"><?php echo $res2['stress'];   ?></textarea>
    <span class="err"><?php echo  $stress_err;   ?></span>
</div>
<div class="mt-4" form-group>
    <label>Enters Patient Medical History/ or allergy  related info</label>
    <textarea class="form-control" name="mh" placeholder="Enters Patient Stress related info......" ><?php echo $res2['medicalhistory'];   ?></textarea>
    <span class="err"><?php echo  $mh_err;   ?></span>
</div>

<div class="mt-4" form-group>
    <label>Enters Patient Affairs related info</label>
    <textarea class="form-control" name="affair" placeholder="Enters Patient Stress related info......"><?php echo $res2['affairsinfo'];   ?></textarea>
    <span class="err"><?php echo  $affair_err;   ?></span>
</div>

<div class="mt-4" form-group>
    <label>Enters Patient Social Life  related info</label>
    <textarea class="form-control" name="social" placeholder="Enters Patient Stress related info......"><?php echo $res2['socialinfo'];   ?></textarea>
    <span class="err"><?php echo  $social_err;   ?></span>
</div>

<button name="save_patient_rec" id="save_patient_rec" class="btn btn-primary save_btn">Save</button>
</form>
    </div>
   
</body>
</html>