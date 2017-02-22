<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student's Home Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


  <script src=<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
   <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
  <style type="text/css">
    *{
      font-family: 'Slabo 27px', serif;
    }

    .form-holder{
      border: 1px solid rgba(255,152,0 ,1);
      padding: 3%;
    }
  </style>

</head>
<body>

<div class="container">

<h3> Welcome to GuruNiketan </h3>
  <div class="form-holder">

  <form >

 <center> <h4>Search Your Teacher</h4> </center>
 <br>
 <div class="container">
 <div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-3">
    <div class="form-group">
    <label>
    <input type="radio" name="cbse"> CBSE
    </label>
</div>
</div>
 <div class="col-md-3">
    <div class="form-group">
    <label>
    <input type="radio" name="icse"> ICSE
    </label>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3">
<label>Select your Class</label><br>
<select name="class">
<option value="ix">IX</option>
<option value="x">X</option>
<option value="xi">XI</option>
<option value="xii">XII</option>
</select>
</div>

<div class="col-md-3">
<label>Select your Subject</label><br>
<select name="subject">
<option value="mathematics">Mathematics</option>
<option value="science">Science</option>
<option value="english">English</option>
<option value="physics">Physics</option>
<option value="chemistry">Chemistry</option>
<option value="biology">Biology</option>

</select>
</div>
</div>
</div>
<br>
<center><input type="submit" class="btn btn-success" value="Search"></center>


  </form>


  </div>
<br><br>
<style>
  .tcard{
    background-color:rgba(96,125,139 ,0.8);
    color:white;
    margin: 20px;
    padding: 12px;
    display: none;
    box-shadow: 10px 10px 5px #888888;
  }

</style>

<div class="tcard">
<div class="container">
  <div class="col-md-3">
    <br><br>
    <center><img src="./assets/img/user-icon.png" height="100" width="100"></center>

  </div>
  <div class="col-md-9">

    <h3>Teacher's Name</h3>
    <div class="row">
      <div class="col-md-6">
        <h4>Qualifications</h4>
      </div>
      <div class="col-md-6">
        <h4>Experience</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <h4>Fees</h4>
      </div>
      <div class="col-md-6">
        <h4>Rating</h4>
      </div>
    </div>

    <hr style="border:1px solid rgba(255,152,0 ,1); width: 84%;">
    <h4 style="text-align: center;">Time Slot</h4>
    <div class="row">
    <div class="col-md-3">
      <h5>Days</h5>
    </div>
    <div class="col-md-3">
      <h5>Time</h5>
    </div>
    <div class="col-md-3">
      <h5>Availability</h5>
    </div>
    <div class="col-md-3">
      <h5>Starting On.</h5>
    </div>


  </div>
</div>
</div>
</div>


<div class="tcard">
<div class="container">
  <div class="col-md-3">
    <br><br>
    <center><img src="./assets/img/user-icon.png" height="100" width="100"></center>

  </div>
  <div class="col-md-9">

    <h3>Teacher's Name</h3>
    <div class="row">
      <div class="col-md-6">
        <h4>Qualifications</h4>
      </div>
      <div class="col-md-6">
        <h4>Experience</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <h4>Fees</h4>
      </div>
      <div class="col-md-6">
        <h4>Rating</h4>
      </div>
    </div>

    <hr style="border:1px solid rgba(255,152,0 ,1); width: 84%;">
    <h4 style="text-align: center;">Time Slot</h4>
    <div class="row">
    <div class="col-md-3">
      <h5>Days</h5>
    </div>
    <div class="col-md-3">
      <h5>Time</h5>
    </div>
    <div class="col-md-3">
      <h5>Availability</h5>
    </div>
    <div class="col-md-3">
      <h5>Starting On.</h5>
    </div>


  </div>
</div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>  
  <script>
    $(document).ready(function(){
    $('.tcard').fadeIn(2000);
});
  </script>
</body>
</html>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>  
</body>
</html>