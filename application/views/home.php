<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home Page</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/style2.css'); ?>" rel="stylesheet">
   
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.7/jquery.min.js"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
   <script src="typeahead.min.js"></script>

   <!-- Font Awesome Icons -->
  <script src="https://use.fontawesome.com/0fd0e3f0a4.js"></script>

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
  
<body>


<?php if (!$this->session->userdata('logged_in') ):?>
  <?php if(!empty($authUrl)) {
  echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
}

?>
<!-- NavBar Component -->
  <!-- *** UNDER CONSTRUCTION ***-->
  <nav class="navbar navbar-styled">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-reorder"></span>
        </button>
        <a class="brand" href="#"><img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width: 50px; height: 50px;"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
             

        <ul class="navbar-form navbar-left">
        <!--<div class="form-group">
            <input type="text" name="typeahead" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-styled"><i class="fa fa-search"></i></button>-->
          <div class="container">

          <div class="col-md-3 .col-md-offset-3">
           <?php echo form_open("access/search");?>
            <div class="form-group">
            <select name="board" class="form-control" style="background-color:rgba(96,125,139 ,0.8);color:white;">
            <option value="">Board:</option>
            <option value="ICSE">ICSE</option>
             <option value="CBSE">CBSE</option>
            </select>
            </div>

          </div>

          <div class="col-md-3 .col-md-offset-3">

            <div class="form-group">
            <select name="standard" class="form-control" style="background-color:rgba(255,152,0 ,1);color:white;">
           <option value="">Class</option>
            <option value="IX">IX</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            </select>
            </div>

          </div>

          <div class="col-md-3 .col-md-offset-3">

            <div class="form-group">
            <select name="subject" class="form-control" style="background-color:rgba(96,125,139 ,0.8);color:white;">
            <option value="">Subject:</option>
           <option value="physics">Physics</option>
           <option value="chemistry">Chemistry</option>
           <option value="maths">Maths</option>
             
            </select>
            </div>

          </div>
         <div class="col-md-3">
            <button class="btn btn-styled2" type="submit"><i class="fa fa-search"></i></button>
          </div>
          
        </ul>
        <?php echo form_close(); ?>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url();?>index.php/validate/teacher_details">Join As Teacher</a></li>
        <!--  <li><a data-toggle="modal" href="#myModalsignup">SignUp</a></li> -->
          <li><a href="<?php echo base_url();?>index.php/validate/Login/">Login</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SignUp<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a data-toggle="modal" href="#myModalTeacher">Teacher</a></li>
              
              <li role="separator" class="divider"></li>
              <li><a data-toggle="modal" href="#myModalStudent">Student</a></li>
              <li role="separator" class="divider"></li>
              
                      
            </ul>
          </li>
          </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- End of Navbar Component -->

<?php else:?>
 <nav class="navbar navbar-styled">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-reorder"></span>
        </button>
        <a class="brand" href="#"><img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width: 50px; height: 50px;"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="nav1">
         
          
        <ul class="navbar-form navbar-left">
            <div class="container">

          <div class="col-md-3 .col-md-offset-3">
           <?php echo form_open("access/search");?>
            <div class="form-group">
            <select name="board" class="form-control" style="background-color:rgba(96,125,139 ,0.8);color:white;">
            <option value="">Board:</option>
            <option value="ICSE">ICSE</option>
             <option value="CBSE">CBSE</option>
            </select>
            </div>

          </div>

          <div class="col-md-3 .col-md-offset-3">

            <div class="form-group">
            <select name="standard" class="form-control" style="background-color:rgba(255,152,0 ,1);color:white;">
           <option value="">Class</option>
            <option value="IX">IX</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            </select>
            </div>

          </div>

          <div class="col-md-3 .col-md-offset-3">

            <div class="form-group">
            <select name="subject" class="form-control" style="background-color:rgba(96,125,139 ,0.8);color:white;">
            <option value="">Subject:</option>
           <option value="physics">Physics</option>
           <option value="chemistry">Chemistry</option>
           <option value="maths">Maths</option>
             
            </select>
            </div>

          </div>
         <div class="col-md-3">
            <button class="btn btn-styled2" type="submit"><i class="fa fa-search"></i></button>
          </div>
          
        </ul>
        <?php echo form_close(); ?>

        <ul class="nav navbar-nav navbar-right">
         <!-- <li><a href="<?php echo base_url();?>index.php/validate/teacher_details">Join As Teacher</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $this->session->userdata['logged_in']['user_fname'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>index.php/validate/userDashboard/">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>index.php/validate/ChangePassword/">Change Password</a></li>
              
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/validate/logout">Logout</a></li>
                          
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    


<?php endif; ?>

<div class="cover">
<br>
<center>
<br>
<h1 style="vertical-align: middle">Welcome to</h1>
  <br>
  <span class="highlightedtext">Guru Niketan</span>
  <br><br>
  <span class="subhighlighted">The world of learning through exploration</span>
</center>
</div>

<div class="container-fluid" id="separator">

<center><h2>Choose Your Stream to Begin</h2></center>
<hr style="width: 60%; border: 1px solid rgba(255,152,0 ,1);">

</div>
  

<div class="container">

<div class="row">

<div class="col-md-3">

  <br>
<center>  <img src="<?php echo base_url('assets/img/math.png'); ?>">
    <h2>Mathematics</h2></center>

</div>
<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>

<li><a href="#">Geometry</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>
</ul>

</div>


</div>

</div>


<div class="container-fluid" id="divider">

<hr style="width: 90%; border: 1px solid rgba(255,152,0 ,1);">
</div>


<div class="container">

<div class="row">

<div class="col-md-3">

  <br>
  <center><img src="<?php echo base_url('assets/img/science.png'); ?>">
    <h2>Science</h2></center>

</div>
<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>

<li><a href="#">Geometry</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>
</ul>

</div>
</div>
</div>

<div class="container-fluid" id="divider">

<hr style="width: 90%; border: 1px solid rgba(255,152,0 ,1);">
</div>


<div class="container">

<div class="row">

<div class="col-md-3">

  <br>
  <center><img src="<?php echo base_url('assets/img/comps.png'); ?>">
    <h2>Computer Science</h2></center>

</div>
<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>

<li><a href="#">Geometry</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>

<li><a href="#">Algebra</a></li>
</ul>

</div>

<div class="col-md-3">

<ul class="subject-link" type="none">

<li><a href="#">Early Math</a></li>

<li><a href="#">Arithematic</a></li>
</ul>

</div>


</div>


</div>
<!-- Footer Component -->
<footer>
<div class="foot1 container-fluid" id="footer">
<div class="container">
<div class="row">

  <div class="col-md-6" style="text-align: center;">
  <br>
    <ul class="footlinks" type="none" style="" >
                  <li><a  href="#!">Link 1</a></li>
                  <li><a  href="#!">Link 2</a></li>
                  <li><a  href="#!">Link 3</a></li>
                  <li><a  href="#!">Link 4</a></li>
   </ul>

  </div>
  <div class="col-md-3" style="text-align: center;">
 
     <h3> <i style="color:white;" class="fa fa-headphones fa-3x"></i><br> +91 8080808080</h3>
     <h4>Get in touch with Us</h4>
     

  </div>
  <div class="col-md-3" style="text-align: center;">

    <h3> <i style="color:white;" class="fa fa-envelope-o fa-3x"></i> <br> help@guruniketan.com</h3>
    <h4> Or Mail Us</h4> 

  </div>


</div>

<hr style="width: 90%; border: 1px solid white">
<h4 style="text-align: center; color:white">Copyrights &copy; 2017. GuruNiketan. All rights reserved.</h4>
  
</div>

</div>

</footer>

<!--+++++++++++++++++++++++++++-Modals Section++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--
<div class="modal fade" id="myModalsignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="signup-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up </h4>
      </div>
      <?php echo form_open("validate/register");?>  
      <div class="modal-body">
        
        <div class="form-group">
          <label for="user_email">Email Address:</label>
          <input type="email" class="form-control" name="user_email" placeholder="Enter your email address to continue">

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
            <fieldset>
              <div class="some-class">
              <label for="">I am:</label>
              <div class="container">
              <div class="col-md-3">
                <input type="radio" class="radio" name="reg_type" value="teacher" >Teacher
              </div>
              <div class="col-md-3">  
                <input type="radio" class="radio" name="reg_type" value="student" >Student
              </div>
              </div>
              </div>
            </fieldset>
          </div>   
       
        
         <div class="modal-footer">
            <center><input type="submit" name="btn_login" class="btn btn-styled2" value="SignUp!"></center><br>
            <div>
             <center> <input type="hidden" name="rmShown" value="1">                                      
            <a href="<?php echo base_url();?>index.php/validate/login">Already have an account?</a></center>
            </div>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>-->

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

                <a href="<?php echo base_url();?>index.php/Fb_authentication/student"><img src="<?php echo base_url('assets/img/fb.png'); ?>" ></a>
                <a href="<?php echo base_url();?>index.php/Google_authentication/student"><img src="<?php echo base_url('assets/img/google.png'); ?>"></a>

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

                <a href="<?php echo base_url();?>index.php/Fb_authentication/teacher"><img src="<?php echo base_url('assets/img/fb.png'); ?>" ></a>
                <a href="<?php echo base_url();?>index.php/Google_authentication/teacher"><img src="<?php echo base_url('assets/img/google.png'); ?>"></a>

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





<!--+++++++++++++++++++++++++++-Modals Section++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- End Of Footer Component include scripts at each page end. -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>  
   <script>
    $(document).ready(function(){
      var base_url='http://localhost/codeigniter/';
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'base_url+'index.php/access/search?key=%QUERY',
        limit : 10
    });
});
    </script>

</body>

</html>