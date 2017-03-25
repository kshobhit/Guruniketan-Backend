<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Your application client ID, provided post app registry in your Google APIs Console 
$config['client_id'] = "226599645213-kmt115ddkqupli7vba750k5bud2r5mca.apps.googleusercontent.com";
// Your application client secret, provided post app registry in your Google APIs Console 
$config['client_secret'] = "duD69_d6gLQvsloVmJGZV2CE";
// Your application's name (will be displayed on the Google authentication/authorization page)
$config['application_name'] = "GuruNiketan";
// Your application's API key (can be used for fetching public data without oAuth2)
$config['api_key'] = "";
// Your application's redirect URL (will be used to redirect user)
$config['redirect_url']= "http://localhost/codeigniter/index.php/google_authentication/";
?>