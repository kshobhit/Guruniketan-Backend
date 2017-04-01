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

<?php if (!$this->session->userdata('logged_in')):?>
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
      <div class="collapse navbar-collapse" id="nav1">
        <ul class="nav navbar-nav">
                
        </ul>
         <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ICSE<span class="caret"></span></a>
            <ul class="dropdown-menu">

            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
        

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> CBSE<span class="caret"></span></a>
            <ul class="dropdown-menu">

            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>

        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-styled"><i class="fa fa-search"></i></button>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url();?>index.php/validate/teacher_details">Join As Teacher</a></li> 
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Login/Register<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>index.php/validate/login/">User Login</a></li>
              
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/Admin">Admin Login</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url();?>index.php/validate/register">Register Here!</a></li>
             
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
        <ul class="nav navbar-nav">
                
        </ul>
         <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ICSE<span class="caret"></span></a>
            <ul class="dropdown-menu">

            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
        

        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> CBSE<span class="caret"></span></a>
            <ul class="dropdown-menu">

            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>

        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-styled"><i class="fa fa-search"></i></button>
        </form>

        <ul class="nav navbar-nav navbar-right">
         <!-- <li><a href="<?php echo base_url();?>index.php/validate/teacher_details">Join As Teacher</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata['logged_in']['name'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>index.php/validate/userDashboard/">Dashboard</a></li>
              
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

<!-- End Of Footer Component include scripts at each page end. -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>  

</body>
</html>