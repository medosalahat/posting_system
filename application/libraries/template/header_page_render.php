<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class header_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'header';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'header';

    private $__sub= 'Login';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');

        $this->CI->load->library('system/life_line');

        $this->CI->load->library('table/user_table');

        $this->CI->load->library('system/session_login');

        $this->DATA['LINK'] = $this->CI->life_line->__GET_LINK();

        $this->DATA['SITE_NAME'] = $this->CI->life_line->__GET_SYSTEM_NAME();

        $this->DATA['HOME_PAGE'] = $this->CI->life_line->__GET_HOME_PAGE();

        $this->DATA['IS_LOGIN'] = $this->CI->session_login->__GET_IS_LOGIN_HEADER();

        $this->___SET_DATA_BUY_INDEX($this->CI->life_line->__GET_LOGIN_PATH(),$this->CI->life_line->__GET_INDEX_LOGIN_PATH());

        $this->__GET_FIELD();

        $this->__GET_REMOTE_JS();

        $this->__GET_PAGE();

        $this->__GET_ADMIN();

    }


    public function __GET_PAGE()
    {
        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());
    }

    public function ___SET_DATA($DATA){

        $this->DATA = $DATA;
    }

    public function __GET_DATA(){

        return $this->DATA;
    }

    private function __GET_DIRECTORY(){

        return $this->__DIRECTORY;
    }

    private function __GET_REGION(){

        return $this->__REGION;
    }

    private function ___GET_VIEW_HTML(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_HTML;
    }

    private function __GET_VIEW_CSS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_CSS;
    }

    private function __GET_VIEW_JS(){

        return $this->__GET_DIRECTORY().'/'.$this->__FILE_JS;
    }

    private function ___SET_DATA_BUY_INDEX($DATA,$INDEX){

        $this->DATA[$INDEX] = $DATA;
    }

    private function __GET_FIELD()
    {
        $data = array(


            $this->__sub."_".$this->CI->user_table->__GET_EMAIL(),

            $this->__sub."_".$this->CI->user_table->__GET_PASSWORD(),

            $this->__sub."_".$this->CI->user_table->__GET_TABLE()

        );

        $this->___SET_DATA_BUY_INDEX($data,$this->__sub."_".$this->CI->user_table->__GET_TABLE());
    }

    private function __GET_REMOTE_JS(){

        $data = array(
            $this->CI->life_line->__GET_REMOTE_EMAIL_LOGIN(),
        );
        $this->___SET_DATA_BUY_INDEX($data,$this->CI->life_line->__GET_NAME_REMOTE());

    }

    private function __GET_ADMIN()
    {
        $this->CI->load->library('system/admin_page');

        $this->CI->load->library('system/session_login');

        if(!$this->CI->session_login->__GET_IS_LOGIN()) {

            if ($this->CI->admin_page->__GET_IS_ADMIN()) {

                $this->___SET_DATA_BUY_INDEX($this->CI->admin_page->__GET_ADMIN_PAGE(), 'ADMIN_PAGE');

            }
        }
    }




}