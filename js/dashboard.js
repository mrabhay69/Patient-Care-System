$(document).ready(function(){
    $("#add_new_patient").on("click",function(){
        // alert("Work");
        $("#view_dashbords_1").hide();
        $("#view_dashbords_2").hide();
        $(".specs").hide();
        $(".add_patient_form").show();
        $(".view_appointments").hide();
        $(".patient_hist").hide();
$(".view_patient_container").hide();


        
    })
    $(".add_new_patient_close").on("click",function(){
       var x =  $(".add_new_patient_close").html()
        $(".inputs").slideToggle(function(){
            if(x == "+"){
                $(".add_new_patient_close").html("-")
                $(".add_new_patient_close").css("font-size","50px")
            }
            else{
                $(".add_new_patient_close").html("+")
        $(".add_new_patient_close").css("font-size","30px")
            }
        });
       
       
    })
    
    $(".add_new_patient_rec_close").on("click",function(){
       var x =  $(".add_new_patient_rec_close").html()
      
        $(".table").slideToggle(function(){
            if(x == "+"){
                $(".add_new_patient_rec_close").html("-")
                $(".add_new_patient_close").css("font-size","50px")
               
            }
            else{
                $(".add_new_patient_rec_close").html("+")
        $(".add_new_patient_rec_close").css("font-size","30px")
            }
        });
       
       
    })
    $("#dashboard").on("click",function(){
        $("#view_dashbords_1").show();
        $("#view_dashbords_2").show();
        $(".specs").show();
        $(".add_patient_form").hide();
        $(".view_appointments").hide();
        $(".patient_hist").hide();
        $(".view_patient_container").hide();
    })

// view appointmenst
$("#appointment").on("click",function(){
    // alert("work");
    $("#view_dashbords_1").hide();
        $("#view_dashbords_2").hide();
        $(".specs").hide();
        $(".add_patient_form").hide();
    $(".view_appointments").show();
    $(".patient_hist").hide();
    $(".view_patient_container").hide();

    loaddata();
    acceptAppoint();
    denyAppoint();

})

function loaddata(){
    $.ajax({
        url: "viewApp1.php",
        type : "POST",
        success : function(data){
            $("#view_appointment_table").html(data);
        }
    })
    // alert("load")
}

function acceptAppoint(){
    $.ajax({
        url: "checkAppointView.php",
        type : "POST",
        success : function(data){
            $("#view_appointment_accepted_table").html(data);
        }
    })
    // alert("load")
}

function denyAppoint(){
    $.ajax({
        url: "denyAppoint.php",
        type : "POST",
        success : function(data){
            $("#view_appointment_rejected_table").html(data);
        }
    })
    // alert("load")
}


$(".close_appointment_table").on("click",function(){
    var x =  $(".close_appointment_table").html()
        $(".appointment_table").slideToggle(function(){
            if(x == "+"){
                $(".close_appointment_table").html("-")
                $(".close_appointment_table").css("font-size","50px")
            }
            else{
                $(".close_appointment_table").html("+")
        $(".close_appointment_table").css("font-size","30px")
            }
    // alert(1)
     });    

    });

// taking id for checking appointment

// $(document).on("click",".check",function(){
//     var id = $(this).data('id');
//     // alert(id);

//     $.ajax({
//         url : "checkApp.php",
//         type : "POST",
//         data : { id : id}
        
//     })
// })



// accepteds appoint
$(".close_appointment_table_accept").on("click",function(){
    var x =  $(".close_appointment_table_accept").html()
        $(".accept_table").slideToggle(function(){
            if(x == "+"){
                $(".close_appointment_table_accept").html("-")
                $(".close_appointment_table_accept").css("font-size","50px")
            }
            else{
                $(".close_appointment_table_accept").html("+")
        $(".close_appointment_table_accept").css("font-size","30px")
            }
    // alert(1)
     });    

    });



// reject appoint
$(".close_appointment_table_reject").on("click",function(){
    var x =  $(".close_appointment_table_reject").html()
        $(".reject_table").slideToggle(function(){
            if(x == "+"){
                $(".close_appointment_table_reject").html("-")
                $(".close_appointment_table_reject").css("font-size","50px")
            }
            else{
                $(".close_appointment_table_reject").html("+")
        $(".close_appointment_table_reject").css("font-size","30px")
            }
    // alert(1)
     });    

    });



    // search_appoint_rec
   
    $(".search_app_btn").on("click",function(){
        $("#search_appointment_inp").css("width","300px");
        $("#search_appointment_inp").css("padding","8px 12px");
    })


// patient history
$("#history").on("click",function(){
    $(".patient_hist").show();
    $("#view_dashbords_1").hide();
        $("#view_dashbords_2").hide();
        $(".specs").hide();
        $(".add_patient_form").hide();
    $(".view_appointments").hide();
    // $(".x").hide()
    // $(".T_going_class").hide()
    // $(".T_complete_class").hide();
    $(".view_patient_container").hide()
    // $(".searchbox_appointment").show()
})



// view patients
$("#view_patient").on("click",function(){
    $(".patient_hist").hide();
    $("#view_dashbords_1").hide();
        $("#view_dashbords_2").hide();
        $(".specs").hide();
        $(".add_patient_form").hide();
    $(".view_appointments").hide();
    $(".view_patient_container").show();
   

})


$(".btn_tg").on("click",function(){
   $(".T_going_class").show()
   $(".T_complete_class").hide()
})

$(".btn_tc").on("click",function(){
    $(".T_complete_class").show()
    $(".T_going_class").hide()
 })



 

    });