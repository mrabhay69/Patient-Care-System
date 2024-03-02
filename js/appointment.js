$(document).ready(function(){
    var n = $("#app_name");
    var contact = $("#contact");
    var email = $("#email");
    var date = $("#date");
//   var time = $("#app_time");
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
//   $("#book_app").css("color","red")
    $("#book_app").on("click",function(e){
        e.preventDefault();
        // name
  if(n.val() == ""){
    
   $("#name_err").css("display","block")
    $("#name_err").show();
   //  return false;
  }
  else{
    $("#name_err").hide();
  }
  if(date.val() == ""){
    
   $("#date_err").css("display","block")
    $("#date_err").show();
  //   return false;
 }
 else{
    $("#date_err").hide();
 }
 
//  //  time
//  if(time.val() == ""){
   
//    $("#time_err").css("display","block")
//     $("#time_err").show();
//   //   return false;
//  }
//  else{
//     $("#time_err").hide();
//  }



  // conatct
  if(contact.val() == ""){
    
    $("#contact_err").css("display","block")
     $("#contact_err").show();
   //   return false;
  }
  else if(contact.val().length > 10){
    $("#contact_err").css("display","block")
    $("#contact_err").html("** Phone Number Must be off 10 digits **");
     $("#contact_err").show();
     return false;
  }
  
  else if(contact.val().length < 10){
    $("#contact_err").css("display","block")
    $("#contact_err").html("** Phone Number Must be off 10 digits **");
     $("#contact_err").show();
     return false;
  }
  
  else if(contact.val() < 9000000000){
    $("#contact_err").css("display","block")
    $("#contact_err").html("** This is not valid Phone number **");
     $("#contact_err").show();
     return false;
  }
  
  else{
     $("#contact_err").hide();
  }
  
  //  email
  if(email.val() == ""){
    
    $("#email_err").css("display","block")
     $("#email_err").show();
   //   return false;
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
  
  //  date
  
   $.ajax({
      url: "appoint_ins.php",
      type: "POST",
      data : {
name : n.val(),
contact : contact.val(),
email : email.val(),
date: date.val(),
// time: time.val()
      },
      success: function(data){
         if(data == 1){
            alert("Thanks for Appointment We will contact you soon");
            $("#appoint_form").trigger("reset");
            console.log("done")
         }
         else{
            alert("No something went wrong");
         }

      }
   })
// alert(n.val() + contact.val() + email.val() + date.val() + time.val())
  
    })
   
    
  })