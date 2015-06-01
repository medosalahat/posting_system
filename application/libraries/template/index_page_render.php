<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'index';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'contant';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');

        $this->CI->load->library('table/user_table');

        $this->___SET_DATA_BUY_INDEX($this->CI->life_line->__GET_REGISTER_PATH(),$this->CI->life_line->__GET_INDEX_REGISTER_PATH());

    }

    public function __GET_PAGE()
    {
        $this->__GET_FIELD();

        $this->__GET_REMOTE_JS();
        $this->__GET_SLIDER();
        $this->__GET_COLLEGE();

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }

    public function __GET_FIELD()
    {
        $data = array(

              $this->CI->user_table->__GET_NAME() ,

              $this->CI->user_table->__GET_USERNAME(),

              $this->CI->user_table->__GET_EMAIL(),

              $this->CI->user_table->__GET_PASSWORD(),

              $this->CI->user_table->__GET_PASSWORD_CONFIRMATION(),

              $this->CI->user_table->__GET_GENDER(),

              $this->CI->user_table->__GET_BIRTHDAY(),

              $this->CI->user_table->__GET_MOBILE() ,

              $this->CI->user_table->__GET_TABLE()

        );

        $this->___SET_DATA_BUY_INDEX($data,$this->CI->user_table->__GET_TABLE());
    }

    private function __GET_SLIDER()
    {

        $this->CI->load->model('slider/slider_md');

        return $this->___SET_DATA_BUY_INDEX($this->CI->slider_md->__GET_DB(),'slider');

    }
    private function __GET_COLLEGE()
    {

        $this->CI->load->model('colloege/colloege_md');

        return $this->___SET_DATA_BUY_INDEX($this->CI->colloege_md->__GET_ALL_DB(),'colloege');

    }

    public function __GET_REMOTE_JS(){

        $data = array(
            $this->CI->life_line->__GET_REMOTE_USERNAME(),
            $this->CI->life_line->__GET_REMOTE_EMAIL(),
        );
        $this->___SET_DATA_BUY_INDEX($data,$this->CI->life_line->__GET_NAME_REMOTE());

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