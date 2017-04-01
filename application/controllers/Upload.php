<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                
        }

        public function index()
        {
                $this->load->view('upload/upload_form', array('error' => ' ' ));
                //echo $this->session->userdata['logged_in']['reg_id'];
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3096;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());                       
                        $this->DB_access->upload_path();

                        $this->load->view('upload/upload_success', $data);
                }
        }
        
}
?>