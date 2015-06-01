<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_system extends CI_Controller
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



    function update()
    {
        $this->load->model('admin/system_rq_md');
        $this->load->library('table/requirements');

        $name=$_POST['name'];


        echo json_encode(array('valid'=>$this->system_rq_md->__UPDATE(
                $name,
                $this->requirements->__GET_VALUE(),
                $this->requirements->__GET_TYPE(),
                'SITE_NAME',
                $this->requirements->__GET_TABLE()
            )
            )
        );
    }

}

