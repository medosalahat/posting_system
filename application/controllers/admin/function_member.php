<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('system/admin_page');

        if($this->get_instance()->session_login->__GET_IS_LOGIN())
        {
            if(!$this->admin_page->__GET_IS_ADMIN())
            redirect($this->get_instance()->session_login->__GET_REDIRECT_HOME_PAGE(), 'refresh');

        }
    }

    function get()
    {

        $this->load->model('admin/member_md');

        echo json_encode($this->member_md->__GET_DB()) ;

    }
    function remove_row()
    {
        $ID=$_POST['ID'];
        $this->load->model('admin/member_md');

        echo json_encode(array('valid'=>$this->member_md->remove_row($ID))) ;
    }



}

