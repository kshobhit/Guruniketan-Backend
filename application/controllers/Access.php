<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 /* @author shobhit  14/11/2016 
 	
 */
class Access extends CI_Controller {
 
 function index()
 {
 	$this->load->helper('form');
 	$this->load->helper(array('url'));
 	$this->load->view('login');
 }

}
?>