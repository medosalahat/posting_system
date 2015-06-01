<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_user extends CI_Controller
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

    function Get_users()
    {

        $this->load->model('admin/users_md');

        echo json_encode($this->users_md->___DB_GET_USERS()) ;

    }

    function ADMIN_EVENT()
    {
        $this->load->model('admin/users_md');
        $this->load->library('table/user_table');

        $id=$_POST['ID'];

        $VALUE=$_POST['value'];
        if($VALUE == 0){$VALUE=1;}
        else{$VALUE=0;}

        echo json_encode(array('valid'=>$this->users_md->___EDIT_USER(
            $id,
            $this->user_table->__GET_ID(),
            $VALUE,
            $this->user_table->__GET_IS_ADMIN(),
            $this->user_table->__GET_TABLE()
        )
        )
        );
    }
    function status_user()
    {
        $this->load->model('admin/users_md');
        $this->load->library('table/user_table');

        $id=$_POST['ID'];

        $VALUE=$_POST['value'];
        if($VALUE == 0){$VALUE=1;}
        else{$VALUE=0;}

        echo json_encode(array('valid'=>$this->users_md->___EDIT_USER(
            $id,
            $this->user_table->__GET_ID(),
            $VALUE,
            $this->user_table->__GET_STATUS(),
            $this->user_table->__GET_TABLE()
        )
        )
        );
    }

    function edit_level()
    {
        $this->load->model('admin/users_md');

        $this->load->library('table/user_table');

        $id=$_POST['ID'];

        $VALUE=$_POST['value'];
        if($VALUE == 0){$VALUE=1;}
        else{$VALUE=0;}
        echo json_encode(array('valid'=>$this->users_md->___EDIT_LEVEL(
                $id,
                $this->user_table->__GET_ID(),
                $VALUE,
                $this->user_table->__GET_LEVEL(),
                $this->user_table->__GET_TABLE()
            )
            )
        );
    }

    public function INSERT_NEW_USER_TO_SECTION()
    {
        $this->load->model('admin/member_md');
        $id_user=$_POST['user'];
        $id_section=$_POST['section'];
        $this->member_md->INSERT_NEW_USER_TO_SECTION($id_user,$id_section);
        $this->load->library('admin/members_page_render');
        $this->members_page_render->__GET_PAGE();

    }

}

