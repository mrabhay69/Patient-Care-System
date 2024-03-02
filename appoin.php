<?php
error_reporting(0);

?>
<div class="appoint_sec">
        <form action="" id="appoint_form" method="POST">
            <center>
                <h2>Book an Appointment</h2>
                <p>
                    <h3>Select the time you want to Schedule Appointment</h3></p>
            </center>
            <p>
            <label>Enter Your Name</label>
            <input type="text" id="app_name" placeholder="Enter Your Name" >
            <span class="err" id="name_err">** This field is required **</span>
        </p>
        <p>
            <label>Enter Your Contact Number</label>
            <input type="number" placeholder="Enter Your Contact Number" id="contact"> 
            <span id="contact_err" class="err">** This field is required **</span>
        </p>
        <p>
            <label>Enter Your Email</label>
            <input type="email" placeholder="Enter Your Email" id="email">
            <span id="email_err" class="err">** This field is required **</span>
        </p>
            <p>
                <label>Select Date</label>
                <input type="date" placeholder="Select date and time" id="date">
                <span id="date_err" class="err">** This field is required **</span>
            </p>
           

            <p class="button">
                <button id="book_app" >Book Appointment</button>
            </p>
        </form>
    </div>