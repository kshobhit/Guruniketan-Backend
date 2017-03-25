<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*author shobhit*/
class RequestHandler extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
	}

	function index()
	{
		$this->load->view('cca/datafrom');
	}

	function reqhandler()
	{
		$this->load->view('cca/ccavRequestHandler');
	}
}
?>		