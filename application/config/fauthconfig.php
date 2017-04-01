<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Your application client ID, provided post app registry in your Facebook APIs Console 
$config['app_id'] = "1115209191935522";
// Your application client secret, provided post app registry in your Google APIs Console 
$config['app_secret'] = "de775d75e680f1d820b9dba1843d21d7";
// Your application's redirect URL (will be used to redirect user)
$config['redirect_Url_teacher']= "http://localhost/codeigniter/index.php/Fb_authentication/teacher";
$config['redirect_Url_student']= "http://localhost/codeigniter/index.php/Fb_authentication/student";
?>