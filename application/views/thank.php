<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Written by shobhit  			14/11/2016 
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thankyou</title>
</head>
<div id="content">
<div class="signup_wrap">
<div class="signin_form">
 <?php echo form_open("validate/login"); ?>
  Username:
  <input type="email" id="user_email" name="user_email" />
  Password:
  <input type="password" id="user_pwd" name="user_pwd" />
  <input type="submit" class="" value="Login" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->
<h3>Thanks for registering.Please Verify Your Email Address.</h3>
</div><!--<div id="content">-->