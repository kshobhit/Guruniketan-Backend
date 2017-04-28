<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @author shobhit  14/11/2016 
   controller for login and registeration
*/
  
 
class Validate extends CI_Controller {
 public $variable = 'student';
 
 function __construct()
 {
   parent::__construct();
   $this->load->library('email');
   $this->load->model('DB_access','',TRUE);
   $this->CI =& get_instance();
   $this->load->helper('form');

  
 }


 function index()
 {
  $this->load->view('home');
 }

 function teacher_details()
 {
  $this->load->view('teacher/details');
 }

/*Default Login Function*/
 function login()
 {
   //This method will have the credentials validation
   $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
   $this->form_validation->set_rules('user_password', 'password', 'trim|required|callback_check_database');
    
  
    
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    
     $this->load->view('login');
     
   }
   else
   {
    $this->load->view('home');
         
   }
  }


   function logint()
   {
   //This method will have the credentials validation
   $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
   $this->form_validation->set_rules('user_password', 'password', 'trim|required|callback_check_database');
    
  
    
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    
     $this->load->view('logint');
     
   }
   else
   {
    $this->load->view('home');
         
   }
  }

/* For simple registration
  function register()
  {
     $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
     $this->form_validation->set_rules('user_password', 'password', 'trim|required|min_length[6]');
     $this->form_validation->set_rules('passconf', 'Confirm password', 'trim|required|matches[user_password]');
     $this->form_validation->set_rules('reg_type', 'user type', 'required');

     if($this->form_validation->run() == FALSE)
     {     
        echo '<div class="errors">'.validation_errors().'</div>';
     }else{
      $this->DB_access->addUser();
      $this->send_confirmation($this->input->post('user_email'));
      $result = $this->DB_access->get_activation_status($this->input->post('user_email'));
      if($result){
        $this->load->view('login');
      }else{
        $this->load->view('email_unverified');
      }

     } 

  }
*/
/*Reset password*/

  function forgot()
     {
            
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email'); 
        
        if($this->form_validation->run() == FALSE) {
          //  $this->load->view('header');
             echo '<div class="errors">'.validation_errors().'</div>';
           // $this->load->view('footer');
        }else{
            $email = $this->input->post('user_email');  
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->DB_access->getUserInfoByEmail($clean);
            //print_r ($userInfo->reg_id);
            
            if(!$userInfo){
                //$this->session->set_flashdata('flash_message', 'We cant find your email address');
                 echo "user email doesn't exist";
                redirect(base_url().'index.php/validate/login');
            }   
                           
            //build token 
    
            $token = $this->DB_access->insertToken($userInfo->reg_id);                    
            $qstring = $this->base64url_encode($token);                      
            $url = base_url() . 'index.php/validate/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">Click here to continue</a>'; 
            
            $message = '';                     
            $message .= '<strong>A password reset has been requested for this email account</strong><br>';
            $message .= '<strong>Please click:</strong> ' . $link;
            $message .='<br><br>Thanks<br>GuruNiketanTeam,'; 

              $this->email->from('adguruniketan@gmail.com','GuruNiketan'); //sender's email
              $this->email->to($email);
              $this->email->subject($this->CI->config->item('reset_subject'));
              $this->email->message($message);
              if($this->email->send())
              {
                // $this->load->view('inc/header');
                $this->load->view('reset/reset_link');
               // $this->load->view('inc/footer');
              }else{
                echo 'email has not been sent';//view
              }

            }    
    }         


function reset_password()
    {
            $token = $this->base64url_decode($this->uri->segment(4)); 
          //  echo $token;        
           $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->DB_access->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(base_url().'index.php/validate/login');
            }            
            $data = array(
               // 'firstName'=> $user_info->first_name, 
                'email'=>$user_info->user_email,                
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
              // $this->load->view('inc/header');
               $this->load->view('reset/reset_passwordform', $data);
              //$this->load->view('inc/footer');
            }else{
                                
                $this->load->library('Password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['reg_id'] = $user_info->reg_id;
                unset($cleanPost['passconf']);                
                if(!$this->DB_access->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
                }else{
                    $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                }
                redirect(base_url().'index.php/validate/login/');                
            }
        }          
             
  function ChangePassword()
  {
    $data['email'] = $this->session->userdata['logged_in']['user_email'];
    /*Validate current password enterd by user against database*/
   $this->form_validation->set_rules('currpwd', 'current password', 'trim|required|callback_check_password');
      $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('passconf','Confirm Password', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE)
       {
          $this->load->view('changepassword',$data);
       }
      else
       {
        $password = md5($this->input->post('password'));
        if($this->DB_access->changePassword($data,$password)){
           $this->session->set_flashdata('flash_message', 'Password Changes Succesfully Please Login again');
          redirect(base_url().'index.php/validate/login/');
        }
             
       }
  }

  //funtion for verifying email of teacher on teacher's detail page
/*  function teacher_email_verification()
     {
      
      $this->form_validation->set_rules('user_email', 'Your Email', 'trim|required|valid_email');
    
       if($this->form_validation->run() == FALSE)
       {
         $this->load->view('error');
       }

      else
      {
        $email = $this->input->post('user_email');
        $this->DB_access->add_teacher_email($email);

        $result1 = $this->DB_access->mailExist($email);
        if($result1)
        {
          $sess_array = array();
          foreach($result1 as $row)
          {
              $sess_array = array(
              'email' => $row->user_email,
              'id' => $row->reg_id,
              'path' => $row->user_profilepic
               );
             $this->session->set_userdata('registered', $sess_array);
         
          }
        }else{     
            $this->form_validation->set_message('check_database', 'User email doesn\'t exist');   
          }
        
        //sending confirmation mail
        $this->send_confirmation_teacher($email);
        // call db and get activation status
        $result = $this->DB_access->get_activation_status($email);
        //if activation status is 1,user will be able to fill signup form

        if(!$result)
       {
          $this->load->view('email_unverified');
         // $this->load->view('inc/footer');
        } 
       }
     } 
*/

  function teacherSignup()
  {
      $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
      $this->form_validation->set_rules('user_password', 'password', 'trim|required');
      $this->form_validation->set_rules('confpassword','Confirm Password', 'trim|required|matches[user_password]');

      if($this->form_validation->run() == FALSE)
       {
          echo '<div class="errors">'.validation_errors().'</div>';
       }
      else
       {
        $email = $this->input->post('user_email');
        $this->DB_access->registerTeacher();
          $result1 = $this->DB_access->mailExist($email);
        if($result1)
        {
          $sess_array = array();
          foreach($result1 as $row)
          {
              $sess_array = array(
              'user_email' => $row->user_email,
              'id' => $row->reg_id,
              'user_fname' => $row->user_fname
              
               );
             $this->session->set_userdata('registeredt', $sess_array);
         
          }
        }else{     
            $this->form_validation->set_message('check_database', 'User hasn\'t registered yet');   
          }

        $this->send_confirmation($this->input->post('user_email'));
       // $this->load->view('inc/header');
        $this->load->view('email_unverified');
        //$this->load->view('inc/footer');
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
      $this->form_validation->set_rules('eduinst', 'Educational Institute ', 'trim|required');
      $this->form_validation->set_rules('subject', 'subject ', 'trim|required');
      $this->form_validation->set_rules('city', 'city', 'alpha|trim|required');
      $this->form_validation->set_rules('state', 'state', 'required');
      $this->form_validation->set_rules('country', 'country', 'trim|required');
      $this->form_validation->set_rules('pincode', 'pincode', 'numeric|trim|required|exact_length[6]');
      $this->form_validation->set_rules('phone', 'contact', 'numeric|trim|required');            
    //  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    //  $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');


      if($this->form_validation->run() == FALSE)
       {
         $this->load->view('teacher/formregistration');
       }
      else
      {
        //call db to add teacher
       if ($this->DB_access->add_teacher($this->session->userdata['registeredt']['user_email'])){
         $link_address = base_url() . 'index.php/validate/logout/';
         echo "Registeration sucessfull <a href='$link_address'>Please Login To Continue</a>";
       }else{
        echo "Nothing inserted";
       }
                   
      }

  } 


 function teacher_edit_profile()
  {
    $email=$this->session->userdata['logged_in']['user_email'];
    

    if($this->input->post('submit')){
      $options =array(

        'user_exp_years'=>$this->input->post('exp-years'),
        'user_exp_months'=>$this->input->post('exp-months'),
        'user_institution'=>$this->input->post('eduinst'),
        'user_city'=>$this->input->post('city'),
        'user_state'=>$this->input->post('state'),
        'user_country'=>$this->input->post('country'),
        'user_pincode'=>$this->input->post('pincode'),
        'user_contact'=>$this->input->post('phone')


        );
      $affected = $this->DB_access->updateTeacher($options,$email);
      if($affected) $link_address = base_url() . 'index.php/validate/';
         echo "<a href='$link_address'>Home</a>";

    }
    $previous['data']=$this->DB_access->getUserInfoByEmail($email);
    $this->load->view('teacher/formeditprofile',$previous);
           
  }  

   

  function studentSignup()
  {
      $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
      $this->form_validation->set_rules('user_password', 'password', 'trim|required');
      $this->form_validation->set_rules('confpassword','Confirm Password', 'trim|required|matches[user_password]');

      if($this->form_validation->run() == FALSE)
       {
          echo '<div class="errors">'.validation_errors().'</div>';
       }
      else
       {
        $email = $this->input->post('user_email');
        $this->DB_access->registerStudent();
        $result1 = $this->DB_access->mailExist($email);
        if($result1)
        {
          $sess_array = array();
          foreach($result1 as $row)
          {
              $sess_array = array(
              'user_email' => $row->user_email,
              'id' => $row->reg_id,
              'user_fname' => $row->user_fname
              
               );
             $this->session->set_userdata('registered', $sess_array);
         
          }
        }else{     
            $this->form_validation->set_message('check_database', 'User hasn\'t registered yet');   
          }
        $this->send_confirmation_student($this->input->post('user_email'));
        $this->load->view('email_unverified');
        
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
    // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    //  $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE)
       {
          // $this->load->view('inc/header');
         $this->load->view('student/formregistration');
         // $this->load->view('inc/footer');
       }
      else
      {
        //call db to add user
       if ($this->DB_access->add_student($this->session->userdata['registered']['user_email'])){
         $link_address = base_url() . 'index.php/validate/logout/';
         echo "Registeration sucessfull <a href='$link_address'>Please Login To Continue</a>";
       }else{
        echo "Nothing inserted";
       }
                

      
      }

  }
  function student_edit_profile()
  {
    $email = $this->session->userdata['logged_in']['user_email'];
    //echo $email;

    if($this->input->post('submit')){
      $options =array(
      //  'preferences' => $this->input->post('newsletter'),
        'user_board' => $this->input->post('board'),
        'user_city'=>$this->input->post('city'),
        'user_state'=>$this->input->post('state'),
        'user_country'=>$this->input->post('country'),
        'user_pincode'=>$this->input->post('pincode'),
        'user_contact'=>$this->input->post('phone')


        );
      $affected = $this->DB_access->updateStudent($options,$email);
      if($affected) $link_address = base_url() . 'index.php/validate/';
         echo "<a href='$link_address'>Home</a>";

    }
    $previous['data']=$this->DB_access->getUserInfoByEmail($email);
    
    $this->load->view('student/formeditprofile',$previous);
   
}

/*function for showing user dashboard based on his registration type*/
function userDashboard(){
    $email =$this->session->userdata['logged_in']['user_email'];
     $result = $this->DB_access->get_reg_type($email);
     
     if($result == $this->variable)
      {
        //$email = $this->session->userdata['logged_in']['user_email'];
        
       $this->load->view('student/dashboard');
      
      }
      //if type is teacher load teacher dashboard
      else{
      // $this->load->view('inc/header');
       $this->load->view('teacher/dashboard');
      // $this->load->view('inc/footer');
     }


  }
 


  function check_database($password)
  {
   //Field validation succeeded.  Validate against database
   $user_email = $this->input->post('user_email');
   
 
   //query the database
   $result = $this->DB_access->login($user_email, $password);

    if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
        'user_email' => $row->user_email,
        'password'   => $row->user_pwd,
        'id'         => $row->reg_id,
        'user_fname' => $row->user_fname,
        'picture_url'=> $row->user_picture_url
       );
       $this->session->set_userdata('logged_in', $sess_array);
       ;
     }

     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

/* Checking if current password entered is correct or not*/
  function check_password($password)
  {

    if($this->DB_access->checkPassword($password))
    {
      return TRUE;
    }else
    {
      $this->form_validation->set_message('check_password', 'Invalid current password entered');
     return false;
    }

  }

 function send_confirmation($reciever) {
    
      $message = "<br>Dear User,<br><br> Please Verify your email address";
      $message.="<a href='". base_url() . "index.php/validate/verifyEmail/". md5($reciever) ."'> Click here to continue!</a><br><br>Thanks,<br>GuruNiketan Team,";
         

      $this->email->from('adguruniketan@gmail.com','GuruNiketan'); //sender's email
      $this->email->to($reciever);
      $this->email->subject($this->CI->config->item('email_subject'));
      $this->email->message($message);
      $this->email->send();
    }



  function send_confirmation_student($reciever) {
    
      $message = "<br>Dear User,<br><br> Please Verify your email address";
      $message.="<a href='". base_url() . "index.php/validate/verifyEmailStudent/". md5($reciever) ."'> Click here to continue!</a><br><br>Thanks,<br>GuruNiketan Team,";
      
      $this->email->from('adguruniketan@gmail.com','GuruNiketan'); //sender's email
      $this->email->to($reciever);
      $this->email->subject($this->CI->config->item('email_subject'));
      $this->email->message($message);
      $this->email->send();
    }


  function verifyEmail($hash){
        //verifying against database
        if($this->DB_access->verify_user($hash)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
            redirect('validate/teacher_registration/');
          }
                
        else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
            // redirect('validate/login');
        }
    }


  function verifyEmailStudent($hash){
        //verifying against database
        if($this->DB_access->verify_user($hash)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
            redirect('validate/student_registration');
          }
                
        else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
            // redirect('validate/login');
        }
    }
    
function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 
function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }
      

  function logout()
   {
    $sess_array = array(
    'user_email'   =>'',
    'password'     => '',
    'id'        => '',
    'user_fname' => '',
    'user_picture_url' => '',
    'logged_in' => FALSE,
    'registered' => FALSE,
    );
    $this->session->unset_userdata($sess_array);
    $this->session->sess_destroy();
    redirect(base_url().'index.php/validate/');
   }

}
?>
