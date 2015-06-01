<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_us extends CI_Controller
{

    function __construct()
    {
        parent::__construct();


    }

    function index()
    {
        $this->load->library('template/contact_us_page_render');

        $this->contact_us_page_render->__GET_PAGE();



    }

}

