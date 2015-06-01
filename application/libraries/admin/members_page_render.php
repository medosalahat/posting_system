<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class members_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'admin/members/';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'contant';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');

    }

    public function __GET_PAGE()
    {
        $this->___RUN();

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }

    private function ___RUN(){

        $this->__GET_ALL_USER_FROM_DB();

        $this->__GET_ALL_SECTION_FROM_DB();

    }

    private function __GET_ALL_USER_FROM_DB()
    {
        $this->CI->load->model('admin/users_md');

        $this->___SET_DATA_BUY_INDEX($this->CI->users_md->___DB_GET_USERS(),'user');

    }
    private function __GET_ALL_SECTION_FROM_DB()
    {
        $this->CI->load->model('admin/section_md');

        $this->___SET_DATA_BUY_INDEX($this->CI->section_md->___DB_GET_SECTION(),'section');

    }

    public function ___SET_DATA_BUY_INDEX($DATA,$INDEX){

        $this->DATA[$INDEX] = $DATA;
    }
    public function __GET_DATA(){

        return $this->DATA;
    }
    public function __GET_DIRECTORY(){

        return $this->__DIRECTORY;
    }
    public function __GET_REGION(){

        return $this->__REGION;
    }
    public function ___GET_VIEW_HTML(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_HTML;
    }
    public function __GET_VIEW_CSS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_CSS;
    }
    public function __GET_VIEW_JS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_JS;
    }





}