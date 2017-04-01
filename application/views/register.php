<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Page</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dropbtn.css'); ?>" rel="stylesheet">

 <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/dropbtn.js'); ?>"></script>
   <!-- Font Awesome Icons -->
  <script src="https://use.fontawesome.com/0fd0e3f0a4.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
    <div class="background"><br>
      <center><h1 style="color:white;">Logo Goes here</h1></center>
    <!-- Layer for Registration box -->
      <div class="layer">
      <div class="col-lg-2"></div>

      <div class="col-lg-8 Register_box">
          <h3><i class="fa fa-user"></i> Register </h3><br>
          <?php echo form_open("validate/register");?> 

              <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" id="txt_username" name="user_email" class="form-control styled" placeholder="Enter your Username">
                 <span class="text-danger"><?php echo form_error('user_email'); ?></span>
              </div>
              <div class="form-group">
                <label for="username">Password:</label>
                <input type="password" id="txt_password" name="user_password" class="form-control styled" placeholder="Enter your Password">
                 <span class="text-danger"><?php echo form_error('user_password'); ?></span>

              </div>
              <div class="form-group">
                <label for="username">Confirm Password:</label>
                <input type="password" id="txt_password" name="passconf" class="form-control styled" placeholder="Enter your Password">
                 <span class="text-danger"><?php echo form_error('passconf'); ?></span>
              </div>

              <div class="form-group">
              <label for="">I am:</label>
              <div class="container">
              <div class="col-md-3">
                 <input type="radio" name="reg_type" value="teacher">Teacher
              </div>
              <div class="col-md-3">   
                 <input type="radio" name="reg_type" value="student">Student
              </div>
              </div>
              </div>


              <center><input type="submit" name="btn_login" class="btn btn-styled" value="Register!"></center><br>
            <div>
             <center> <input type="hidden" name="rmShown" value="1">                                      
            <a href="<?php echo base_url();?>index.php/validate/login">Already have an account? Login</a></center>
            </div>
                

           </div>
