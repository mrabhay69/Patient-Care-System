<?php 
include("conn.php");
error_reporting(0);
$app_id = $_GET['id'];
// echo $app_id;

$select  = "SELECT * FROM `appointment` where Appoint_id = $app_id;";
$select_query = mysqli_query($conn,$select);

$row = mysqli_num_rows($select_query);
// echo $row . " rows ";

$res = mysqli_fetch_assoc($select_query);



$fid = $_POST['Fid'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$req = $_POST['request'];

if(isset($_POST['save_App'])){

if(!empty($fid) && !empty($name) && !empty($contact) && !empty($email) && !empty($date) && !empty($time) && !empty($req)){


$ins_app = "INSERT INTO `checkappoint` (`Appoint_id`, `Name`, `contact`, `Email`, `Appoint_date`, `Appoint_time`, `Request`)
 VALUES ($fid, '$name', $contact, '$email', '$date', '$time', '$req');" or die();
// $q = mysqli_query($conn,$ins_app);

if( mysqli_query($conn,$ins_app) == TRUE){
    echo "data inserted";
    header("Location: adminDashboard.php");
}
else{
    echo "Not ins";
}
}

echo "<br>" . $fid;
echo "<br>" . $name;
echo "<br>" . $email;
echo "<br>" . $contact;
echo "<br>" . $date;
echo "<br>" . $time;
echo "<br>" . $req;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChecK App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #myform{
            width: 60%;
            height: auto;
            border: 1px solid black;
            margin: 30px auto;
            padding: 15px 12px;
            border-radius: 6px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        label{
            /* text-align: center; */
            padding: 8px;
            width: 150px;
            font-weight: 480;
            font-size: 16px;
        }
        
    </style>
</head>
<body>
    <form method="POST" action="" id="myform">
        <center><h4>Update And Accept Appointments</h4></center>
        <div class="row">
            <div class=" col-md-6 form-group">
                <label for="">Appointment Id</label>
                <input type="text" class="form-control" name="Fid" placeholder="Appointment Id...." value="<?php echo $res['Appoint_id'];  ?>" readonly>
                        </div>
                
                        <div class=" col-md-6 form-group">
                            <label for="">Patient Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Patient Name...." value="<?php echo $res['Name'];   ?>" readonly>
                        </div>
        </div>
        

        <div class="row">
            <div class="col-md-6 mt-2 form-group">
                <label for="">Contact number</label>
                <input type="text" class="form-control" name="contact" placeholder="Contact number...." value="<?php echo $res['contact'];   ?>" readonly>
            </div>
    
            <div class=" col-md-6 mt-2 form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Appointment Id...." value="<?php echo $res['Email'];  ?>" readonly>
            </div>
        </div>
       

        <div class="mt-2 form-group">
            <label for="">Date</label>
            <input type="date" name="date" class="form-control" value="<?php echo $res['Appoint_date'];  ?>">
        </div>

        <div class="mt-2 form-group">
            <label for="">time</label>
            <select name="time" id="time" class="form-control" value="<?php echo $res['Appoint_time']; ?>">
            <option value="null">Set time for Diagnose</option>
                <option value="10.00 to 10.30 am">10.00 to 10.30 am</option>
    <option value="10.30 to 11.00 am">10.30 to 11.00 am</option>
    <option value="11.00 to 11.30 am">11.00 to 11.30 am</option>
    <option value=" 12.00 to 12.30 pm">12.00 to 12.30 pm</option>
        <option value="12.30 to 1.00 pm">12.30 to 1.00 pm</option>
    <option value="1.00 to 1.30 pm"> 1.00 to 1.30 pm</option>
        <option value="1.30 to 2.00 pm">1.30 to 2.00 pm</option>
                <option value="4.30 to 5.00 pm">4.30 to 5.00 pm</option>
                    <option value="5.00 to 5.30 pm">5.00 to 5.30 pm</option>
                    <option value="5.00 to 5.30 pm">5.00 to 5.30 pm</option>
                    <option value="5.30 to 6.00 pm">5.30 to 6.00 pm</option>
                    <option value="6.00 to 6.30 pm">6.00 to 6.30 pm</option>
                    <option value="6.30 to 7.00 pm">6.30 to 7.00 pm</option>
                    <option value="7.30 to 8.00 pm">7.30 to 8.00 pm</option>
            </select>
        </div>

        <div class="mt-2 form-group">
            <label for="">Request</label>
            <select class="form-control" id="request" name="request">
                <option value="null">Check</option>
                  <option value="Accept">Accept</option>
                  <option value="Modified Accepted">Modified Accepted</option>
                  <option value="Deny">Deny</option>
                  
              </select>
        </div>
        <button id="save_App" name="save_App" class=" mt-4 btn btn-primary">Save</button>
    </form>
</body>
</html>
