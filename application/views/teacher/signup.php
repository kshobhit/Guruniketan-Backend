<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teachers' Sign Up Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


  <script src=<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
   <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
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
<body id="signup-teachers">

<style>
.navbar-styled {
  background-color: white;
}

.navbar-styled .navbar-nav li a{
  color: rgba(255,152,0 ,1);
} 

.navbar-fixed-top .navbar-nav li a{
  color:white;
}

.navbar-fixed-top .navbar-nav .dropdown-menu li a{
  color: rgba(255,152,0 ,1);
}
 
.navbar-fixed-top{
  background-color: rgba(96,125,139 ,0.8);
}


</style>


<div style="background-color: white; height: 100%">
  <div class="top" style="background-color: white; color:rgba(255,152,0 ,1); padding-top: 1%" >
      <div class="toplinks" style="text-align: right;padding-right: 4%;">
      <a href="#"><i class="fa fa-user" style="color: rgba(255,152,0 ,1);"></i> My Account</a>
      <br>
      </div>
      </div>
  </div>

<nav class="navbar navbar-static-top  navbar-styled">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="assets/img/logo.png" height="50" width="50">    
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="page-wrapper"> 
  <div class="signup">

    <h1> Sign Up As a Teacher </h1>

    <div class="signup-container">
    <hr style="border:1px solid rgba(255,152,0 ,1); width: 90%;">
      <?php echo form_open("validate/teacher_registration");?> 
      <?php echo validation_errors(); ?>
      <div class="form-group">
        <label for="name">Name: </label>
        <div class="container">
          <div class="row">
              <div class="col-md-3">
              <input type="text" name="fname" class="form-control" placeholder="First Name">
              </div>
              <div class="col-md-3">
              <input type="text" name="mname" class="form-control" placeholder="Middle Name">
              </div>
              <div class="col-md-3">
              <input type="text" name="lname" class="form-control" placeholder="Last Name">
              </div>
              <div class="col-md-3"></div>
              </div>
        </div>

      </div>
        <div class="input-group form-group">
        <label for="dob">Date of Birth:</label>
          <span class="input-group-addon" id="basic-addon1"><i style="color:black;" class="fa fa-calendar"></i></span>
          <input type="text"  name="date" class="datepicker" aria-describedby="basic-addon1"  data-date-format="dd/mm/yyyy">
      </div>  
                     
              
        <div class="form-group">
          <label for="qualification">Qualifications:</label>
          <div class="container">
            <select name="qualification">
              <option value="PHD">Opt1</option>
              <option value="">Opt2</option>
              <option value="">Opt3</option>
              <option value="">Opt4</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
        <label for="experience">Teaching Experience:</label>
        <div class="container">
        <div class="col-md-3">
          <input type="text"  class="form-control"  name="exp-years" placeholder="Years">
        </div>
        <div class="col-md-3">
          <input type="text"  class="form-control"  name="exp-months" placeholder="Months">
        </div>
        </div>
        </div>        

        <h3 >Interests</h3>
        <div class="form-group">
        <label for="">Educational Board:</label>
        <div class="container">
        <div class="col-md-3">
           <input type="radio" name="board" value="ICSE"> ICSE
        </div>
        <div class="col-md-3">   
           <input type="radio" name="board" value="CBSE">CBSE
        </div>

        </div>
        </div>

         <div class="form-group">
        <label for="">Standard:</label>
        <div class="container">
        <div class="col-md-2">
           <input type="radio" name="class" value="IX"> IX
        </div>
        <div class="col-md-2">   
           <input type="radio" name="class" value="X"> X
        </div>
         <div class="col-md-2">   
           <input type="radio" name="class" value="XI"> XI
        </div>
         <div class="col-md-2">   
           <input type="radio" name="class" value="XII"> XII
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
              <label for="state">State:</label>
              <select name="state" style="width: 100%;">
              <option value="andra">Andra Pradesh </option>
              <option value="arunachal">Arunachal Pradesh</option>
              <option value="assam">Assam</option>
              <option value="bihar">Bihar</option>
              <option value="chattis">Chattisgarh</option>
              <option value="goa">Goa</option>
              <option value="gujarat">Gujarat</option>
              <option value="haryana">Haryana</option>
              <option value="himanchal">Himanchal Pradesh</option>
              <option value="jandk">Jammu &amp; Kashmir</option>
              <option value="jharkhand">Jharkhand</option>
              <option value="karnataka">Karnataka</option>
              <option value="kerala">Kerala</option>
              <option value="madhya">Madhya Pradesh</option>
              <option value="maharashtra">Maharashtra</option>
              <option value="manipur">Manipur</option>
              <option value="meghalaya">Meghalaya</option>
              <option value="mizoram">Mizoram</option>
              <option value="nagaland">Nagaland</option>
              <option value="orissa">Orissa</option>
              <option value="punjab">Punjab</option>
              <option value="rajasthan">Rajasthan</option>
              <option value="sikkim">Sikkim</option>
              <option value="tamil">Tamil Nadu</option>
              <option value="telangana">Telangana</option>
              <option value="tripura">Tripura</option>
              <option value="andaman">Andaman &amp; Nicobar Islands</option>
              <option value="chandigarh">Chandigarh</option>
              <option value="dadra">Dadra &amp; Nagar Haveli</option>
              <option value="daman">Daman and Diu</option>
              <option value="delhi">Delhi</option>
              <option value="lakshwadeep">Lakshwadeep</option>
              <option value="pondicherry">Pondicherry</option>

              </select>
             </div>
          </div>   
          
         <div class="row">
              <div class="col-md-6"><br>
              <label for="country">Country:</label>
              <select name="country" style="width: 100%;">
              <option value="India">India</option>
              </select>
             </div><br>
          </div>
          <div class="row">    
              <div class="col-md-6">
              <label for="pincode">Pincode:</label>
              <input type="text" name="pincode" class="form-control" placeholder="Pincode"><br>
              </div>
          </div>    
              </div>
        </div>

        <div class="form-group">
            <label for="contact">Contact: </label>
            <div class="container">
            <div class="col-md-6">
            <input type="tel" class="form-control" name="phone" placeholder="Phone">
            </div>
            </div>
        </div>

         <div class="form-group">
            <label for="password">Password:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="password" class="form-control" name="password" placeholder="Enter a password">
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="confirmpass">Confirm Password:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="password" class="form-control" name="confirmpass" placeholder="Confirm the password">
            </div>
            </div>
        </div>        <br>
       <center><input type="submit" class="btn btn-warning" value="Sign Up"></center>
<br><br>
       
    </div>
    </div>
    <?php echo form_close(); ?>
<br><br>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>


<footer>

<style>

.footlinks li a{
  color:white;
}

</style>

<div class="foot1 container-fluid" style="background-color:rgba(69,90,100 ,1); color:white; ">
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

</div>
</div>
<div class="copyrights con" style="text-align: center; background-color: rgba(96,125,139 ,0.8)">

 <div class="container" style="color:white;">
            <h4>&copy; 2017 Copyright Text</h4>
           </div>

</div>

</footer>

<script>
  $(document).scroll(function(e){
    var scrollTop = $(document).scrollTop();
    if(scrollTop > 0){
        console.log(scrollTop);
        $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
    }
});
</script>        
</body>
</html>