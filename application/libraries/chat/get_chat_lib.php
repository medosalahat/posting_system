<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class get_chat_lib
{
    private $CI;




    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('chat/get_chat_md');




    }

    public function __GET_NEW_CHAT_AJAX(){

        return $this->CI->get_chat_md->__GET_NEW_CHAT_AJAX_md();
    }

}