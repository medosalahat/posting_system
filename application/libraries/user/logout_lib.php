<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class logout_lib
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();


        $this->CI->load->library('system/session_system');

        $this->CI->load->library('user/session_user');

    }

    public function __SET_LOGOUT_USER()
    {

       /* session_start();
        $this->session->unset_userdata('system');
        $this->session->unset_userdata('data');
        session_destroy();*/


        $this->CI->session_system->__UNSET_SYSTEM();

    }

}