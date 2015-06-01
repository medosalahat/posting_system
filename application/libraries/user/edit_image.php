<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class edit_image
{
    private $CI;


    public function __construct()
    {
        $this->CI = &get_instance();


        $this->CI->load->library('table/user_table');
        $this->CI->load->library('table/post_table');
        $this->CI->load->model('user/edit_image_md');
    }

    public function ___SET_NEW_IMAGE_USER($array)
    {

        return $this->CI->edit_image_md->__UPDATE_IMAGE(
            $this->CI->user_table->__GET_ID(), $array['id'],
            array($this->CI->user_table->__GET_IMAGE() => $array['file'],
        ),$this->CI->user_table->__GET_TABLE());


    }
    public function ___SET_NEW_IMAGE_POST($array)
    {


        return $this->CI->edit_image_md->__UPDATE_IMAGE_post(
            $_POST['id_post'],
            $array['id'],
            array($this->CI->post_table->__GET_MEDIA_ID() => $array['file'],
        ),$this->CI->post_table->__GET_TABLE());


    }

}