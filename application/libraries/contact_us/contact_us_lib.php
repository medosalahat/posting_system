<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class contact_us_lib
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('table/contact_us_table');

        $this->CI->load->model('contact_us/set_row_contact_us_md');



    }

    public function set_new_row($array,$table)
    {


        return $this->CI->set_row_contact_us_md->__SET_NEW($array ,$table);

    }

}