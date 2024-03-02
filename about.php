<?php
include("conn.php");
error_reporting(0);
$sel = "SELECT * FROM `patientinfo` ";
$query = mysqli_query($conn,$sel);

$row = mysqli_num_rows($query);

?>
<table>
    <?php
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/navbar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>
        
      $(document).ready(function(){
        $("#navbar").css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19")
      })
      </script>
    <style>
        .card{
            width: 600px;
            height: 300px;
            border: 2px soild grey;
            margin:20px 80px;
            padding: 16px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            
        }
        .card:nth-child(odd){border-right: 10px solid rgb(177, 21, 162);}
        .card:nth-child(even){border-left: 10px solid rgb(107, 35, 242);}
        .profile{
            position: relative;
            width: 100%;
           margin: auto;
        }
.pd{
    width: 160px;
    height: 160px;
    margin: auto;
    padding: 28px 8px;
    background-color: rgb(253, 249, 249);
    text-align: center;
    border-radius: 50%;
}
.pd img{
    
    border-radius: 50%;
}
.od{
    font-family: 'Open Sans', sans-serif;
    text-align: center;

}
p{
    letter-spacing: 1.0px;
    font-size: 16px;
}
.row{
    margin-top: 100px;
}

    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="row">
        <?php  
        $selp = "SELECT doctorpersonaldetail.Doc_name , doctorpersonaldetail.Doc_age ,doctorqual.ug_deg, 
         doctorqual.pg_deg,doctorqual.practice_start_year, doctimage.doct_image from doctorpersonaldetail INNER join doctorqual
        on doctorpersonaldetail.Doc_id = doctorqual.Doc_id INNER JOIN doctimage on doctorpersonaldetail.Doc_id = doctimage.Doc_id;";
       $qp = mysqli_query($conn,$selp);
       $row_p = mysqli_num_rows($qp);
       if($row_p > 0){

       
       while($res_p = mysqli_fetch_assoc($qp)){
        $date = date("Y");
$x = $date;

$prac = $res_p['practice_start_year'];
// $exp = date_diff(date_create($date),date_create($prac));
$exp = $x - $prac;

// $datecal = $date_cal->format("%y");

            echo "<div class='card'>
            <div class='profile'>
                <div class='pd'>
                    <img src='$res_p[doct_image]' width='100px' height='100px'> 
                    <p>$res_p[Doc_name]</p>
                </div>
                <div class='od'>
                <p> <strong>$res_p[ug_deg]</strong> and   <strong>$res_p[pg_deg]</strong></p>
                    <p><strong>$exp </strong> years of experience</p>
                    <p><strong>$row</strong> Patients have been treated Successfully</p> 
                </div>
            </div>
        </div>";
        }
    }
    ?>

    

    <!-- <div class="card">
        <div class="profile">
            <div class="pd">
                <img src="images/admin.webp" width="100px" height="100px">
                
            </div>
            <div class="od">
                <p>MSC in Information Technology</p>
                <p><strong>16 </strong> years of experience</p>
                <p><strong>15000</strong> Patients have been treated Successfully</p>
            </div>
        </div>
    </div> -->
</div>

       
    <script src="js/navbar.js"></script>
</body>
</html>