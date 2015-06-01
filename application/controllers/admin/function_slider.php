<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_slider extends CI_Controller
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

        $this->load->model('admin/slider_md');

        echo json_encode($this->slider_md->__GET_DB()) ;

    }

    function remove_row()
    {
        $this->load->model('admin/slider_md');
        $this->load->library('table/slider_table');

        $id=$_POST['ID'];


        echo json_encode(array('valid'=>$this->slider_md->__REOMVE(
                $id,
                $this->slider_table->__GET_ID(),
                $this->slider_table->__GET_TABLE()
            )
            )
        );
    }
    function upload_new_image()
    {

        $this->load->library('user/edit_image');
        $this->load->library('upload_image');
        $file = $this->edit_image->___SET_NEW_IMAGE_POST($this->upload_image->move_file("file"));

        echo base_url().$file;


    }

}

