<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 /* @author shobhit  14/11/2016 
 	controller for searching, enrolling and checking calendar
 	
 */
class Access extends CI_Controller {

function __construct()
 {
   parent::__construct();
   //$this->load->library('email');
   $this->load->model('DB_access','',TRUE);
   $this->CI =& get_instance();
   $this->load->library('cart');
   $this->load->library("pagination");
   $this->load->helper(array('form','url'));

  
 }
 
 function index()
 {
  	$this->load->view('home');

 }


function search()
{

	$board = $this->input->post('board');
	$class = $this->input->post('standard');
	$subject = $this->input->post('subject');
	//echo $board,$class,$subject;
	if(!empty($board) && !(empty($class)) &&!(empty($subject))){
			if($data['details'] = $this->DB_access->fetchData($board,$class,$subject)){
				$this->load->view('search',$data);
			}else{
				echo "Details not found in database";
			}
			
		}else{
			echo "Input Error";
		}
	
}

function enroll()
{
	$batchID = $this->uri->segment(3);
	//echo $batchID;
	$user = $this->session->userdata['logged_in']['id'];
	echo $user;
	$batchInfo = $this->DB_access->getDetailsOfBatch($batchID);
	$enrolled = $batchInfo->enrolled; //No. of students already enrolled in that batch
	$strength = $batchInfo->strength;
	echo $strength;
	/* calling function to check if there's any time conflict with user calendar*/
	/*if(!$this->CheckCalendar($user)){
		echo "There's some conflict please select other batch";}else{*/
	

	 	//$enrolled += 1;


	
	
}


function CheckCalendar($user)

{
	$this->DB_access->checkcalendar($user);
}
}


?>