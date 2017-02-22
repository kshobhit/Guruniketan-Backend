<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('DB_access');
    }
    
    public function index(){
		// Include the google api php libraries
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = '226599645213-kmt115ddkqupli7vba750k5bud2r5mca.apps.googleusercontent.com';
        $clientSecret = 'duD69_d6gLQvsloVmJGZV2CE';
        $redirectUrl = base_url() . 'index.php/google_authentication/';
		
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to GuruNiketan.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['user_fname'] = $userProfile['given_name'];
            $userData['user_lname'] = $userProfile['family_name'];
            $userData['user_email'] = $userProfile['email'];
			$userData['user_gender'] = $userProfile['gender'];
			$userData['user_locale'] = $userProfile['locale'];
            $userData['user_profile_url'] = $userProfile['link'];
            $userData['user_picture_url'] = $userProfile['picture'];
			// Insert or update user data
            $userID = $this->DB_access->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
		$this->load->view('user_authentication/google',$data);
    }
	
	public function logout() {
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/validate/login');
    }
}