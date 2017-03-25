
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

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

      <div class="col-lg-8 login_box">
          <h3><i class="fa fa-user"></i> Login </h3><br>
          <?php echo form_open("validate/login");?> 

              <div class="form-group">
                <label for="username">UserID</label>
                <input type="email" id="txt_username" name="user_email" class="form-control styled" placeholder="Enter your Username">
                 <span class="text-danger"><?php echo form_error('user_email'); ?></span>
              </div>
              <div class="form-group">
                <label for="username">Password</label>
                <input type="password" id="txt_password" name="txt_password" class="form-control styled" placeholder="Enter yout Password">
                 <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
              </div>
             
             <center><input type="submit" name="btn_login" class="btn btn-styled" value="Login"></center><br>

                <?php echo form_close(); ?>
            <div>
            <input type="hidden" name="rmShown" value="1">                                      
            <a id="link-forgot-passwd" class="need-help" href="#myModalForgot" data-toggle="modal" data-target="#myModalForgot">Forgot password? </a>
            </div>

              <center>
                <a href="<?php echo base_url();?>index.php/Fb_authentication"><i class="fa fa-facebook-square fa-4x"></i></a>
                <a href="<?php echo base_url();?>index.php/Google_authentication"><i class="fa fa-google-plus-square fa-4x"></i></a>

                <br><br>
                <div class="dropdown">                                                           <button onclick="myFunction()" class="dropbtn">Sign Up</button>
                  <div id="myDropdown" class="dropdown-content">
                    <button type="button" class="btn btn-styled2" data-toggle="modal" data-target="#myModalTeacher">Teacher</button>
                    <button type="button" class="btn btn-styled2" data-toggle="modal" data-target="#myModalStudent">Student</button>

                  <!--  <a href="<?php echo base_url();?>index.php/validate/student_registration">Student</a>-->
                  </div>
                </div>
              </center>
      </div>
      <div class="col-lg-2"></div>
      </div>
    </div>

  <!-- Modal Sign Up for Teacher -->
<div class="modal fade" id="myModalTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="teachers-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up as Teacher</h4>
      </div>
      <div class="modal-body">
       
       
      <center>
          
          <h2>Sign Up with </h2>

                <a href="<?php echo base_url();?>index.php/Fb_authentication"><img src="./assets/img/fb.png" ></a>
                <a href="<?php echo base_url();?>index.php/Google_authentication"><img src="./assets/img/google.png"></a>

                <h3>OR
                <br>
                Enter your Details below...
                </h3>


      </center>



       <?php echo form_open("validate/teacherSignup");?>
        
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" name="user_email" placeholder="Enter your email address ">
          <span class="text-danger"><?php echo form_error('user_email'); ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="user_password" placeholder="Enter your password">
          <span class="text-danger"><?php echo form_error('user_password'); ?></span>
        </div>
        
        <div class="form-group">
          <label for="confpassword">Confirm Password:</label>
          <input type="password" class="form-control" name="confpassword" placeholder="Confirm your password">
        </div>


         <div class="modal-footer">
           <button type="submit" class="btn btn-styled2">Sign Up!</button>
        </div>
       <?php echo form_close(); ?>
    </div>
  </div>
</div>
</div>


  <!-- Modal Sign Up for Student -->
<div class="modal fade" id="myModalStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="student-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up as Student</h4>
      </div>
      <div class="modal-body">
        
       
      <center>
          
          <h2>Sign Up with </h2>

                <a href="<?php echo base_url();?>index.php/Fb_authentication"><img src="./assets/img/fb.png" ></a>
                <a href="<?php echo base_url();?>index.php/Google_authentication"><img src="./assets/img/google.png"></a>

                <h3>OR
                <br>
                Enter your Details below...
                </h3>


      </center>



       <?php echo form_open("validate/studentSignup");?>
       <?php echo validation_errors(); ?>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" name="user_email" placeholder="Enter your email address ">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="user_password" placeholder="Enter your password">
        </div>
        
        <div class="form-group">
          <label for="confpassword">Password:</label>
          <input type="password" class="form-control" name="confpassword" placeholder="Confirm your password">
        </div>


         <div class="modal-footer">
           <button type="submit" class="btn btn-styled2">Sign Up!</button>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
</div>
 


<!-- Modal for Forgot Password -->
<div class="modal fade" id="myModalForgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="password-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Your Password</h4>
      </div>
      <div class="modal-body">
      
       
      <center>
          
          <h3> Kindly provide us with your email account so we can send you the link to reset your password. </h3>
      </center>



        <?php echo form_open("validate/forgot");?>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" name="user_email" placeholder="Enter your email address ">
        </div>


         <div class="modal-footer">
           <button type="submit" class="btn btn-styled2">Reset Password</button>
        </div>
       <?php echo form_close(); ?>
    </div>
  </div>
</div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('form.jsform').on('submit', function(form){
            form.preventDefault();
            $.post('/index.php/validate/reset_password', $('form.jsform').serialize(), function(data){
                $('div.jsError').html(data);
            });
        });
    });

    </script> 
    <script>
      $(document).ready(function(){
        $('form.jsform1').on('submit', function(form){
            form.preventDefault();
            $.post('/index.php/validate/teacher_signup', $('form.jsform1').serialize(), function(data){
                $('div.jsError').html(data);
            });
        });
    });

    </script>   

  </body>
</html>