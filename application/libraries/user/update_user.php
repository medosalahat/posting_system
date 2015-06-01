<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class update_user
{
    private $CI;



    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/user_table');

        $this->CI->load->model('user/update_name_mobile');

    }
    public function update_name_mobile($name,$mobile)
    {

        return $this->CI->update_name_mobile->__UPDATE_DB(
            array(
                $this->CI->user_table->__GET_NAME()=>$name,
                $this->CI->user_table->__GET_MOBILE()=>$mobile
            ),
            $this->CI->user_table->__GET_ID(),
            $this->CI->session_user->__GET_ID(),
            $this->CI->user_table->__GET_TABLE()

        );
    }


}