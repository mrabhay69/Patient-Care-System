<?php
include("conn.php");

error_reporting(0);

$sel_acc = "SELECT * FROM `checkappoint` where Request = 'Accept' or Request = 'Modified Accepted' order by Appoint_id ;";

$sel_qeury = mysqli_query($conn,$sel_acc);
$rows = mysqli_num_rows($sel_qeury);

// echo $rows;

if($rows > 0){
    $output .= "<table>
    <tr>
       <th>Appointment Id</th>
      <th>Patient Name</th>
      <th>Appoint Date</th>
      <th>Time</th>
      <th>Request</th>
    <th colspan='2'>Operations</th>
 </tr>
    ";
    while($result = mysqli_fetch_assoc($sel_qeury)){
        $output .= " <tr><td>" . $result['Appoint_id'] . "</td>";
        $output .= " <td>" . $result['Name'] . "</td>";
        $output .= " <td>" . $result['Appoint_date'] . "</td>";
        $output .= " <td>" . $result['Appoint_time'] . "</td>";
        $output .= " <td>" . $result['Request'] . "</td>";
        $output .= " <td><a onclick = 'return del()' href='app_del.php?id=$result[Appoint_id]' class='btn btn-danger'>Delete</a></td></tr>";

    }
}
$output .= "</table>";
echo $output;
mysqli_close($conn);


?>

<script>
    function del(){
        return confirm("Are you Sure you want to delete this ?");
    }
</script>