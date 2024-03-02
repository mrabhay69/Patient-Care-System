<?php 
include("conn.php");
error_reporting(0);
$sel_pd = "SELECT * FROM `patientinfo` where Treatment_status = 'Ongoing';";
$query_pd = mysqli_query($conn,$sel_pd);

$row_pd = mysqli_num_rows($query_pd);
echo $row_pd;

// $sel_dis = "SELECT * FROM `disease`;";
// $query_dis = mysqli_query($conn,$sel_dis);

// $row_dis = mysqli_num_rows($query_dis);
// echo $row_dis;


if( $row_pd > 0){
    $output .= "
    <table class='table'>
    
  
   
    <tr class='bg-dark text-light'>
    <th>Patient_Id</th>
<th>Patient Name</th>
<th>Treatment Start</th>
<th>Treatment Status</th>
<th>No of Visit</th>
<th>Treatment End</th>
<th>Operations</th>
    </tr>
   
    ";

    while($res_pd = mysqli_fetch_assoc($query_pd)){
        $output .= "<tr><td>" .$res_pd['patient_id']. "</td>";
        $output .= "<td>" .$res_pd['patient_name']. "</td>";
        $output .= "<td>" .$res_pd['Treatment_start']. "</td>";
        $output .= "<td>" .$res_pd['Treatment_status']. "</td>";
        
        $output .= "<td>" .$res_pd['Total Visits']. "</td>";
        $output .= "<td>" .$res_pd['Treatment_end']. "</td>";
        $output .= "<td><a href='viewinfo.php?id=$res_pd[patient_id]' class='btn btn-primary'>View Info</a></td></tr>";

    }
}
$output .= "</table>";
echo $output;
mysqli_close($conn);


?>