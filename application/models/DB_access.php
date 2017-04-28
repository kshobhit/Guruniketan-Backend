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
        $this -> db -> select('reg_id,user_email,user_pwd,user_fname,user_picture_url');
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
           // error_log('no user found getUserInfo('.$email.')');
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
           // error_log('no user found getUserInfo('.$id.')');
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

    function checkPassword($password)
    {

        $this->db->where('user_pwd', md5($password));
        $this->db->from('table_registration');
         $this -> db -> limit(1);   
        $query = $this -> db -> get();
         if($query -> num_rows() == 1)
        {
           // print_r ($query->result());
            return TRUE;

        }
        else
        {
            return false;
        }
        
    
    }
    


    function changePassword($post,$password)
    {
        $this->db->where('user_email',$post['email']);
        $this->db->update('table_registration', array('user_pwd' => $password));
        $this->db->update('table_login', array('user_pwd' => $password));
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['email'].')');
            return false;
        }        
        return true;
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


 //------------------calendar section-------------------//   

 function getEvents()
    {
      $email = $this->session->userdata['logged_in']['user_email'];  
    $sql = "SELECT * FROM events WHERE events.user_email = ?, events.date BETWEEN ? AND ? ORDER BY events.date ASC";
    return $this->db->query($sql, array($email,$_GET['start'], $_GET['end']))->result();
    }

    Public function addEvent()
    {

    $sql = "INSERT INTO events (title,events.date, description, color) VALUES (?,?,?,?)";
    $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color']));
        return ($this->db->affected_rows()!=1)?false:true;
    }

    /*Update  event */

    Public function updateEvent()
    {

    $sql = "UPDATE events SET title = ?, events.date = ?, description = ?, color = ? WHERE id = ?";
    $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['id']));
        return ($this->db->affected_rows()!=1)?false:true;
    }


    /*Delete event */

    Public function deleteEvent()
    {

    $sql = "DELETE FROM events WHERE id = ?";
    $this->db->query($sql, array($_GET['id']));
        return ($this->db->affected_rows()!=1)?false:true;
    }

    /*Update  event */

    Public function dragUpdateEvent()
    {
            $date=date('Y-m-d h:i:s',strtotime($_POST['date']));

            $sql = "UPDATE events SET  events.date = ? WHERE id = ?";
            $this->db->query($sql, array($date, $_POST['id']));
        return ($this->db->affected_rows()!=1)?false:true;


    }

    Public function checkCalendar($user)
    {   
        /*Logic - we'll check the calendar database of the particular user his calendar is available or not to add new event  i.e. if his calendar is already occupied at that time, then it should return false otherwise True*/ 
        
    }

//-----------------calendar section ends-------------------------//
/*
 function addUser() 
 {
     $data=array(
        'user_email'=>$this->input->post('user_email'),
        'reg_type'=>$this->input->post('reg_type'),
        'user_pwd'=>MD5($this->input->post('user_password')),
        );
        $this->db->insert('table_registration',$data);
     //   $this->db->insert('table_login',$data);
 }   
 */   
   
    /*
     Adding teacher email to database
     
     
    function add_teacher_email($email)
     {
        $data=array(
        'user_email'=>$email,
        'reg_type'=>'teacher',
      // 'user_pwd'=>MD5($this->input->post('user_pwd')),
        );
        $this->db->insert('table_registration',$data);
        $this->db->insert('table_login',$data);
        
     }
*/

   

    function upload_path()
    {
       $userID = $this->session->userdata['logged_in']['id'];
        $upload_data = $this->upload->data();
        $data = array(
            'user_picture_url' =>$upload_data['full_path'],

            );
        $this->db->where('reg_id',$userID);
        $this->db->update('table_registration',$data); 
    }


/*---------------------- Registration Section-------------------*/
     function registerTeacher()
    {
        $data=array(
            'user_email'=>$this->input->post('user_email'),
            'reg_type'=>'teacher',
            'user_pwd'=>MD5($this->input->post('user_password'))
            );
        $this->db->insert('table_registration',$data);
        $this->db->insert('table_login',$data);
        $email['user_email']= $this->input->post('user_email');
       $this->db->insert('table_teacher',$email);
    } 


    
  
     function add_teacher($email)
     {
        $data=array(
    //    'reg_type'=>'teacher',
        'user_fname'=> $this->input->post('fname'),
        'user_mname'=> $this->input->post('mname'),
        'user_lname'=> $this->input->post('lname'),
        'user_dob'=>  date( 'Y-m-d', strtotime( $this->input->post('date'))),
        'user_qualification'=> $this->input->post('qualification'),
        'user_institution'=> $this->input->post('eduinst'),
        'subject'=> $this->input->post('subject'),
        'user_exp_years'=> $this->input->post('exp-years'),
        'user_exp_months'=> $this->input->post('exp-months'),
        'user_board'=> $this->input->post('board'),
        'user_class'=> $this->input->post('class'),
        'user_city'=> $this->input->post('city'),
        'user_state'=> $this->input->post('state'),
        'user_country'=> $this->input->post('country'),
        'user_pincode'=> $this->input->post('pincode'),
        'user_contact'=> $this->input->post('phone'),
      //  'user_pwd'=> MD5($this->input->post('password')),

    
        
        );
        $this->db->where('user_email',$email);
        $this->db->update('table_teacher',$data);
        return $this->db->update('table_registration',$data);
        
    
     }

     function updateTeacher($option,$email)
     {
        $this->db->where('user_email',$email);
        $this->db->update('table_teacher',$option);
        return $this->db->update('table_registration',$option);
     }
     

    function registerStudent()
    {
        $data=array(
            'user_email'=>$this->input->post('user_email'),
            'reg_type'=>'student',
            'user_pwd'=>MD5($this->input->post('user_password'))
            );
        $this->db->insert('table_registration',$data);
       $this->db->insert('table_login',$data);
       $email['user_email']= $this->input->post('user_email');
       $this->db->insert('table_student',$email);
    } 

     function add_student($email)
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
       // echo $this->session->userdata['registered']['user_email'];
        $this-> db ->where('user_email',$email);
        
         $this-> db ->update('table_registration',$data);
        $this-> db ->update('table_student',$data);
        
     }


     function updateStudent($option,$email)
     {
        //print_r($option);
        $this->db->where('user_email',$email);
        $this->db->update('table_student',$option);
        return $this->db->update('table_registration',$option);
     }

    function mailExist($email)
     {
        $array = array('user_email' => $email);
        $this -> db -> select('reg_id,user_email,user_fname');
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
        $this-> db -> update('table_login',$data);     
       return $this-> db -> update('table_registration',$data);    //update status as 1 to make active user
            
    }
  /*----------------------Registration Section Ends------------------*/  


/* session Management*/
function getDetailsOfBatch($batchID)
{
     $q = $this->db->get_where('table_batch', array('batch_id' => $batchID), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            //print_r ($row);
            return $row;
        }else{
           // error_log('no user found getUserInfo('.$email.')');
            return FALSE;
        }
}

function fetchData($board,$class,$subject)
{
    $sql = "SELECT t.user_fname,t.subject,t.user_lname,t.user_exp_years,t.user_exp_months,b.fee,b.batch_id,b.enrolled FROM table_teacher t,table_batch b WHERE t.reg_id = b.teacher_id AND t.user_board like '$board' AND t.subject like '$subject' AND t.user_class like '$class' ";
    return $this->db->query($sql)->result();
    //foreach ($result as $row)
        //while($row)
        return $row;
}


  
     
    function __destruct() {
        $this->db->close();
    }


}
?>