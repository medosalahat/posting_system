<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class section_home_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'section/select/';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'contant';

    private $__URL_PAGE_AJAX_GET = 'function/chat_member/get_new';

    private $__URL_PAGE_AJAX = 'function/chat_member/set_new';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');
        $this->CI->load->library('system/session_system');
        $this->CI->load->library('user/session_user');
        $this->CI->load->library('table/chat_member_table');

        $this->CI->load->model('chat/chat_memeber_md');
    }
    private function __GET_AJAX_URL(){

        return  $this->___SET_DATA_BUY_INDEX(base_url().$this->__URL_PAGE_AJAX,'URL_PAGE_AJAX');
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
    private function __GET_TABLE_CHAT()
    {

        $array= array(
            $this->CI->chat_member_table->__GET_ID(),
            $this->CI->chat_member_table->__GET_ID_USER(),
            $this->CI->chat_member_table->__GET_TEXT(),
            $this->CI->chat_member_table->__GET_ID_SECTION()
        );
        return  $this->___SET_DATA_BUY_INDEX($array,'T_CHAT');

    }
    private function __GET_TABLE_USER()
    {
        $array=array(
            $this->CI->user_table->__GET_ID()."_".$this->CI->user_table->__GET_TABLE(),
            $this->CI->user_table->__GET_NAME()."_".$this->CI->user_table->__GET_TABLE(),
            $this->CI->user_table->__GET_USERNAME()."_".$this->CI->user_table->__GET_TABLE(),
            $this->CI->user_table->__GET_IMAGE()."_".$this->CI->user_table->__GET_TABLE(),

        );

        return  $this->___SET_DATA_BUY_INDEX($array,'T_USER');

    }
    private function __GET_INFO_USER()
    {
        $array=array(
            $this->CI->session_user->__GET_NAME(),
            $this->CI->user_md->__GET_IMAGE(
                $this->CI->session_user->__GET_ID(),
                $this->CI->user_table->__GET_ID(),
                $this->CI->user_table->__GET_IMAGE(),
                $this->CI->user_table->__GET_TABLE()
            ),


        );

        return  $this->___SET_DATA_BUY_INDEX($array,'INFO_USER');

    }
    private function __GET_ALL()
    {

        $this->CI->load->model('section/section_md');
        $data=$this->CI->section_md->This_user_is_members($_GET['id'],$this->CI->session_system->__GET_SYSTEM());

         if(isset($data[0]))
        {
            $this->___SET_DATA_BUY_INDEX($data,'DATA_');
            $this->___SET_DATA_BUY_INDEX($this->CI->section_md->Get_members($_GET['id']),'MEMBERS');
            $this->__GET_NEW_CHAT();
            $this->__GET_TABLE_CHAT();
            $this->__GET_TABLE_USER();
            $this->__GET_ME_ID();
            $this->__URL_PAGE_AJAX_GET();
            $this->__GET_AJAX_URL();
            $this->__GET_INFO_USER();
            $this->CI->session_user->__SET_SECTION_ID($_GET['id']);

        }
        else
        {

            return $this->___SET_DATA_BUY_INDEX('you are not a member in this section' ,'Not');
        }

    }
    private function __GET_ME_ID()
    {
        $this->___SET_DATA_BUY_INDEX($this->CI->session_user->__GET_ID() ,'MY_ID');

    }
    private function __GET_NEW_CHAT()
    {

        return $this->___SET_DATA_BUY_INDEX($this->CI->chat_memeber_md->__GET_NEW_CHAT($_GET['id']) ,'chat');
    }
    private function __URL_PAGE_AJAX_GET()
    {

        return $this->___SET_DATA_BUY_INDEX(base_url().$this->__URL_PAGE_AJAX_GET ,'AJAX_GET');
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