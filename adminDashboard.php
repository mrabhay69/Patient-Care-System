<?php 
include("conn.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['LoginName'])){
    header("Location: Login.php");
}

$id = $_SESSION['image_id'];

$sel = "SELECT * from doctimage where Doc_id = $id ";
$q = mysqli_query($conn,$sel);
if($q == TRUE){
    $row = mysqli_num_rows($q);
    $res = mysqli_fetch_assoc($q);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/dashboard.css">
  <style>
    .cc{
        visibility: hidden;
    }
  </style>
</head>
<body>
    <header class="bg-dark text-light">
<div class="comapany-title">
<h4>Patient Care System</h4>
</div>
<div class="admin-info">
    <img src="<?php echo $res['doct_image'];  ?>"  class="img">
    <span id="admin-name"><?php echo $_SESSION['LoginName']; 
    echo "<br>" . date("d-m-Y");
    ?>
        
    </span>
    <!-- <button class="btn btn-danger">LogOut</button> -->
</div>
    </header>
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">

                <!-- dashborads menu start  -->
                <div class="col-md-2 p-3 bg-dark text-white z">
                    <div class="admin_logo">
                       <span id="icon"><i class="fa fa-user-md"></i></span><span>Administrator</span>
                    </div>
                    <div class="operations_menu mt-3">
                        <div class="add_menu">
                           <button type="button" id="dashboard"><span class="op_icons"><i class=" text-primary fa fa-dashboard"></i>DashBoard</span></button> 
                           
                        </div>
                        <div class="add_menu">
                            <button type="button" id="add_new_patient"><span class="op_icons"><i class=" text-primary fa fa-user"></i>Add New Pateint</span></button> 
                            
                         </div>
                         <!-- <div class="add_menu">
                            <button type="button" id="edit_patient"><span class="op_icons"><i class=" text-primary fa fa-edit"></i>Edit Patient</span></button> 
                            
                         </div> -->
                         <div class="add_menu">
                            <button type="button" id="view_patient"><span class="op_icons"><i class=" text-primary fa fa-users"></i>View Patients</span></button> 
                            
                         </div>
                         <div class="add_menu">
                            <button type="button" id="appointment"><span class="op_icons"><i class=" text-primary fa fa-stethoscope"></i>Appointments</span></button> 
                            
                         </div>
                         <div class="add_menu">
                            <button type="button" id="history"><span class="op_icons"><i class=" text-primary material-icons">&#xe161</i>History of Patients</span></button> 
                            
                         </div>

                         <div class="add_menu">
                            <button type="button" id="change_bio" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <span class="op_icons"><i class=" text-primary fa fa-gear"></i>Admin Setting</span></button> 
                                <div class="dropdown-menu">
      <!-- <a class="dropdown-item" href="#">Personal Details</a> -->
      <a class="dropdown-item" href="password_rec.php">Password Recovery</a>
    </div>
                            
                         </div>

                         <div class="add_menu">
                            <a href="logout.php"><button type="button" id="logout" name="logout"><span class="op_icons"><i class=" text-primary fa fa-sign-out"></i>LogOut</span></button></a>
                            
                         </div>
                    </div>
                </div>
    <!-- dashborad menus end -->

<?php
include("conn.php");

$P = " SELECT Count(patient_id) as Tp from `patientinfo`;";

$qp = mysqli_query($conn, $P);

$res_p = mysqli_fetch_assoc($qp);

$P_og = " SELECT Count(patient_id) as Tp from `patientinfo` where Treatment_status = 'Ongoing';";

$qp_og = mysqli_query($conn, $P_og);

$res_p_og = mysqli_fetch_assoc($qp_og);

$P_tc = " SELECT Count(patient_id) as Tp from `patientinfo` where Treatment_status = 'Complete';";

$qp_tc = mysqli_query($conn, $P_tc);

$res_p_tc = mysqli_fetch_assoc($qp_tc);

$A = " SELECT Count(Appoint_id) as Tp from `appointment`;";

$qa = mysqli_query($conn, $A);

$res_a = mysqli_fetch_assoc($qa);

$A_ac = " SELECT Count(Appoint_id) as Tp from `checkappoint` where Request = 'Accept' ;";

$qa_ac = mysqli_query($conn, $A_ac);

$res_a_ac = mysqli_fetch_assoc($qa_ac);

$A_den = " SELECT Count(Appoint_id) as Tp from `checkappoint` where Request = 'Deny' ;";

$qa_den = mysqli_query($conn, $A_den);

$res_a_den = mysqli_fetch_assoc($qa_den);

$date = date("Y-m-d");

$v = "SELECT Count(patient_id) as Tp from `disease` where visit_date = '$date'; ";

$q_v =  mysqli_query($conn, $v);

$res_v = mysqli_fetch_assoc($q_v);

?>

    <!-- dash info start -->
    <div class="col-md-10 p-3  text-dark dash_info">
        
         <div id="view_dashbords_1" class="mt-2">

            <div class="box py-4 bg-primary text-light px-6 ">
                <p>No of Patients <strong class="d"><?php  echo $res_p['Tp'];  ?></strong></p>
                         </div>
             

                         <div class="box py-4 bg-danger text-light px-6 ">
        <p>Treatments going <strong class="d"><?php  echo $res_p_og['Tp'];  ?></strong></p>
                             </div>


                                                              <div class="box py-4 bg-info text-light px-6 ">
                <p>Patient Cure <strong class="d"><?php  echo $res_p_tc['Tp'];  ?></strong></p>
                         </div>


                         
             
                         <div class="box bg-success  text-light py-4 px-6 ">
                                         <p>Number of Patients who visit today <strong class="d"><?php  echo $res_v['Tp'];  ?></strong></p>
                                                  </div>    
             
                                                 
        </div> 
             <hr class="specs">
            <center class="specs"><p><strong>Todays Record </strong></p></center> 
       <!-- for todays data --> 
        <div id="view_dashbords_2">
        <div class="box py-4 bg-primary text-light px-6 ">
                             <p>Total Appointments <strong class="d"><?php  echo $res_a['Tp'];  ?></strong></p>
                                      </div>

                                      <div class="box py-4 bg-danger text-light px-6 ">
                             <p>Appointments Pending <strong class="d"><?php  echo $res_a_den['Tp'];  ?></strong></p>
                                      </div>
        <div class="box py-4 px-6 ">
         <p>Appointments Accepted <strong class="d"><?php  echo $res_a_ac['Tp'];  ?></strong></p>
                                                  </div>
            
             
                         
             
                                      
                                                  <div class="box cc bg-info  text-light py-4 px-6 ">
                                         <p>Number of Patients who visit today <strong class="d"><?php  echo $res_v['Tp'];  ?></strong></p>
                                                  </div>
                                                 
        </div> 
<!-- dash info end -->
       



        <!-- add Patients start -->

<div class="container add_patient_form">
    <div class="alert alert-success alert-dismissible fade show" id="succmess">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Data Inserted Successfully.
      </div>

      <div class="alert alert-danger alert-dismissible fade show" id="denymess">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Sorry!</strong> Data Not Inserted .
      </div>
    <form method="POST" action="" id="Pform">
        <div class="form">
            <header>
                <span class="topic">Add New Patient</span>
               
                <span class="close add_new_patient_close">-</span>
            </header>
            <div class="inputs">
                <div class="row ">
                    <div class=" col-md-4 mt-3 px-4">
                        <label>Enter Patient Name: </label>
                        <input type="text" class="form-control" id="p_name" placeholder="Enter patient name...">
                        <span class="err" id="name_err">** This is cannot be empty **</span>
                    </div>
        
                    <div class=" col-md-4 mt-3 px-4">
                        <label>Enter Patient Email: </label>
                        <input type="email" class="form-control" id="p_email" placeholder="Enter Patient Email...">
                        <span class="err" id="email_err">** This is cannot be empty **</span>
                    </div>
        
                    <div class=" col-md-4 mt-3 px-4">
                        <label>Enter Patient Phone Number: </label>
                        <input type="text" class="form-control" id="p_number" placeholder="Enter Patient Phone Number...">
                        <span class="err" id="number_err">** This is cannot be empty **</span>
                    </div>
            </div>
            
            <div class="row mb-4">
                <div class=" col-md-4 mt-3 px-4">
                    <label>Enter Patient Dob: </label>
                    <input type="date" class="form-control" id="p_dob" placeholder="Enter Birth date...">
                    <span class="err" id="dob_err">** This is cannot be empty **</span>
                </div>
    
                <div class=" col-md-4 mt-3 px-4">
                    <label>Enter Patient Gender: </label>
                    <select id="p_gender" class="form-control">
                        <option value="0">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <span id="gender_err" class="err">** This is cannot be empty **</span>
                    
                </div>

                <div class=" col-md-4 mt-3 px-4">
                    <label>Treatment Start Date: </label>
                    <input type="date" class="form-control" id="p_ts" placeholder="Treatment Start date...">
                    <span class="err" id="p_ts_err">** This is cannot be empty **</span>
                </div>

                <div class=" col-md-4 mt-3 px-4">
                    <label>Status: </label>
                    <select id="p_status" class="form-control">
                       
                        <option value="Ongoing">Ongoing</option>
                       
                    </select>
                    <span id="p_status_err" class="err">** This is cannot be empty **</span>
                </div>
    
                <div class=" mt-4 mb-5 px-4">
                    <button id="save_p" class="btn bg-primary">Save</button>
                </div>

        </div>
        </div>
        
        
    </div>
</form> 

    
</div>


<!-- add patient records start -->
<div class="container add_patient_form" >
    
    <div class="form">
        <header>
            <span class="topic">Recent Added Patient Records</span>
           
            <span class="close add_new_patient_rec_close">-</span>
        </header>
       <div class="table text-light">
       <span class="Search-box"><input class="search-inp" id="si" onkeyup="myFunction()" placeholder="Search Patient by their name.."></span>
        <table id="add_patient_record">
            <!-- <tr>
                <th class="thead">Patient Id</th>
                <th>Patient Name</th>
                <th>Patient Conatcat</th>
                <th>Pateient Email</th>
                <th>Patient Dob</th>
                <th>Patient Age</th>
                <th>Gender</th> 
                <th colspan="3" >Operations</th>
            </tr>
            <tr><td>101</td>
            <td>Manish Shah</td>
            <td>9326033562</td>
            <td>manish@gmail.com</td>
            <td>02/04/2002</td>
            <td>21</td>
            <td>Male</td>
            <td><a href="#" class="btn btn-info">Edit</a>
            </td>
            <td><a href="#" class="btn btn-danger">Delete</a>
            </td>
            <td><a href="Diagnose.html" target="_blank" class="btn btn-success">Diagnose</a>
            </td>
        
        </tr> 
            <tr><td>111</td>
                <td>Roshni Shah</td>
                <td>9326033562</td>
                <td>manish@gmail.com</td>
                <td>02/04/2002</td>
                <td>21</td>
                <td>Female</td>
                <td><a href="#" class="btn btn-info">Edit</a>
                </td>
                <td><a href="#" class="btn btn-danger">Delete</a>
                </td>
                <td><a href="Diagnose.html" target="_blank" class="btn btn-success">Diagnose</a>
                </td></tr> -->
        </table>
       </div>
    </div>
    
    
</div>

<!-- add patient records end -->

<!-- appointments  -->
<!-- search box -->
<div class="mt-3 mb-3 input-group searchbox_appointment">
    <button type="button " class="btn btn-primary input-group-text search_app_btn">Search</button>
<input type="text"   id="search_appointment_inp" placeholder="Search Records...">
</div>


<div class="container view_appointments">
<div class="form">
    <header>
        <span class="topic">Appointment Request</span>
        <span class="close close_appointment_table">-</span>
    </header>
    <div class="table text-light appointment_table">
        <table id="view_appointment_table">
            <!-- <tr>
                <th class="thead">Appointment Id</th>
                <th>Patient Name</th>
                <th>Patient Contact</th>
                <th>Pateient Email</th>
                <th>Appointment Date</th>
                <th>Appointment time</th> 
                <th colspan="3" >Operations</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Manish shah</td>
                <td>9326033562</td>
                <td>manish@gmail.com</td>
                <td>02/04/2022</td>
                <td>4.00 to 4.30 pm</td>
            <td><a href="#" class="btn btn-info">Accept</a>
            </td>
            <td><a href="#" class="btn btn-primary">Modify</a>
                <td><a href="#" class="btn btn-danger">Deny</a>
            </td>
        
        </tr>
        <td>2</td>
        <td>Abhay Maurya </td>
        <td>9326033562</td>
        <td>abhay@gmail.com</td>
        <td>02/04/2022</td>
        <td>4.00 to 4.30 pm</td>
    <td><a href="#" class="btn btn-info">Accept</a>
    </td>
    <td><a href="#" class="btn btn-primary">Modify</a>
        <td><a href="#" class="btn btn-danger">Deny</a>
    </td>

</tr>  -->
        </table>
       </div>
</div>



<div class="row">
<!-- accept appointments -->
<div class="col-md-10 xx">
    <div class=" container accept_appointments">
        <div class="form">
            <header>
                <span class="topic">Accepted Appointment </span>
                <span class="close close_appointment_table_accept">-</span>
            </header>
            <div class="table text-light accept_table">
                <table id="view_appointment_accepted_table">
                    
                
                </table>
               </div>
        </div>
    </div>
</div>
<!-- accepted appointments end -->


<!-- rejected appointmenst start -->
<div class="col-md-10 xx">
    <div class=" container accept_appointments">
        <div class="form">
            <header>
                <span class="topic">Rejected Appointments</span>
                <span class="close close_appointment_table_reject">-</span>
            </header>
            <div class="table text-light reject_table">
                <table id="view_appointment_rejected_table">
                     <tr>
                        <th class="thead">Appointment Id</th>
                        <th>Patient Name</th>
                        <th colspan="2" >Operations</th>
                    </tr>
                    <tr>
                        <td>1</td>
    <td>Manish shah</td>
    <td><a href="#" class="btn btn-info">Accept</a>
    </td>
                    <td><a href="#" class="btn btn-primary">Modify</a>
                        
                
                </tr> 
                
                </table>
               </div>
        </div>
    </div>
</div>

<!-- rejected appointments -->



<!-- rejected appointments end -->

</div>
<!-- accepted rejected row end -->


</div>
<!-- view patiends end -->


<!-- patients history -->

<div class="container patient_hist">
<div class="form">
    <header>
        <span class="topic">Patients History</span>
        <span class="close close_patient_hist">-</span>
    </header>

<div class="table text-light patient_hist_table">
    <table id="patient_hist_table_id">
        <tr>
            <th class="thead">Patient Id</th>
            <th>Patient Name</th>
            <th>Disese Type</th>
            <th>Problem Name</th>
            <th>Treatment Start Date</th>
            <th>Treatment End Date</th>
            <th>No of Visits</th>
            <th>Status</th>
            <th>ReDiagnose</th>
        </tr>
        <tr>
            <td>1</td>
<td>Manish shah</td>
<td>Moderate</td>
<td>Acid Reflux</td>
<td>02/02/2021</td>
<td>04/04/2021</td>
<td>4</td>
<td>Completed</td>
<td><a href="#" class="btn btn-primary">Edit</a>

            
    
    </tr>
    
    </table>
   </div>
</div>
</div>




<!-- patient history end -->






<!-- view patients strat -->


<div class="container view_patient_container">

<div class="mt-4 x ">
    <p>View Patient with status</p>
    <button class="btn_tg">Treatment Going</button>
    <button class="btn_tc">Treatment Cure</button>
   
</div>
<div class="mt-3 table text-light T_going_class">
    <table id="T_going">
        
    </table>
</div>



<!-- completed patient tretment start -->
<div class="mt-3 table text-light T_complete_class">
    <table id="T_complete">
   
    </table>
</div>
<!-- completed patient tretment end -->



</div>


<!-- view patient end -->


</div>
<!-- 2nd column end -->


       


    </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/dashboardPatientIns.js"></script>
    <script>
       function myFunction(){
        var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("si");
  filter = input.value.toUpperCase();
  table = document.getElementById("add_patient_record");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
       
    </script>
</body>
</html>