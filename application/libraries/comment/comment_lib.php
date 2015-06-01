<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class comment_lib
{
    private $CI;

    private $ID_USER;


    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/post_table');

        $this->CI->load->library('table/comment_table');

        $this->CI->load->library('table/user_table');

        $this->CI->load->model('comment/comment_md');

    }

    public function __SET_NEW_COMMENT($id,$VALUE)
    {
        $this->__SET_USER();

        return $this->CI->comment_md->__SET_NEW_COMMENT($id , $this->__GET_USER() , $VALUE );

    }


    private function __SET_USER()
    {
        $this->ID_USER =$this->CI->session_user->__GET_ID();
    }
    private function __GET_USER()
    {
        return $this->ID_USER ;
    }



}