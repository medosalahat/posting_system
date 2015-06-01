<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment extends CI_Controller
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

        $this->load->library('post/post_lib');

        if($this->__IS_SET_POST('id_post'))
        {
            if($this->__IS_EMPTY($_POST['id_post']))
            {

                if($this->post_lib->__IS_EXIST_THIS_ID($this->__FILTER_VALUE($_POST['id_post'])))
                {
                    $this->load->library('comment/comment_lib');

                    if($this->__IS_SET_POST('text'))
                    {
                        if($this->__IS_EMPTY($_POST['text']))
                        {

                            echo json_encode(
                                array(
                                    'valid'=>
                                        $this->comment_lib->__SET_NEW_COMMENT(
                                            $this->__FILTER_VALUE($_POST['id_post']),
                                            $this->__FILTER_VALUE($_POST['text'])
                                        )
                                )
                            );
                        }

                    }

                }


            }

        }

    }

    public function get_new()
    {
        $this->load->library('chat/get_chat_lib');
        echo json_encode($this->get_chat_lib->__GET_NEW_CHAT_AJAX());
    }

    private function __IS_SET_POST($value)
    {

        if(isset($_POST[$value]))
        {
            return true;
        }
        return false ;

    }
    private function __FILTER_VALUE($value)
    {
        return mysql_real_escape_string($value);

    }
    private function __IS_EMPTY($value)
    {
        if(empty($value))
        {
            return false;
        }

        return true;
    }

}

