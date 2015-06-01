<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if($this->get_instance()->session_login->__GET_IS_LOGIN_HEADER())
        {
            redirect($this->get_instance()->session_login->__GET_REDIRECT_MAIN_PAGE(), 'refresh');

        }

    }

    function index()
    {

        $this->load->library('template/index_page_render');

        $this->index_page_render->__GET_PAGE();


    }

}

