<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if($this->get_instance()->session_login->__GET_IS_LOGIN())
        {
            redirect($this->get_instance()->session_login->__GET_REDIRECT_HOME_PAGE(), 'refresh');

        }

    }

    function index()
    {

        $this->load->library('user/logout_lib');

        $this->logout_lib->__SET_LOGOUT_USER();

        redirect($this->get_instance()->session_login->__GET_REDIRECT_HOME_PAGE(), 'refresh');


    }

}

