<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Sign Up Page</title>

    <!-- Bootstrap -->
   <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


  <script src=<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
   <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
  <style type="text/css">
    *{
      font-family: 'Slabo 27px', serif;
    }
  </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
  
  .hidden{
    display: none;
  }
  .styledup{
    color:rgba(255,152,0 ,1);
    background-color: white;
  }
</style>
<body style="background-color: rgba(96,125,139 ,0.8);">

<div class="page-wrapper"> 
  <div class="hidden container">

    <h1 style="padding-left: 3%;color:white;"> Email Address Unverified! </h1>

    <div class="container styledup">

    <h3> Your Email address is not yet verified. Kindly check for the verification mail in your Inbox and verify. </h3>
    <h2 style="text-align: center;">OR</h2>

    <center>
       <a href="<?php echo base_url();?>index.php/validate/login" class="btn btn-primary" >Login</a>

          </center>
    <br>
    </div>

  </div>
<br><br>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
     
        <script>
            
            $(document).ready(function(){
             $('.hidden').fadeIn(3000).removeClass('hidden');
            });
        </script> 
</body>
</html>