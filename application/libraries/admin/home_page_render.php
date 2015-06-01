<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class home_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'admin/home/';

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
        $this->__GET_LINK_ADMIN();

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }

    public function ___SET_DATA_BUY_INDEX($DATA,$INDEX){

        $this->DATA[$INDEX] = $DATA;
    }
    private function __GET_LINK_ADMIN()
    {
        $this->CI->load->library('system/admin_page');

        $this->___SET_DATA_BUY_INDEX(
            array(
                'Home Admin'=>$this->CI->admin_page->__GET_ADMIN_PAGE(),
                'System Requirements'=>$this->CI->admin_page->__GET_ADMIN_SYSTEM_PAGE(),
                'Media'=>$this->CI->admin_page->__GET_ADMIN_MEDIA_PAGE(),
                'Users'=>$this->CI->admin_page->__GET_ADMIN_USER_PAGE(),
                'Post'=>$this->CI->admin_page->__GET_ADMIN_POST_PAGE(),
                'Slider'=>$this->CI->admin_page->__GET_ADMIN_SLIDER_PAGE(),
                'Chat'=>$this->CI->admin_page->__GET_ADMIN_CHAT_PAGE(),
                'Contact Us'=>$this->CI->admin_page->__GET_ADMIN_CONTACT_PAGE(),
                'SECTION'=>$this->CI->admin_page->__GET_ADMIN_SECTION_PAGE(),
                'Members'=>$this->CI->admin_page->__GET_ADMIN_MEMBERS_PAGE(),

            ),'LINK_ADMIN');
        $this->___SET_DATA_BUY_INDEX(
            array(
                'Home Admin'=>'glyphicon glyphicon-home',
                'System Requirements'=>'glyphicon glyphicon-off',
                'Media'=>'glyphicon glyphicon-th-large',
                'Users'=>'glyphicon glyphicon-user',
                'Post'=>'glyphicon glyphicon-share',
                'Slider'=>'glyphicon glyphicon-picture',
                'Chat'=>'glyphicon glyphicon-edit',
                'Contact Us'=>'glyphicon glyphicon-map-marker',
                'SECTION'=>'glyphicon glyphicon-oil',
                'Members'=>'glyphicon glyphicon-education',

            ),'ICON');
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