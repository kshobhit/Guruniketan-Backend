<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student's Dashboard</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Font Awesome Icons -->
  <script src="https://use.fontawesome.com/0fd0e3f0a4.js"></script>

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
<body style="background-color: rgba(96,125,139 ,0.7);">

<div class="container-fluid">
<div class="row">

  <div class="col-lg-3">
  <!-- Profile Section -->
    <div class="profile filled">
        <img src="<?php echo base_url('assets/img/user-icon.png'); ?>" class="icon-img" height="100" width="100">
         <h5><a href="<?php echo base_url();?>index.php/upload">change Profile Pic</a></h5>
        <h5><a href="<?php echo base_url();?>index.php/validate/student_edit_profile">Update your Profile</a></h5>
        <h5><a href="<?php echo base_url();?>index.php/validate/logout">Logout</a></h5>
   </div>

   <!-- History And Session -->
   <div class="history filled">

    <h3>Session Details</h3>
    <p class="session">Here will be some details about the session of the teacher</p>
    <h5><a href="#" class="btn btn-warning">Know More </a></h5>

    
   </div>

   <!-- Students' Account Information -->

   <div class="account filled">
   <h3>Account</h3>
   <p class="accounting"> Your Available balance is<br>
   <i class="fa fa-inr fa-2x" style="color:black;"></i> 800 /-</p>

   </div>
  

  </div>

  <div class="col-lg-6">
    <div class="calendar-container filled">

    <h1>Students' Dashboard</h1>
    <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=shobhit.kumar%40sunarchventures.com&amp;color=%231B887A&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="600" height="600" frameborder="0" scrolling="no"></iframe>

    </div>    

  </div>

  <div class="col-lg-3">
    
    <div class="sessions filled">
    <h2>Upcoming Sessions</h2>

    <div class="session-card">
      <h3>Std X</h3>
      <h4>Mathematics</h4>
      <h4>7 PM IST</h4>
      <a href="<?php echo base_url();?>index.php/RequestHandler" class="btn btn-warning">Join Here</a>
      <br>
    </div>
     <div class="session-card">
      <h3>Standard</h3>
      <h4>Subject</h4>
      <h4>Timing</h4>
      <a href="<?php echo base_url();?>index.php/RequestHandler" class="btn btn-warning">Join Here</a>
      <br>
    </div> 

    </div>


    </div>

  </div>

</div>

<div class="footer">

<h3>here comes the footer</h3>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>  
</body>
</html>