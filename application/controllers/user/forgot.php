<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('template/forgot_page_render');
        $this->load->library('template/forgot_submit_page_render');
        $this->load->library('system/life_line');
    }

    function index()
    {

        $this->forgot_page_render->__GET_PAGE();

    }
    function get()
    {

        $this->forgot_submit_page_render->__GET_PAGE();

    }

    function reset_password()
    {


            $pass = $this->life_line->__GET_MD5($this->life_line->__POST('password_1'));

        $this->load->model('user/user_md');

        $this->user_md->UpDEat($this->life_line->__POST('id'),$pass);

        $this->forgot_page_render->__GET_PAGE();

    }
}