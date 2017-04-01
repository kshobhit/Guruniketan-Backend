<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* Author Shobhit */
class Google_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
        $this->CI =& get_instance();
        // Include the google api php libraries

		$this->load->model('DB_access');
    }
    
     function teacher(){
		
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
								
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName($this->CI->config->item('application_name'));
        $gClient->setClientId($this->CI->config->item('client_id'));
        $gClient->setClientSecret($this->CI->config->item('client_secret'));
        $gClient->setRedirectUri($this->CI->config->item('redirect_url_teacher'));
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($this->CI->config->item('redirect_url_teacher'));
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'google';
            $userData['activated'] = '1';
            $userData['reg_type'] = 'teacher';
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


     function student(){
        
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName($this->CI->config->item('application_name'));
        $gClient->setClientId($this->CI->config->item('client_id'));
        $gClient->setClientSecret($this->CI->config->item('client_secret'));
        $gClient->setRedirectUri($this->CI->config->item('redirect_url_student'));
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($this->CI->config->item('redirect_url_student'));
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['activated'] = '1';
            $userData['reg_type'] = 'student';
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