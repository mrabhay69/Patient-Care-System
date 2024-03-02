<form id="regForm"  class="container" method="POST" action="">
      <h1>Register</h1>
      
      <!-- One "tab" for each step in the form: -->
         
  <!-- 1st tab end -->
      
<!-- 2nd tab address -->



 <div class="tab" id="AddDetail">
  <center><h4>Address Details</h4></center>
  <div class="row"> 
  <div class="input-group mb-3 form-group">
          <span class="input-group-text">Doc Id</span>
          <input type="number" class="form-control" id="doc_id" name="doc_id" value = "<?php   echo $res['Doc_id'] ;  ?>" disabled>
           
        </div> 

       <div class="input-group mb-3 form-group">
          <span class="input-group-text">Pin Code</span>
          <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter Your Pin Code...">          
        <span class="error" id="pin_err">** This is required **</span>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 form-group sta">
        <div class="input-group mb-3">
          <span class="input-group-text">State</span>
            <input type="text" class="form-control" id="state" name="state" disabled>
         
        </div>
      </div>

      <div class="col-md-4 dis">
          <div class="input-group mb-3 form-group">
            <span class="input-group-text">District</span>
              <input type="text" class="form-control" id="dis" name="dis" disabled>
           
          </div>
        </div>

      <div class="col-md-4 cit">
          <div class="input-group mb-3 form-group">
            <span class="input-group-text">City</span>
            <input type="text" class="form-control" id="city" name="city" disabled >
           
          </div>
        </div>
      </div>

      <div class="row">
          <div class="input-group mb-3 form-group build">
              <span class="input-group-text">Enter Building Name or Town</span>
              <textarea class="form-control" id="build_name" rows="2" id="comment" name="build_name"></textarea>
              <span class="error" id="build_name_err">** This is required **</span>
            </div>
          </div>
</div>  

 












<!-- 2nd tab end -->

<!-- 3rd tab start  -->




 <div class="tab" id="EduDetail">
  <center><h4>Eductaion Qualifications</h4></center>
  
      <div class="row mb-2 ">
          <p class="input-group form-group qua" >
              <span class="input-group-text">Select Your Qualfications</span>
              <select class="form-control" id="qualification" name="qualification">
                <option value="">Select Your Qualfications</option>
                  <option value="ug">UnderGraduate</option>
                  <option value="pg">Post Graduarion</option>
                  <option value="phd">Doctorate</option>
              </select>
              <span class="error" id="Qual_err">** This is required **</span>
          </p>
          </div>
          <div class="row mb-2">
              <div class="col-md-6" id="bachelor_deg" form-group>
              <p class="input-group">
                  <span class="input-group-text ">Bachelors Degree</span>
              <select class="form-control" id="ugDeg" name="ugDeg">
                <option value="">Select Bachelors Degree</option>
                  <option value="BHMS">Bachelor of Homeopathic Medicine and Surgery</option>
                  <option value="BEMS">Bachelor of Electro Homeopathic Medicine and Surgery</option>
                  <option value="ugdiploma">Diploma in Homeopathic</option>
                  <option value="ug_other">Other</option>
              </select>
              <span class="error_e" id="">** This is required **</span>
             </p>
          </div>
          <div class="col-md-6 form-group" id="Master_deg">
              <p class="input-group">
                  <span class="input-group-text "> Masters Degree</span>
              <select class="form-control" id="pgDeg" name="pgDeg">
                <option value="">Select Masters Degree</option >
                  <option value="MD">MD.(Hom) or Masters in Homeopathic</option>
                  <option value="pg">Post Diploma in Homeopathic</option>
                  <option value="pg_other">Other</option>
              </select>
              <span class="error_e" id="">** This is required **</span>
              </p>
          </div>
      </div>
<div class="row form-group" id="ug_college_list">
  <p class="input-group" >
      <span class="input-group-text ">UG College</span>
  <select class="form-control" id="ugDeg_college" name="ugDeg_college">
    <option value="">Select UG College</option>
      <option value="Nehru Homeopathic Medical College & Hospital">Nehru Homeopathic Medical College & Hospital</option>
      <option value="Dr. Allu Ramalingaiah Government Homoeopathic Medical College and Hospital">Dr. Allu Ramalingaiah Government Homoeopathic Medical College and Hospital</option>
      <option value="National Institue of Homeopathy kolkata">National Institue of Homeopathy Kolkata</option>
      <option value="Tantia University">Tantia University</option>
      <option value="Sarvepali Radhakrihnan University">Sarvepali Radhakrihnan University</option>
      <option value="Kerala University of Health Sciences">Kerala University of Health Sciences</option>
      <option value="Shri Govind Guru University">Shri Govind Guru University</option>
      <option value="Uttarakhand Ayurved University">Uttarakhand Ayurved University</option>
      <option value="Bharti Vidyapeeth Homeopathic Medical College">Bharti Vidyapeeth Homeopathic Medical College</option>
      <option value="Parul University">Parul University</option>
      <option value="Jayoti Vidyapeeth Womens University">Jayoti Vidyapeeth Womens University</option>
      <option value="London College og Homeopathy">London College og Homeopathy</option>
      <option value="Northwest College of Homeopathy">Northwest College of Homeopathy</option>
      <option value="Canadian College of Homeopathy">Canadian College of Homeopathy</option>
      <option value="other">others</option>
  
  </select>
  <span class="error_e" id="">** This is required **</span>
 </p>
</div>

<div class="row mb-4 " id="other_ug">
  <div class="mt-3">
      <input type="text" class="form-control" placeholder="Enter UnderGraduation College or University Name.." id="other_ug_college_name" name="other_ug_college_name">
      <span class="error_e" id="">** This is required **</span>
    </div>
</div>
        

<div class="row" id="pg_college_list">
  <p class="input-group">
      <span class="input-group-text ">PG College</span>
  <select class="form-control" id="pgDeg_college" name="pgDeg_college">
    <option>Select PG College</option>
      <option value="Nehru Homeopathic Medical College & Hospital">Nehru Homeopathic Medical College & Hospital</option>
      <option value="Dr. Allu Ramalingaiah Government Homoeopathic Medical College and Hospital">Dr. Allu Ramalingaiah Government Homoeopathic Medical College and Hospital</option>
      <option value="National Institue of Homeopathy kolkata">National Institue of Homeopathy Kolkata</option>
      <option value="Tantia University">Tantia University</option>
      <option value="Sarvepali Radhakrihnan University">Sarvepali Radhakrihnan University</option>
      <option value="Kerala University of Health Sciences">Kerala University of Health Sciences</option>
      <option value="Shri Govind Guru University">Shri Govind Guru University</option>
      <option value="Uttarakhand Ayurved University">Uttarakhand Ayurved University</option>
      <option value="Bharti Vidyapeeth Homeopathic Medical College">Bharti Vidyapeeth Homeopathic Medical College</option>
      <option value="Parul University">Parul University</option>
      <option value="Jayoti Vidyapeeth Womens University">Jayoti Vidyapeeth Womens University</option>
      <option value="London College og Homeopathy">London College og Homeopathy</option>
      <option value="Northwest College of Homeopathy">Northwest College of Homeopathy</option>
      <option value="Canadian College of Homeopathy">Canadian College of Homeopathy</option>
      <option value="other">Others</option>
  
  </select>
  <span class="error_e" id="">** This is required **</span>
 </p>
</div>

<div class="row mb-4" id="other_pg">
  <div class="mt-3">
      <input type="text" class="form-control" placeholder="Enter PostGraduation  College or University Name.." id="other_pg_college_name" name="other_pg_college_name">
  </div>
</div>
      <div class="col-md-6 input-group mt-4 mb-3">
          <span class="input-group-text">Enter year you start practicsing</span>
          <input type="number" class="form-control" id="Year_prac_start" name="Year_prac_start">
          <span class="error" id="Year_prac_start_err">** This is required **</span>
      </div>
      </div> 
           
      




 



<!-- 3rd tab end -->




<!-- 4 tab start -->


 <div class="tab" id="security"> 

  <center><h4>Security</h4></center>
  <div class="row">
      <div class="col-md-8">
      <div class="input-group mt-3 ">
<span class="input-group-text">Create Password</span>
<input type="password" class="form-control" id="pass" name="pass">
<span class="error" id="pass_err">** This is required **</span>
      </div>
  </div>

  <div class=" mt-4 col-md-8">
      <div class="input-group mt-3 ">
<span class="input-group-text">Confirm Password Password</span>
<input type="password" class="form-control" id="cpass" name="cpass">
<span class="error" id="cpass_err">** This is required **</span>
      </div>
  </div>
  </div>
</div> 



<!-- 4th tab end -->

      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn_2" class="btn" >Previous</button>
          <button type="button" id="submit" class="btn btn-primary" name="submit" >Submit</button>
          <button type="button" id="prevBtn" class="btn" >Previous</button>
          <button type="button" id="pincode" class="btn" >Next</button>
         <button type="button" id="nextBtn" class="btn " >Next</button>
        </div>
      </div>
      <!-- -->
  
    </form>


    