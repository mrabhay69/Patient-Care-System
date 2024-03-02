<?php 
error_reporting(0);
include("conn.php");

$sel_pd = "SELECT * FROM `patientinfo` where Treatment_status = 'Complete';";
$query_pd = mysqli_query($conn,$sel_pd);

$row_pd = mysqli_num_rows($query_pd);
// echo $row_pd;




if( $row_pd > 0){
    $output .= "
    <table>
    <tr>
    <th>Patient Id</th>
<th>Patient Name</th>
<th>Disease</th>
<th>Condition</th>
<th>Treatment Start</th>
<th>Treatment Status</th>
<th>No of Visit</th>
<th>Treatment End</th>
<th>Operations</th>

    </tr>
    ";

    while($res_pd = mysqli_fetch_assoc($query_pd)){
        $sel_dis = "SELECT * FROM `disease` where patient_id = '$res_pd[patient_id]';";
        $query_dis = mysqli_query($conn,$sel_dis);
        
        $row_dis = mysqli_num_rows($query_dis);
        $res_dis = mysqli_fetch_assoc($query_dis);
       

        $output .= "<tr><td>" .$res_pd['patient_id']. "</td>";
        $output .= "<td>" .$res_pd['patient_name']. "</td>";
        $output .= "<td>" .$res_dis['disease_name']. "</td>";
        $output .= "<td>" .$res_dis['condition_type']. "</td>";
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