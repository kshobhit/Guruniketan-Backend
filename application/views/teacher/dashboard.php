<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teacher's Dashboard</title>

    <!-- Bootstrap -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
    
    <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-timepicker.min.css" rel="stylesheet" />

    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>

    <script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js'></script>


   <script type="text/javaScript">    
      var email="<? echo json_encode($_SESSION['logged_in']['user_email']); ?>";
      
    </script>
    <script type="text/javaScript" src='<?php echo base_url();?>assets/js/main.js'></script>


    
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

   
  

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
<?php echo $this->session->userdata['logged_in']['picture_url'];?>
<!--<?php echo $_SESSION['logged_in']['user_email']; ?> -->

<div class="container-fluid">
<div class="row">

  <div class="col-lg-3">
  <!-- Profile Section -->
    <div class="profile filled">
        <img src="<?php echo base_url($this->session->userdata['logged_in']['picture_url']); ?>" class="icon-img" height="100" width="100">
     <!--  <a href="<?php echo base_url();?>index.php/upload"><img src="./assets/img/user-icon.png" class="icon-img" height="100" width="100"></a> -->
        <h5><a href="<?php echo base_url();?>index.php/upload">Change Profile Pic</a></h5>
        <h5><a href="<?php echo base_url();?>index.php/validate/teacher_edit_profile">Update your Profile</a></h5>
        <h5><a href="<?php echo base_url();?>index.php/validate/logout">Logout</a></h5>
   </div>

   <!-- History And Session -->
   <div class="history filled">

    <h3>Session Details</h3>
    <p class="session">Here will be some details about the session of the teacher</p>
    <h5><a href="#" class="btn btn-warning">Know More </a></h5>

    <hr style="border: 1px solid rgba(255,152,0 ,1); width: 90%;">

     <h3>Payment Details</h3>
    <p class="session">Here will be some details about the payments of the teacher</p>
    <h5><a href="#" class="btn btn-warning">Know More </a></h5>

   </div>

   <!-- Students' Feedback -->
   <div class="feedback filled">

    <h3> Students' Feedback </h3>
    <div class="blockquote">
      <p>Some comments about the teacher...</p>
      <h6>~Student Name</h6>
    </div>
     <div class="blockquote">
      <p>Some comments about the teacher...</p>
      <h6>~Student Name</h6>
    </div> 
    <div class="blockquote">
      <p>Some comments about the teacher...</p>
      <h6>~Student Name</h6>
    </div>

   </div>

  </div>

  <div class="col-lg-6">
    <div class="calendar-container filled">

    <h1>Teachers' Dashboard</h1>
  
     <div class="col-md-12 column">
        <div id='calendar'></div>
     </div>
     

    </div>    
  </div>

  <div class="col-lg-3">
    
    <div class="sessions filled">
    <h2>Upcoming Sessions</h2>

    <div class="session-card">
      <h3>Std X</h3>
      <h4>Mathematics</h4>
      <h4>7 PM IST</h4>
      <a href="<?php echo base_url();?>index.php/validate/student_registration" class="btn btn-warning">Join Here</a>
      <br>
    </div>
    
     <div class="session-card">
      <h3>Standard</h3>
      <h4>Subject</h4>
      <h4>Timing</h4>
      <a href="<?php echo base_url();?>index.php/validate/student_registration" class="btn btn-warning">Join Here</a>
      <br>
    </div> 

    </div>


    </div>

  </div>

</div>

<div class="footer">

<h3>here comes the footer</h3>

</div>

  
</body>
</html>