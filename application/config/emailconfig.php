<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'adguruniketan@gmail.com';//sender's password
        $config['smtp_pass'] = 'guruniketan123';  //sender's password
        $config['mailtype'] = 'html';
        $config['reset_subject']='Reset Your Password ';
        $config['email_subject']='Verify email address ';
        /*message visible when resetting password*/
        //$config['reset_message']='';
        /*message visible on user email id during email verification*/
       // $config['email_message']='<br>Dear User,<br><br> Please click on the below activation link to verify    your email address<br><br>' . base_url() . 'index.php/validate/verifyEmail/' .  md5($reciever) . '</a><br><br>Thanks<br>GuruNiketan Team ';
        $config['validate'] = FALSE;
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 