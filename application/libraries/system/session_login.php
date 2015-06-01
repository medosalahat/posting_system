<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class session_login
{

    private $CI;
    
    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('system/session_system');

        $this->CI->load->library('system/life_line');
    }
    function __GET_IS_LOGIN(){

        if($this->CI->session_system->__GET_SYSTEM())
        {
            return false;
        }
        return true;
    }

    function __GET_IS_LOGIN_HEADER(){

        if($this->CI->session_system->__GET_SYSTEM())
        {

            return true;
        }
        else
        {
            return false;
        }
    }

    function __GET_REDIRECT_LOGIN_PAGE()
    {
        return 'user/login';
    }

    function __GET_REDIRECT_HOME_PAGE()
    {
        return $this->CI->life_line->__GET_HOME_PAGE();
    }
    function __GET_REDIRECT_MAIN_PAGE()
    {
        return $this->CI->life_line->__GET_MAIN_PAGE();
    }
}