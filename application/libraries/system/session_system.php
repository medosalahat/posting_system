<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class session_system
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');
    }

    function __SET_SYSTEM($SYSTEM){

        $this->CI->session->set_userdata('SYSTEM',$SYSTEM);

    }

    function __UNSET_SYSTEM()
    {
        session_start();
        $this->CI->session->unset_userdata('SYSTEM');
        session_destroy();
    }

    function __GET_SYSTEM(){

        return $this->CI->session->userdata('SYSTEM');

    }

    function ___GET_DATETIME()
    {
        return  date('Y-m-d h:i:s');
    }
    function ___GET_DAY()
    {
        return  date('Y-m-d');
    }
    function __GET_TIME()
    {
        return  date('h:i:s');
    }
    function __GET_ZERO_TIME()
    {
        return '0000-00-00 00:00:00';
    }




}