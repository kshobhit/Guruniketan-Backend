<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @author shobhit  14/11/2016 
   controller for login and registeration
*/
 
class Validate extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('DB_access','',TRUE);
   $this->load->library('form_validation');
   $this->load->helper('form');
 }
 
 function login()
 {
   //This method will have the credentials validation
   $this->form_validation->set_rules('txt_username', 'email', 'trim|required|valid_email');
   $this->form_validation->set_rules('txt_password', 'password', 'trim|required|callback_check_database');
    
  // $data['title']=$user_id;
    
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');

   }
   else
   {
    //If type is student load student dashboard
    $text = 'student';
    $result1 = $this->DB_access->get_reg_type($this->input->post('txt_username'));
     
     if($result1 == $text)
      {
        $this->load->view('student/dashboard');
      }
      //if type is teacher load teacher dashboard
      else{
       $this->load->view('teacher/dashboard');
     }
     
   }
  }
 

  //funtion for verifying email of teacher on teacher's detail page
  function teacher_email_verification()
     {
      // field name, error message, validation rules
    
      $this->form_validation->set_rules('user_email', 'Your Email', 'trim|required|valid_email');
    
       if($this->form_validation->run() == FALSE)
       {
         $this->load->view('error');
       }
      else
      {
        //call db to add user
        $this->DB_access->add_email();
        //sending confirmation mail
        $this->send_confirmation($this->input->post('user_email'));
        // call db and get activation status
        $result = $this->DB_access->get_activation_status($this->input->post('user_email'));
        //if activation status is 1,user will be able to fill signup form

        if($result)
        {
          $this->load->view('teacher/signup');
        }else{
          //viewing email not verified//
          $this->load->view('email_unverified');
        } 
      
      }
     } 

  function teacher_registration()
  {
    // field name, error message, validation rules
      $this->form_validation->set_rules('fname', 'firstname', 'trim|required');
      $this->form_validation->set_rules('mname', 'middlename', 'trim|required');
      $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
      $this->form_validation->set_rules('date', 'DOB', 'required');
      $this->form_validation->set_rules('qualification', 'Qualification', 'required');
      $this->form_validation->set_rules('exp-years', 'experience_in_years', 'trim|required');
      $this->form_validation->set_rules('exp-months', 'experience_in_months', 'trim|required');
      $this->form_validation->set_rules('board', 'board_affiliation', 'trim|required');
      $this->form_validation->set_rules('class', 'class', 'trim|required');
      //yet to validate this 
      $this->form_validation->set_rules('city', 'city', 'alpha|trim|required');
      $this->form_validation->set_rules('state', 'state', 'required');
      $this->form_validation->set_rules('country', 'country', 'trim|required');
      $this->form_validation->set_rules('pincode', 'pincode', 'numeric|trim|required|exact_length[6]');
      $this->form_validation->set_rules('phone', 'contact', 'numeric|trim|required');            
     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE)
       {
         $this->load->view('teacher/signup');
       }
      else
      {
        //call db to add teacher
        $this->DB_access->add_teacher();
        $this->load->view('teacher/dashboard');
      
      }

  }

 function student_registration()
  {
    // field name, error message, validation rules
      $this->form_validation->set_rules('fname', 'firstname', 'trim|required');
      $this->form_validation->set_rules('mname', 'middlename', 'trim|required');
      $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
      $this->form_validation->set_rules('date', 'DOB', 'required');
      $this->form_validation->set_rules('gfname', 'guardian firstname', 'trim|required');
      $this->form_validation->set_rules('glname', 'guardian lastname', 'trim|required');
      $this->form_validation->set_rules('gender', 'gender', 'required');
      $this->form_validation->set_rules('board', 'board_affiliation', 'trim|required');
      $this->form_validation->set_rules('city', 'city', 'alpha|trim|required');
      $this->form_validation->set_rules('state', 'state', 'required');
      $this->form_validation->set_rules('country', 'country', 'trim|required');
      $this->form_validation->set_rules('pincode', 'pincode', 'numeric|trim|required|exact_length[6]');
      $this->form_validation->set_rules('phone', 'contact', 'numeric|trim|required');            
     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE)
       {
         $this->load->view('student/signup');
       }
      else
      {
        //call db to add user
        $this->DB_access->add_student();
        $this->load->view('student/dashboard');
      
      }

  }


  function teacher_edit_profile()
  {
    
    $this->load->view('teacher/edit_profile');      
  }

  function student_edit_profile()
  {
    
    $this->load->view('student/edit_profile');
  }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $user_email = $this->input->post('txt_username');
   
 
   //query the database
   $result = $this->DB_access->login($user_email, $password);

      if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
        'user_email' => $row->user_email,
        'user_pwd' => $row->user_pwd,
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

 function send_confirmation($reciever) {
      $from="adguruniketan@gmail.com"; //sender's email
      $subject="Verify email address";  //subject
      $message= /*-----------email body starts-----------*/
       '<br>Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
       
       ' . base_url() . '/index.php/validate/verifyEmail/' .  md5($reciever) . '</a><br><br>Thanks<br>GuruNiketan Team';
        
    /*-----------email body ends-----------*/

       //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'guruniketan123';  //sender's password
        $config['mailtype'] = 'html';
        $config['validate'] = FALSE;
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 

      $this->load->library('email', $config);
        $this->email->initialize($config);

      $this->email->from($from);
      $this->email->to($reciever);
      $this->email->subject($subject);
      $this->email->message($message);
      $this->email->send();
    }

  function verifyEmail($hash){
        //verifying against database
         if($this->DB_access->verify_user($hash)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
            $this->load->view('teacher/signup');
            
        }else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
           // redirect('validate/login');
        }
    }
    

      

function logout()
 {
  $sess_array = array(
  'user_email'   =>'',
  'user_pwd'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($sess_array);
  $this->session->sess_destroy();
  //to be designed
  $this->load->view('home');
 }
} 

?>