<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teachers' Details Page</title>

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
  <body>

          <nav class="navbar navbar-styled navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-reorder"></span>
              </button>
              <a class="navbar-brand" href="#welcome" style="color:white;" >Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#overview">Overview</a></li>
                <li><a href="#advantages">Advantages</a></li>
                <li><a href="#basic">Basic Qualificaitons</a></li>
                <li><a href="#itreq">IT Requirements</a></li>
                <li><a href="#continue">Sign Up</a></li>
                
              </ul>
             
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

  <div class="page-wrapper" id="details-page">
    <section id="welcome" class="odd-class">
    <div class="container">
      <h1> Welcome to Teachers' Section</h1>  
      <h3> It's Happy to have you aboard... let's take a look on what's in store for you...</h3>

      </div>
    </section>
    <section id="overview" class="even-class">
    <div class="container">
      <h1> This is the Overview Section</h1>  
      <h3> Displaying the overview </h3>

      </div>
    </section>
      <section id="advantages" class="odd-class">
    <div class="container">
      <h1> Advantages of being teacher at Guru Niketan</h1>  
      <h3> Data goes here!</h3>

      </div>
    </section>
    <section id="basic" class="even-class">
    <div class="container">
      <h1>Basic Qualifications</h1>  
      <h3>This section shall be contained by the data from admin panel.</h3>

      </div>
    </section>
      <section id="itreq" class="odd-class">
    <div class="container">
      <h1> IT Requirements</h1>  
      <h3>The data to be filled up!</h3>

      </div>
    </section>
    <section id="continue" class="even-class">
    <div class="container">
      <h1> Sign Up As a Teacher!</h1>  
      <h3>Click the button below to start working as a teacher at Guru Niketan.</h3>
         <button type="button" style="float:right;" class="btn btn-styled2" data-toggle="modal" data-target="#myModal">Sign Up
       </button>
      </div>
    </section>


  </div>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="teachers-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up as Teacher</h4>
      </div>
      <?php echo form_open("validate/teacher_email_verification");?>  
      <div class="modal-body">
        
        <div class="form-group">
          <label for="user_email">Email Address:</label>
          <input type="email" class="form-control" name="user_email" placeholder="Enter your email address to continue">

        </div>
        
        <p>You shall receive a validation email to verify your email address before you continue on Guru Niketan.</p>
        </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-styled2">Sign Up!</button>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
     $('a[href^="#"]').on('click', function (e) {
         e.preventDefault();

         var target = this.hash,
             $target = $(target);

         $('html, body').stop().animate({
             'scrollTop': $target.offset().top - 80
         }, 900, 'swing', function () {
             window.location.hash = target;
         });
     });
 });

    </script>
  </body>
</html>