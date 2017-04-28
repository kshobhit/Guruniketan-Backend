<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/style2.css'); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.7/jquery.min.js"></script>
 	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
 	<script src="https://use.fontawesome.com/0fd0e3f0a4.js"></script>
 	 <style type="text/css">
    *{
      font-family: 'Slabo 27px', serif;
      .box{
      border:1px solid rgba(255,152,0 ,1);}
    }
  </style>
</head>
<body>
<?php foreach ($details as $row): ?>
<div class="container">

  <div class="box">
    <div class="row">

    <div class="col-md-3">
    
    <center>
    <img src="<?php echo base_url('assets/img/user-icon.png'); ?>" class="img-responsive" style="width: 70%;padding: 3%;">
    </center>
    </div>
    <div class="col-md-9">
    
    <!-- <?php echo $row->batch_id;?>-->  
    <h3>Name: <?php echo $row->user_fname;?> <?php echo $row->user_lname;?> 
 </h3>
    <h3>Details: Has teaching experience of <?php echo $row->user_exp_years;?>Years and <?php echo $row->user_exp_months;?> months </h3>
    <h4>Fees:Rs.<?php echo $row->fee;?> for a month</h4>
    <h4>Currently enrolled: <?php echo $row->enrolled;?></h4>

     <h4>Batch Details: </h4>
    <ul type="disc">
    <li>Every Monday at 5PM</li>
      <ul type="circle"> 
        <li>01 May 2017 - 21 May 2017 :<?php echo $row->subject;?> </li>

        <li>01 May 2017 - 21 May 2017 : Organic Chemistry</li>

        <li>01 May 2017 - 21 May 2017 : Organic Chemistry</li>
      </ul>
    </ul>
    <ul type="disc">
    <li>Every Monday at 5PM</li>
      <ul type="circle"> 
        <li>01 May 2017 - 21 May 2017 : Organic Chemistry</li>

        <li>01 May 2017 - 21 May 2017 : Organic Chemistry</li>
        
        <li>01 May 2017 - 21 May 2017 : Organic Chemistry</li>
      </ul>
    </ul>

    </div>
    <?php if (!$this->session->userdata('logged_in') ):?>
    <div>
         <center><a href="<?php echo base_url();?>index.php/validate/login" class="btn btn-warning">Book now</a></center>
     </div>
    <?php else:?>
     <div>
         <center><a href="<?php echo base_url();?>index.php/access/enroll" class="btn btn-warning">Book now</a></center>
     </div>
     <?php endif; ?>
     
    </div>
  </div>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php endforeach; ?>
  </body>
</html>