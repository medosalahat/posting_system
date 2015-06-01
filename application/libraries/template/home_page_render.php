<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_page_render
{
    private $CI ;

    private $DATA;

    private $__DIRECTORY  = 'home';

    private $__FILE_HTML  = '__VIEW_HTML';

    private $__FILE_CSS  = '__VIEW_CSS';

    private $__FILE_JS  = '__VIEW_JS';

    private $__REGION= 'contant';

    private $__URL_PAGE_AJAX = 'function/chat/set_new';

    private $__URL_PAGE_AJAX_GET = 'function/chat/get_new';

    private $__URL_PAGE_AJAX_POST_COMMENT = 'function/comment/set_new';


    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('Template');

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/chat_table');

        $this->CI->load->library('table/post_table');

        $this->CI->load->library('table/user_table');

        $this->CI->load->library('table/comment_table');

        $this->CI->load->model('post/post_md');

        $this->CI->load->model('chat/chat_md');

        $this->CI->load->model('user/user_md');

        $this->CI->load->model('comment/get_comment_md');

        $this->__GET_FILED();

        $this->__GET_TABLE_NEWS();

        $this->__GET_NEW_CHAT();

        $this->__GET_TABLE_CHAT();

        $this->__GET_ME_ID();

        $this->__GET_TABLE_USER();

        $this->__GET_AJAX_URL();

        $this->__GET_INFO_USER();

        $this->__URL_PAGE_AJAX_GET();

        $this->__URL_PAGE_AJAX_POST_COMMENT();

        $this->__GET_TABLE_USER_NEWS();

        $this->__GET_COMMENT();

        $this->__GET_TABLE_COMMENT();

    }

    public function __GET_PAGE()
    {

        $this->CI->template->write_view($this->__GET_REGION(),$this->___GET_VIEW_HTML(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_CSS(),$this->__GET_DATA());

        $this->CI->template->write_view($this->__GET_REGION(),$this->__GET_VIEW_JS(),$this->__GET_DATA());

        $this->CI->template->render();
    }
    private function __GET_FILED()
    {

        return $this->___SET_DATA_BUY_INDEX($this->CI->post_md->__GET_NEWS() ,'post');
    }
    private function __GET_COMMENT()
    {
        return $this->___SET_DATA_BUY_INDEX($this->CI->get_comment_md->__GET_COMMENT() ,'comment');
    }
    private function __GET_ME_ID()
    {
        $this->___SET_DATA_BUY_INDEX($this->CI->session_user->__GET_ID() ,'MY_ID');

    }
    private function __GET_TABLE_NEWS()
    {
        $array= array(
            $this->CI->post_table->__GET_ID(),
            $this->CI->post_table->__GET_ID_USER(),
            $this->CI->post_table->__GET_TEXT(),
            $this->CI->post_table->__GET_MEDIA_ID(),
            $this->CI->post_table->__GET_DATE_TIME(),
        );

        return  $this->___SET_DATA_BUY_INDEX($array,'T_POST');

    }
    private function __GET_TABLE_CHAT()
    {

        $array= array(
            $this->CI->chat_table->__GET_ID(),
            $this->CI->chat_table->__GET_ID_USER(),
            $this->CI->chat_table->__GET_TEXT(),
            $this->CI->chat_table->__GET_IMAGE(),
            $this->CI->chat_table->__GET_VIDEO()
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
    private function __GET_TABLE_USER_NEWS()
    {
        $array=array(
            $this->CI->user_table->__GET_ID(),
            $this->CI->user_table->__GET_NAME(),
            $this->CI->user_table->__GET_USERNAME(),
            $this->CI->user_table->__GET_IMAGE(),

        );

        return  $this->___SET_DATA_BUY_INDEX($array,'T_USER_N');

    }
    private function __GET_TABLE_COMMENT()
    {

        $array= array(
            $this->CI->comment_table->__GET_ID(),
            $this->CI->comment_table->__GET_ID_POST(),
            $this->CI->comment_table->__GET__ID_USER(),
            $this->CI->comment_table->__GET_TEXT()
        );

        return  $this->___SET_DATA_BUY_INDEX($array,'T_COMMENT');

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
    private function __GET_AJAX_URL(){

        return  $this->___SET_DATA_BUY_INDEX(base_url().$this->__URL_PAGE_AJAX,'URL_PAGE_AJAX');
    }
    private function __GET_NEW_CHAT()
    {

        return $this->___SET_DATA_BUY_INDEX($this->CI->chat_md->__GET_NEW_CHAT() ,'chat');
    }
    private function __URL_PAGE_AJAX_GET()
    {

        return $this->___SET_DATA_BUY_INDEX(base_url().$this->__URL_PAGE_AJAX_GET ,'AJAX_GET');
    }
    private function __URL_PAGE_AJAX_POST_COMMENT()
    {

        return $this->___SET_DATA_BUY_INDEX(base_url().$this->__URL_PAGE_AJAX_POST_COMMENT ,'AJAX_POST_COMMENT');
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