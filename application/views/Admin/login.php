<h4>Admin Panel</h4>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Written by shobhit  				14/11/2016 
		
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>

 <?php echo form_open("validate/index"); ?>
    Username: <input type="text" name="user_email" />
    Password: <input type="password" name="user_pwd" />
    <input type="submit" value="login" />
 <?php echo form_close(); ?>