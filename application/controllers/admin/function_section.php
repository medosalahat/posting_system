<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Function_section extends CI_Controller
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

        $this->load->model('admin/section_md');


        echo json_encode($this->section_md->__GET_DB()) ;

    }


    function get_college(){
        $this->load->model('admin/colloege_md');

        echo json_encode($this->colloege_md->__GET_ALL_DB());

    }
    function add_new_college()
    {
        $college=$_POST['college'];
        $this->load->model('admin/colloege_md');
        $this->colloege_md->SET_new($college);
        $this->load->library('admin/section_page_render');
        $this->section_page_render->__GET_PAGE();

    }
    function add_new_specialty()
    {
        $college=$_POST['college_specialty'];
        $specialty=$_POST['specialty_new'];
        $this->load->model('admin/specialty_md');
        $this->specialty_md->SET_new($college,$specialty);
        $this->load->library('admin/section_page_render');
        $this->section_page_render->__GET_PAGE();

    }
    function get_specialty(){
        $this->load->model('admin/specialty_md');

        echo json_encode($this->specialty_md->__GET_ALL_DB($_POST['id_college']));

    }
  function get_specialty3(){
        $this->load->model('admin/specialty_md');

        echo json_encode($this->specialty_md->__GET_DB());

    }

    function remove_row()
    {
        $this->load->library('table/section_table');
        $this->load->model('admin/section_md');


        $id=$_POST['ID'];


        echo json_encode(array('valid'=>$this->section_md->__REOMVE(
                $id,
                $this->section_table->__GET_ID(),
                $this->section_table->__GET_TABLE()
            )
            )
        );
    }
    function remove_row_college()
    {
        $this->load->library('table/college_table');
        $this->load->model('admin/colloege_md');


        $id=$_POST['ID'];


        echo json_encode(array('valid'=>$this->colloege_md->__REOMVE(
                $id,
                $this->college_table->__GET_ID(),
                $this->college_table->__GET_TABLE()
            )
            )
        );
    }
    function remove_row_specialty()
    {
        $this->load->library('table/specialty_table');
        $this->load->model('admin/specialty_md');


        $id=$_POST['ID'];


        echo json_encode(array('valid'=>$this->specialty_md->__REOMVE(
                $id,
                $this->specialty_table->__GET_ID(),
                $this->specialty_table->__GET_TABLE()
            )
            )
        );
    }
    function add_new_section(){
        $text=$_POST['Section'];
        $specialty=$_POST['specialty_section'];
        $college=$_POST['college_section'];
        $this->load->model('admin/section_md');
        $this->section_md->SET_new($text,$specialty,$college);
        $this->load->library('admin/section_page_render');
        $this->section_page_render->__GET_PAGE();
    }


}

