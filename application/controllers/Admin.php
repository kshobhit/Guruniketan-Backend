<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    // ------------------------------------------------------------------------
 function __construct()
 {
   parent::__construct();
  
   $this->load->library('form_validation');
 }

   function index()
   {	
   	    $this->load->helper('form');
        $this->load->view('Admin/login');
       
   }
  }
   