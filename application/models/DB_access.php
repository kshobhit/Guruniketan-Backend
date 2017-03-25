<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /* @author shobhit  14/11/2016 
    Model for connecting to database
    
 */

class DB_access extends CI_Model
{
 
    function __construct() {
        parent::__construct();
        $this->load->library('email');
        
    }
    
    function login($email, $password)
    {
        $array = array('user_email' => $email,'user_pwd' => MD5($password));
        $this -> db -> select('reg_id,user_email,user_pwd');
        $this -> db -> from('table_registration');
        $this -> db -> where($array);
       
        $this -> db -> limit(1);   
      $query = $this -> db -> get();
 
        if($query -> num_rows() == 1)
        {
           // print_r ($query->result());
            return $query->result();

        }
        else
        {
            return false;
        }
    }


   
 function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('table_registration', array('user_email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return FALSE;
        }
    }

function getUserInfo($id)
    {
        $q = $this->db->get_where('table_registration', array('reg_id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

function insertToken($reg_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'reg_id'=>$reg_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $reg_id;
        
    }

function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this-> db -> get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.reg_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->reg_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }

function updatePassword($post)
    {   
        $this->db->where('reg_id', $post['reg_id']);
        $this->db->update('table_registration', array('user_pwd' => MD5($this->input->post('password')))); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    } 
    
   
    /*
     Adding teacher email to database
    */ 
     
    function add_teacher_email()
     {
        $data=array(
        'user_email'=>$this->input->post('user_email'),
        'reg_type'=>'teacher',
      // 'user_pwd'=>MD5($this->input->post('user_pwd')),
        );
        $this->db->insert('table_registration',$data);
     //   $this->db->insert('table_login',$data);
        
     }

    function registerTeacher()
    {
        $data=array(
            'user_email'=>$this->input->post('user_email'),
            'reg_type'=>'teacher',
            'user_pwd'=>MD5($this->input->post('user_password'))
            );
        $this->db->insert('table_registration',$data);
        $this->db->insert('table_login',$data);
    } 




    function registerStudent()
    {
        $data=array(
            'user_email'=>$this->input->post('user_email'),
            'reg_type'=>'student',
            'user_pwd'=>MD5($this->input->post('user_password'))
            );
        $this->db->insert('table_registration',$data);
    //    $this->db->insert('table_login',$data);
    } 

  
     function add_teacher()
     {
        $data=array(
    //    'reg_type'=>'teacher',
        'user_fname'=> $this->input->post('fname'),
        'user_mname'=> $this->input->post('mname'),
        'user_lname'=> $this->input->post('lname'),
        'user_dob'=>  date( 'Y-m-d', strtotime( $this->input->post('date'))),
        'user_qualification'=> $this->input->post('qualification'),
        'user_experience_years'=> $this->input->post('exp-years'),
        'user_experience_months'=> $this->input->post('exp-months'),
        'user_board'=> $this->input->post('board'),
        'user_class'=> $this->input->post('class'),
        'user_city'=> $this->input->post('city'),
        'user_state'=> $this->input->post('state'),
        'user_country'=> $this->input->post('country'),
        'user_pincode'=> $this->input->post('pincode'),
        'user_contact'=> $this->input->post('phone'),
    
        
        );
        $this->db->where('user_email',$this->session->userdata['logged_in']['user_email']);
        return $this->db->update('table_registration',$data);
        
    
     }
     
     function add_student()
     {
        $data=array(
        //'reg_type' =>'student',
        'user_fname'=> $this->input->post('fname'),
        'user_mname'=> $this->input->post('mname'),
        'user_lname'=> $this->input->post('lname'),
        'user_dob'=>  date( 'Y-m-d', strtotime( $this->input->post('date'))),
        'user_gfname'=> $this->input->post('gfname'),
        'user_gmname'=> $this->input->post('gmname'),
        'user_glname'=> $this->input->post('glname'),
        'user_gender'=> $this->input->post('gender'),
        'user_board'=> $this->input->post('board'),
        'user_city'=> $this->input->post('city'),
        'user_state'=> $this->input->post('state'),
        'user_country'=> $this->input->post('country'),
        'user_pincode'=> $this->input->post('pincode'),
    //    'user_email'=>$this->input->post('email'),
        'user_contact'=> $this->input->post('phone'),
    //    'user_pwd'=>MD5($this->input->post('password')),
        
        );
        $this-> db ->where('user_email',$this->session->userdata['logged_in']['user_email']);
        $this-> db ->update('table_registration',$data);
        
     }
     function checkUser($data = array()){
        $this->db->select('reg_id');
        $this->db->from('table_registration');
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update('table_registration',$data,array('reg_id'=>$prevResult['reg_id']));
            $userID = $prevResult['reg_id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert('table_registration',$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }


    function get_activation_status($email)
    {
        $array = array('user_email' => $email,'activated' => 1);
        $this->db->from('table_registration');
        $this->db->where($array);
 
     $query = $this -> db -> get();

     if($query -> num_rows() == 1)
        {
            return $query->result();

        }
        else
        {
            return false;
        }
    }

    function get_reg_type($email)
    {
        $this -> db -> select('reg_type');
        $this -> db -> from('table_registration');
        $this -> db -> where('user_email',$email);       
        $this -> db -> limit(1);
     
     $query = $this -> db -> get();
 
        if($query -> num_rows() == 1)
        {
            $result= $query->row();
            //print_r ($result->reg_type);
            return $result->reg_type;
        }
        else
        {
            return false;
        }
    }
     //activate account
    function verify_user($key){
       // echo $key;


        $data = array( 'activated' => 1);
        $this-> db -> where('md5(user_email)',$key);
       
       return $this-> db -> update('table_registration',$data);    //update status as 1 to make active user
            

    }

  
     
    function __destruct() {
        $this->db->close();
    }


}
?>