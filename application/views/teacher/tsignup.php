<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SignUp Page</title>

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
    <!-- Layer for login box -->
      <div class="layer">
      <div class="col-lg-2"></div>

      <div class="col-lg-8 SignUp_box">
          <h3><i class="fa fa-user"></i> SignUp </h3><br>
          <?php echo form_open("validate/Signup");?> 

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="txt_username" name="txt_username" class="form-control styled" placeholder="Enter your Username">
                 
              </div>
              <div class="form-group">
                <label for="username">Password</label>
                <input type="password" id="txt_password" name="txt_password" class="form-control styled" placeholder="Enter your Password">
                
              </div>
              <div class="form-group">
                <label for="username">Password</label>
                <input type="password" id="conf_password" name="txt_password" class="form-control styled" placeholder="Confirm Your Password">
                 
             
             <center><input type="submit" name="btn_login" class="btn btn-styled" value="SignUp"></center><br>

                <?php echo form_close(); ?>
          </div>
      <div class="col-lg-2"></div>
      </div>
    </div> 
    </div>      