<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_contact extends CI_Controller
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

    function get_contact()
    {

        $this->load->model('admin/contact_md');

        echo json_encode($this->contact_md->__GET_DB()) ;

    }

    function remove_row()
    {
        $this->load->model('admin/contact_md');
        $this->load->library('table/contact_us_table');

        $id=$_POST['ID'];


        echo json_encode(array('valid'=>$this->contact_md->__REOMVE(
                $id,
                $this->contact_us_table->__GET_ID(),
                $this->contact_us_table->__GET_TABLE()
            )
            )
        );
    }


}

