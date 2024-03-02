$("document").ready(function(){
    var fname = $("#Fname");
    var lname = $("#Lname");
    var email = $("#email");
    var contact = $("#contact");
    var gender = $("#gender");
    var dob = $("#dob");
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $("#form").on("submit",function(e){
e.preventDefault();
       if(fname.val() == "" ){
        $("#Fname_err").show()
       }
       else{
        $("#Fname_err").hide()
       }

       if(lname.val() == "" ){
        $("#Lname_err").show()
       }
       else{
        $("#Lname_err").hide()
       }

       if(email.val() == "" ){
        $("#email_err").show()
       }
       else if(!filter.test(email.val())){
$("#email_err").css("display","block")
$("#email_err").html("** Please provide a valid email address **")
 $("#email_err").show();
}
       else{
        $("#email_err").hide()
       }

       if(contact.val() == "" ){
        $("#contact_err").show()
       }
       else if(contact.val().length > 10){
$("#contact_err").css("display","block")
$("#contact_err").html("** Phone Number Must be off 10 digits **");
 $("#contact_err").show();
}

else if(contact.val().length < 10){
$("#contact_err").css("display","block")
$("#contact_err").html("** Phone Number Must be off 10 digits **");
 $("#contact_err").show();
}


       else{
        $("#contact_err").hide()
       }

       if(gender.val() == "Select Gender" ){
        $("#gender_err").show()
       }
       else{
        $("#gender_err").hide()
       }




       if(dob.val() == "" ){
        $("#dob_err").show()
       }
       else{
        $("#dob_err").hide()
       }

       $.ajax({
        url: "DocPersonal_Ins.php",
        type: "POST",
        data:{
            fname : fname.val(),
            lname: lname.val(),
            email : email.val(),
            dob: dob.val(),
            contact: contact.val(),
            gender: gender.val() },
    success: function(data){
        if(data==1){
            $("#form").trigger("reset")
window.location.href="register.php";
        }
    }
      
    })
// alert(fname.val() + lname.val() + dob.val() + gender.val() + email.val())
  
})
})
      