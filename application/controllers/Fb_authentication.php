<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fb_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');
		
		//Load user model
		$this->load->model('DB_access');
    }
    
    public function teacher(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['activated'] = '1';
            $userData['reg_type'] = 'teacher';
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
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('logged_in',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url_teacher();
        }
        //print_r($data);
        /*if(!empty($data['authUrl']))
            {
                redirect('https://www.facebook.com/v2.6/dialog/oauth?client_id=1115209191935522&state=8f291fb49c1a2fb2eb09ed537a3807dc&response_type=code&sdk=php-sdk-5.0.0&redirect_uri=http%3A%2F%2Flocalhost%2Fcodeigniter%2Findex.php%2FFb_authentication%2F&scope=email');

            }*/
        
        $this->load->view('home',$data);
		
		// Load login & profile view
        //$this->load->view('user_authentication/facebook',$data);
    }

    public function student(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['activated'] = '1';
            $userData['reg_type'] = 'student';
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
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('logged_in',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url_student();
        }
        //print_r($data);
        /*if(!empty($data['authUrl']))
            {
                redirect('https://www.facebook.com/v2.6/dialog/oauth?client_id=1115209191935522&state=8f291fb49c1a2fb2eb09ed537a3807dc&response_type=code&sdk=php-sdk-5.0.0&redirect_uri=http%3A%2F%2Flocalhost%2Fcodeigniter%2Findex.php%2FFb_authentication%2F&scope=email');

            }*/
        
        $this->load->view('home',$data);
		
		// Load login & profile view
        //$this->load->view('user_authentication/facebook',$data);
    }

	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        redirect('/Fb_authentication');
    }
}
