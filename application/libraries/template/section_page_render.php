<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class section_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'section/home/';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'contant';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');
        $this->CI->load->library('system/admin_page');

    }

    public function __GET_PAGE()
    {
        $this->__RUN();

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }

    private function __RUN(){
        $this->__GET_ALL();

    }
    private function __GET_ALL()
    {
        $this->CI->load->model('colloege/colloege_md');
        $this->CI->load->model('specialty/specialty_md');
        $this->CI->load->model('section/section_md');


            $this->___SET_DATA_BUY_INDEX(
                $this->CI->colloege_md->__GET_ALL_DB()
                ,'colloege');

            $this->___SET_DATA_BUY_INDEX(
                $this->CI->specialty_md->__GET_DB()
                ,'specialty');
            $this->___SET_DATA_BUY_INDEX(
                $this->CI->section_md->__GET_DB()
                ,'section');


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