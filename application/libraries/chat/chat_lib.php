<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class chat_lib
{
    private $CI;

    private $ID_USER;


    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/chat_table');

        $this->CI->load->library('table/user_table');

        $this->CI->load->model('chat/chat_md');
        $this->CI->load->model('chat/get_chat_md');




    }

    public function ___SET_NEW_CHAT($VALUE)
    {
        $this->__SET_USER();

        return $this->CI->chat_md->__SET_NEW_CHAT($VALUE ,
                                                  $this->__GET_USER() ,
                                                  $this->__GET_TABLE() ,
                                                  $this->__GET_CLOUMNS(),
                                                  $this->__GET_ID_USER()) ;

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