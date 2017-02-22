<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Written by shobhit  				14/11/2016 
	*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title>login success</title>
    </head>
    <body>
        <h1>Home</h1>
        
   		<h2>Welcome <?php echo $title;?></h2>
   	<div class="content">
  
  	<p>This section can be accessed by  users and Admin.</p>
 	 <h4><?php echo anchor("validate/logout", 'Logout'); ?></h4>
	</div><!--<div class="content">-->
   		

    </body>
</html>

