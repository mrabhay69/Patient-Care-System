$(document).ready(function(){
    $("#navbar").css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19");
$(".build").hide()
$("#submit").hide()
    $("#pincode").on("click",function(e){
        e.preventDefault();
        var pin = $("#pin");
        var bn = $("#build_name");
// alert(bn.val())
        if(pin.val() == ""){
            // alert("no")
            $("#pin_err").show();
        }
        else{
            // alert("y")
            $("#pin_err").hide();
            if(pin.val().length == 6){
                $("#pin_err").hide();
                $.ajax({
                    url:"pinsearch.php",
                    type:"POST",
                    data: {
                        pin: pin.val()
                    },
                    success: function(data){
                        if(data != "NO"){
                            var getData = $.parseJSON(data);
document.getElementById("state").value = getData.state
document.getElementById("city").value = getData.city;
document.getElementById("dis").value = getData.district;
$(".cit").show();
$(".dis").show();
$(".sta").show()
$(".build").show();
                        }
                        else{
                            $("#pin_err").html("** Pin is not valid **")
                            $("#pin_err").show();
                        }
                    }
                })
               
            }
            else{
                $("#pin_err").html("** Pin code must be of 6 digits")
                $("#pin_err").show();
            }
        }
       
        

        if(bn.val() == ""){
            $("#build_name_err").show();
        }
        else{
            $("#build_name_err").hide();
            $("#pincode").hide();
            $("#nextBtn").show();
            $("#prevBtn").show();
            $("#AddDetail").hide();
            $("#EduDetail").show();
            $("#submit").hide();
            $("#prevBtn_2").hide()
        }
        
    })
    $("#prevBtn").on("click",function(){
        $("#AddDetail").show();
        $("#EduDetail").hide();
        $("#security").hide()
        $("#pincode").show();
        $("#prevBtn").hide();
        $("#nextBtn").hide()
    })


function qual(){
    $("#qualification").on("mouseleave",function(){
    var deg = $("#qualification");
    
        if(deg.val() != ""){
            $("#bachelor_deg").hide()
            $("#Master_deg").hide()
        }
        if(deg.val() == "pg"){
            $("#bachelor_deg").show()
            $("#Master_deg").show()
        }
        else{
            $("#bachelor_deg").hide()
            $("#Master_deg").hide()
        }

        if(deg.val() == "ug"){
            $("#bachelor_deg").show()
            $("#Master_deg").hide()
        }
        
        if(deg.val() == "phd"){
            $("#bachelor_deg").show()
            $("#Master_deg").show()
        }

        // clg name

    
})

$("#bachelor_deg").on("click",function(){
    if($("#ugDeg").val() != ""){
        $("#ug_college_list").show()
        
    }
    else{
        $("#ug_college_list").hide() 
        
    }
    
    
    // alert(1)

    
    
    
   })

   $("#Master_deg").on("click",function(){
    if($("#pgDeg").val() != ""){
        $("#pg_college_list").show()
        $("#ug_college_list").show()
    }
    else{
        $("#pg_college_list").hide()
       
    }
   })


   $("#ug_college_list").on("click",function(){
// alert(1)

if($("#ugDeg_college").val() == "other"){
$("#other_ug").show()
}
else{
    $("#other_ug").hide()
}
   })



   $("#pg_college_list").on("click",function(){
    // alert(1)
    
    if($("#pgDeg_college").val() == "other"){
        $("#other_ug").show()
    $("#other_pg").show()
    }
    else{
        $("#other_pg").hide()
    }
       })
}
qual()


$("#nextBtn").on("click",function(){
    if($("#qualification").val() == ""){
        $("#Qual_err").show() 
        // alert(2)
    }
    else{
        $("#Qual_err").hide() 
    }

    if($("#Year_prac_start").val() == ""){
$("#Year_prac_start_err").show()
    }
    

    else if($("#Year_prac_start").val().length != "4"){
        $("#Year_prac_start_err").html("** Invalid Year")
        $("#Year_prac_start_err").show()
            }
            else{
                $("#Year_prac_start_err").hide();
                $("#AddDetail").hide();
                $("#EduDetail").hide();  
                $("#security").show();
                $("#prevBtn").hide();
                $("#prevBtn_2").show()
                $("#nextBtn").hide()
                $("#pincode").hide()
                $("#submit").show()
            }

    
   
})

$("#prevBtn_2").on("click",function(){
    $("#EduDetail").show();  
    $("#prevBtn_2").hide()
    $("#AddDetail").hide();
    $("#security").hide();
    $("#submit").hide();
    $("#pincode").hide();
    $("#prevBtn").show()
    $("#nextBtn").show()
})

$("#submit").on("click",function(e){
    e.preventDefault();
    var pass = $("#pass");
    var cpass = $("#cpass");
    

    if(pass.val() == ""){
        $("#pass_err").show()
    }
    else if(pass.val().length < 8){
        $("#pass_err").html("** Weak Password **")
        $("#pass_err").show()
    }
    else{
        $("#pass_err").hide()
    }
    if(cpass.val() == ""){
        $("#cpass_err").show()
    }
    else if(pass.val() != cpass.val()){
        $("#cpass_err").html("** Password Not Match **")
        $("#cpass_err").show()
    }
    else{
        $("#cpass_err").hide()
// alert($("#doc_id").val() + $("#pin").val() + $("#state").val() + $("#qualification").val() + $("#pgDeg").val() +  $("#Year_prac_start").val() + $("#pass").val())
        $.ajax({
            url: "restdata.php",
            type: "POST",
            data: {
                doc_id : $("#doc_id").val() ,
pin_ins :  $("#pin").val(),
state_ins :   $("#state").val() ,
dis_ins :    $("#dis").val(),
city_ins :    $("#city").val(),
buildname_ins :   $("#build_name").val() ,
qual_ins :    $("#qualification").val(),
ugDeg_ins :    $("#ugDeg").val(),
pgDeg_ins :    $("#pgDeg").val(),
ugc_ins :    $("#ugDeg_college").val(),
oucn_ins :   $("#other_ug_college_name").val() ,
opcn_ins :   $("#other_pg_college_name").val() ,
pgc_ins :    $("#pgDeg_college").val(),
yps_ins :   $("#Year_prac_start").val() ,
pass_ins :   $("#pass").val() ,

            },
            success : function(data){
                if(data == 1){
                    $("#regform").trigger("reset");
                    window.location.href = "upload.php";

                }
                else{
                    alert("Problem in insertion")
                }
            }
        })
    }
    

})


})