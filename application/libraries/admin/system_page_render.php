<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class system_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'admin/system/';

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
        $this->_GET_NAME_SYSTEM();

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }

    public function ___SET_DATA_BUY_INDEX($DATA,$INDEX){

        $this->DATA[$INDEX] = $DATA;
    }
    private function _GET_NAME_SYSTEM()
    {
        $this->CI->load->model('admin/system_rq_md');

        $this->___SET_DATA_BUY_INDEX($this->CI->system_rq_md->__GET_NAME(),'name_system');
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