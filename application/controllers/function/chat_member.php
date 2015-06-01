<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chat_member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->get_instance()->session_login->__GET_IS_LOGIN())
        {
            redirect($this->get_instance()->session_login->__GET_REDIRECT_HOME_PAGE(), 'refresh');

        }
    }

    public function set_new()
    {
        $this->load->library('table/chat_member_table');
        $this->load->library('user/session_user');

        $this->load->model('chat/chat_memeber_md');
        echo json_encode(array('valid'=> $this->chat_memeber_md->__SET_NEW_CHAT($_POST['text'] ,
            $this->session_user->__GET_ID(),
            $this->session_user->__GET_SECTION_ID()
        ))) ;


    }

    public function get_new()
    {
        $this->load->library('user/session_user');
        $id=$this->session_user->__GET_SECTION_ID();
        $this->load->model('chat/chat_memeber_md');
        echo json_encode($this->chat_memeber_md->__GET_NEW_CHAT_AJAX_md($id));
    }

}

