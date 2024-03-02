$(document).ready(function(){
    $("#succmess").hide()
    $("#denymess").hide()
    $("#save_p").on("click",function(e){
        
        e.preventDefault();
        // alert(2)
        var name = $("#p_name");
        var email = $("#p_email");
        var contact = $("#p_number");
        var dob = $("#p_dob");
        var gender = $("#p_gender");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var status = $("#p_status");
        var Tstart = $("#p_ts");
        if(name.val() == ""){
            $("#name_err").show();
           
        }
else{
    $("#name_err").hide();
}

if(Tstart.val() == ""){
    $("#p_ts_err").show();
    
            }

            else{
                $("#p_ts_err").hide();
            }
if(dob.val() == ""){
    $("#dob_err").show();
}
else{
    $("#dob_err").hide();
}

if(gender.val() == "0"){
    $("gender_err").show();
}
else{
    $("gender_err").hide();
}
        if(email.val() == ""){
            $("#email_err").show() ;
            
        }
        else if(!filter.test(email.val())){
            $("#email_err").css("display","block")
            $("#email_err").html("** Please provide a valid email address **")
             $("#email_err").show();
             return false;
          }
        else{
            $("#email_err").hide();
        }


        if(contact.val() == ""){
            $("#number_err").show();
           
        }
        else if(contact.val().length > 10 || contact.val().length < 10){
            $("#number_err").html("** Contact number must be of 10 digits **");
            $("#number_err").show();
            return false
        }
        else{
            $("#number_err").hide();
        }

        
        
        // var name = $("");
       $.ajax({
        url: "patient1_ins.php",
        type : "POST",
        data : {
            name : name.val(),
            email : email.val(),
            gender : gender.val(),
            dob : dob.val(),
            contact : contact.val(),
            tsd : Tstart.val(),
            status : status.val()
        },
        success : function(data){
            if(data == 1){
                $("#Pform").trigger("reset");
                $("#succmess").show();
                PatientInsertedData();

            }
           else{
            $("#denymess").show()
           }
        }
       })
    // alert(status.val() + Tstart.val())

    })

    function PatientInsertedData(){
        $.ajax({
        url: "getpatientdata.php",
        type: "POST",
        success : function(data){
            $("#add_patient_record").html(data)
        }
        })
    }

    PatientInsertedData();
   

    $(".btn_tg").on("click",function(){
        // alert("clcil");

        $.ajax({
            url : "getOngoingTP.php",
            type : "POST",
            success : function(data){
                $("#T_going").html(data)
            }
        })
    })

    $(".btn_tc").on("click",function(){
        $.ajax({
            url : "getOngoingTP_C.php",
            type : "POST",
            success : function(data){
                $("#T_complete").html(data)
            }
        })
    })


    function historyPatient(){
        $.ajax({
            url : "patient_hist.php",
            type : "POST",
            success : function(data){
                $("#patient_hist_table_id").html(data)
            }
        })
    }
   historyPatient();

   $("#history").on("click",function(){
    historyPatient();
   })
})