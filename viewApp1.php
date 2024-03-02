<?php 
error_reporting(0);
include("conn.php");

$sel = "SELECT * FROM `appointment`";

$sel_query = mysqli_query($conn,$sel);

$row = mysqli_num_rows($sel_query);
// echo $row;

if($row > 0){
    $output .= "<table> <tr>
    <th>Appointment Id</th>
    <th>Patient Name</th>
    <th>Patient Contact</th>
    <th>Pateient Email</th>
    <th>Appointment Date</th>
    
    <th colspan='3' >Operations</th>
</tr>
    ";

    while($res = mysqli_fetch_assoc($sel_query)){
        $output .= "<tr><td>" . $res['Appoint_id']  . "</td>";
        $output .= "<td>" . $res['Name']  . "</td>";
        $output .= "<td>" . $res['contact']  . "</td>";
        $output .= "<td>" . $res['Email']  . "</td>";
        $output .= "<td>" . $res['Appoint_date']  . "</td>";
        // $output .= "<td>" . $res['Appoint_time']  . "</td>";
        // $output .= "<td><a href='#' class='btn btn-info'>Accept</a </td>";

        $output .= "<td><a data-id=" . $res['Appoint_id'] ." href='checkApp.php?id=$res[Appoint_id]' class='btn btn-primary check' >Modify</a></td></tr>";

        // $output .= "<td><a href='#' class='btn btn-danger'>Deny</a></td></tr>";


    }
    $output .= "</table>";
    echo $output;

    mysqli_close($conn);
}




?>