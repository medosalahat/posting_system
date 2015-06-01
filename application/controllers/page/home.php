<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if($this->get_instance()->session_login->__GET_IS_LOGIN())
        {
            redirect($this->get_instance()->session_login->__GET_REDIRECT_HOME_PAGE(), 'refresh');

        }
        $this->load->library('template/home_page_render');

    }

    function index()
    {





        $this->home_page_render->__GET_PAGE();


    }

}

