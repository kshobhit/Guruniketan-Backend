<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('DB_access');
    }
    
    public function index(){
		// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook-api-php-client/facebook.php";
		
		// Facebook API Configuration
		$appId = '1217526804982446';
		$appSecret = 'ce48872acce8e9f4e17b3b02c601c7bb';
		$redirectUrl = base_url() . 'index.php/user_authentication/';
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if ($fbuser) {
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['user_fname'] = $userProfile['first_name'];
            $userData['user_lname'] = $userProfile['last_name'];
            $userData['user_email'] = $userProfile['email'];
			$userData['user_gender'] = $userProfile['gender'];
			$userData['user_locale'] = $userProfile['locale'];
            $userData['user_profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['user_picture_url'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
            $userID = $this->DB_access->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
		$this->load->view('user_authentication/facebook',$data);
    }
	
	public function logout() {
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/validate/login');
    }
}
