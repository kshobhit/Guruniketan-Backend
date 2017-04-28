<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Students' Sign Up Page</title>

    <!-- Bootstrap -->
   <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


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
<body id="signup-students">

<div class="page-wrapper"> 
  <div class="signup">

    <h1> Student profile </h1>

    <div class="signup-container">
    <hr style="border:1px solid rgba(255,152,0 ,1); width: 90%;">
      <?php echo form_open("validate/student_registration");?> 
      <?php echo validation_errors(); ?>
      <div class="form-group">
        <label for="name">Name: </label>
        <div class="container">
          <div class="row">
              <div class="col-md-3">
              <input type="text" name="fname" class="form-control" placeholder="First Name" >
              </div>
              <div class="col-md-3">
              <input type="text" name="mname" class="form-control" placeholder="Middle Name" >
              </div>
              <div class="col-md-3">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" >
              </div>
              <div class="col-md-3"></div>
              </div>
        </div>
         </div>
                <div class="input-group form-group">
                <label for="dob">Date of Birth:</label>
                  <span class="input-group-addon" id="basic-addon1"><i style="color:black;" class="fa fa-calendar"></i></span>
                  <input type="text"  name="date" class="datepicker" aria-describedby="basic-addon1"  data-date-format="dd/mm/yyyy" >
              </div>  
                      
      

        <div class="form-group">
        <label for="Guardian">Guardian details</label>
         <div class="container">
          <div class="row">
              <div class="col-md-3">
              <input type="text" name="gfname" class="form-control" placeholder="First Name">
              </div>
              <div class="col-md-3">
              <input type="text" name="gmname" class="form-control" placeholder="Middle Name">
              </div>
              <div class="col-md-3">
              <input type="text" name="glname" class="form-control" placeholder="Last Name">
              </div>
              <div class="col-md-3"></div>
              </div>
        </div>
        </div>
        
        <div class="form-group">
        <label for="gender">Gender</label>
        <div class="container">
        <select name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="na">Prefer Not to disclose</option>

        </select>
        </div>
        </div>


        <div class="form-group">
        <label for="">Educational Board:</label>
        <div class="container">
        <div class="col-md-3">
           <input type="radio" name="board" value="ICSE"> ICSE
        <div class="col-md-3">   
           <input type="radio" name="board" value="CBSE">CBSE
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

   <!--      <div class="form-group">
            <label for="email">Email address:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            </div>
        </div>
   -->    
        <div class="form-group">
            <label for="contact">Contact: </label>
            <div class="container">
            <div class="col-md-6">
            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Phone">
            </div>
            </div>
        </div>
    
  <!--       <div class="form-group">
            <label for="password">Password:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter a password">
            </div>
            </div>
        </div>

         <div class="form-group">
            <label for="password">Confirm Password:</label>
            <div class="container">
            <div class="col-md-6">
            <input type="password" name="confirmpass" class="form-control" id="cpass" placeholder="Confirm password">
            </div>
            </div>
        </div>
        <br>
    -->    
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
  <script type="text/javascript" src="assets/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>      
</body>
</html>