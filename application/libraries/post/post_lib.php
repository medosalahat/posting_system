<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class post_lib
{
    private $CI;

    private $ID_USER;


    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('table/post_table');

        $this->CI->load->model('post/post_md');

    }

    public function __IS_EXIST_THIS_ID($VALUE)
    {

        $ID = $this->CI->post_table->__GET_ID();
        $TABLE = $this->CI->post_table->__GET_TABLE();

        return $this->CI->post_md->__IS_EXIST_THIS_ID($VALUE , $ID, $TABLE);

    }


    private function __SET_USER()
    {
        $this->ID_USER =$this->CI->session_user->__GET_ID();
    }
    private function __GET_USER()
    {
        return $this->ID_USER ;
    }

    private function __GET_TABLE()
    {
        return $this->CI->chat_table->__GET_TABLE();
    }

    private function __GET_CLOUMNS()
    {
        return $this->CI->chat_table->__GET_TEXT();
    }
    private function __GET_ID_USER()
    {
        return $this->CI->user_table->__GET_ID_USER();
    }

}