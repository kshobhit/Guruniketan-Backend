<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @author shobhit  14/11/2016 
   controller for login and registeration
*/

class Calendar1 extends CI_Controller {
 public $variable = 'student';
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('DB_access','',TRUE);
   $this->CI =& get_instance();

  
 }

  function index