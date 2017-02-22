<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit your Details</title>

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
<body id="signup-teachers">

<div class="page-wrapper"> 
  <div class="signup">

    <h1>Edit your Details</h1>

    <div class="signup-container">
    <hr style="border:1px solid rgba(255,152,0 ,1); width: 90%;">
      <form>

    
     
      

       <div class="form-group">
       <label for="preferences">Preferences</label>
       <div class="container">
       <input type="checkbox" name="newsletter"> Send me news and information about new courses, teachers and offers
       <br>
       <input type="checkbox" name="careers"> Send me careers related news and information from guruniketan.com partners
       <br>
       <input type="checkbox" name="newsletter"> Share my progress and attendance with my guardian
       <br>
       </div>
       </div>
        
     
        <div class="form-group">
        <label for="">Educational Board:</label>
        <div class="container">
        <div class="col-md-3">
           <input type="checkbox" name="icse"> ICSE
        </div>
        <div class="col-md-3">   
           <input type="checkbox" name="cbse"> CBSE
        </div>

        </div>
        </div>

       

        <div class="form-group">
        <label for="name">Address: </label>
        <div class="container">
          <div class="row">
              <div class="col-md-6">
              <input type="text" name="city" class="form-control" placeholder="City"><br>
              </div>
          </div>
          <div class="row">    
              <div class="col-md-6">
              <input type="text" name="state" class="form-control" placeholder="State"><br>
              </div>
          </div>   
          <div class="row">
              <div class="col-md-6">
              <input type="text" name="country" class="form-control" placeholder="Country"><br>
              </div>
          </div>
          <div class="row">    
              <div class="col-md-6">
              <input type="text" name="pincode" class="form-control" placeholder="Pincode"><br>
              </div>
          </div>    
              </div>
        </div>



         <div class="form-group">
            <label for="email">Email address:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="contact">Contact: </label>
            <div class="container">
            <div class="col-md-6">
            <input type="tel" class="form-control" id="phone" placeholder="Phone">
            </div>
            </div>
        </div>

      
       <center><input type="submit" class="btn btn-warning" value="Sign Up"></center>
<br><br>
      </form>

    </div>

  </div>
<br><br>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>      
</body>
</html>