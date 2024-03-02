<?php 
include("conn.php");

error_reporting(0);
$sel = "SELECT * FROM `patientinfo`";

$query = mysqli_query($conn,$sel);

$rows = mysqli_num_rows($query);
// echo $rows;

if($rows > 0){
    $output .= "<table>
    <tr>
       <th>Patient Id</th>
      <th>Patient Name</th>
      <th>Gender</th>
      <th>Date Of Birth</th>
      <th>Age</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Treatment Start Date</th>
      <th>Status</th>
      <th colspan='4'>Operations</th>

 </tr>";
    while($result = mysqli_fetch_assoc($query)){
        $output .= " <tr><td>" . $result['patient_id'] . "</td>";
        $output .= " <td>" . $result['patient_name'] . "</td>";
        $output .= " <td>" . $result['patient_gender'] . "</td>";
        $output .= " <td>" . $result['patient_dob'] . "</td>";
        $output .= " <td>" . $result['patient_age'] . "</td>";
        $output .= " <td>" . $result['patient_email'] . "</td>";
        $output .= " <td>" . $result['patient_contact'] . "</td>";
        $output .= " <td>" . $result['Treatment_start'] . "</td>";
        $output .= " <td>" . $result['Treatment_status'] . "</td>";
        
        
       
        $output .= " <td><a href='editpatientinfo.php?pid=$result[patient_id]&pname=$result[patient_name]' ' class='btn btn-info'>Edit</a></td>";
        // $output .= " <td><a href='#' class='btn btn-danger'>Delete</td>";
        $output .= " <td><a href='Diagnose.php?pid=$result[patient_id]&pname=$result[patient_name]'  class='btn btn-success'>Diagnose</a></td>";
        $output .= " <td><a href='revisit.php?pid=$result[patient_id]&pname=$result[patient_name]'  class='btn btn-dark text-light'>ReVisit</td></tr>";

    }
}
$output .= "</table>";
echo $output;
mysqli_close($conn);


?>