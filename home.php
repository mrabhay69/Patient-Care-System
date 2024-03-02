
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- linking start -->
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style3.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/feedback.css">


    <!-- linking end -->
    <style>
        .hero{
    background-image: url("images/x.webp");
    background-size: 100% 700px;
    background-repeat: no-repeat;
    width: 100%;
    height: 600px;;
    position: relative;
    box-shadow: hsla(0, 0%, 100%, 0.4);
}
.slide-container{
    /* background-image: url('images/bg3.webp'); */
    /* background-size: 100% 600px; */
    
    height: 600px;
    width: 100%;
    position: relative;
    
}

#book_app{
    cursor: pointer;
}
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>

</script>
<body>
    
    <?php include("navbar.php"); ?>
      

    <?php include("content.php");  ?>


    <!-- caraousel start -->
     <?php include("slider.php");   ?>
   <!-- caraousel enf -->


   <!-- feedback testimonial start -->
   <?php #include("feedback.php");  ?> 


    <!-- feedback testimonial end -->
    <hr>


    <!-- appointment form start -->
    <?php include("appoin.php");   ?>
    <!-- appointment form end -->


    <!-- footer start -->
     <?php include("footer.php");   ?>

    <!-- footer end -->

    <script src="js/navbar.js"></script>
<script src="js/slider.js"></script>
<script src="js/appointment.js"></script>
    <script>

</script>
</body>

</html>