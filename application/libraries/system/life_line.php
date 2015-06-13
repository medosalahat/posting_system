<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Life_line
{

    private $CI;

    private $__HOME_PAGE ;

    private $__MD5_VALUE ;

    private $__REGISTER_PATH = 'function/user/SET_NEW_USER';

    private $__LOGIN_PATH = 'function/user/SET_NEW_LOGIN';

    private $__REMOTE_USERNAME_PATH = 'function/user/GET_USERNAME';

    private $__REMOTE_EMAIL_PATH = 'function/user/GET_EMAIL';

    private $__REMOTE_EMAIL_LOGIN_PATH = 'function/user/GET_EMAIL_LOGIN';

    private $__INDEX_REGISTER_PATH = 'REGISTER';

    private $__INDEX_LOGIN_PATH = 'LOGIN';

    private $___NAME_REOMTE = 'remote';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('system/session_login');

        $this->CI->load->model('system/requirements_md');

        $this->__SET_HOME_PAGE();

        $this->__SET_MD5_VALUE();
    }

    public function __GET_LINK()
    {
        if($this->CI->session_login->__GET_IS_LOGIN_HEADER()) {

            return $this->__GET_LINK_IN_TRUE_LOGIN();

        }

        return $this->__GET_LINK_IN_FALSE_LOGIN();
    }

    public function __GET_SYSTEM_NAME()
    {

        return $this->CI->requirements_md->__GET_SYSTEM_NAME();

    }

    private function __GET_LINK_IN_TRUE_LOGIN(){

        $this->CI->load->library('system/admin_page');



            if ($this->CI->admin_page->__GET_IS_ADMIN()) {

                return array(

                    'ME'         => $this->__GET_USER_PAGE()   ,

                    'CONTACT US'   => $this->__GET_CONTACT_US()  ,
                    'ADMIN PAGE'   => $this->CI->admin_page->__GET_ADMIN_PAGE()  ,
                    'SECTION'   => $this->__GET_SECTION_PAGE()  ,



                    'LOGOUT'       => $this->__GET_LOGOUT_PAGE()

                );

            }


        return array(

            'ME'         => $this->__GET_USER_PAGE()   ,

            'CONTACT US'   => $this->__GET_CONTACT_US()  ,

            'SECTION'   => $this->__GET_SECTION_PAGE()  ,

            'LOGOUT'       => $this->__GET_LOGOUT_PAGE()

        );

    }

    private function __GET_LINK_IN_FALSE_LOGIN(){

        return array(



            'CONTACT US'   => $this->__GET_CONTACT_US()



        );

    }

    private function __SET_HOME_PAGE()
    {

        $this->__HOME_PAGE = base_url();
    }

    public function __GET_HOME_PAGE(){

        return $this->__HOME_PAGE;
    }
    public function __GET_SECTION_PAGE(){

        return  $this->__GET_HOME_PAGE()."section/home";
    }

    public function __GET_MAIN_PAGE(){

        return $this->__GET_HOME_PAGE()."page/home";
    }

    private function __GET_LOGIN_PAGE()
    {
        return $this->__GET_HOME_PAGE().'user/login';
    }

    private function __GET_LOGOUT_PAGE()
    {
        return $this->__GET_HOME_PAGE().'page/logout';
    }

    private function __GET_USER_PAGE(){

        return $this->__GET_HOME_PAGE().'user/me/';
    }

    private function __GET_CONTACT_US(){

        return $this->__GET_HOME_PAGE().'contact_us';
    }

    private function __GET_SERVICES(){

        return $this->__GET_HOME_PAGE().'services';
    }

    private function __SET_MD5_VALUE()
    {

        $this->__MD5_VALUE = 'SYSTEM_DATA_NEW';
    }

    private function __GET_MD5_VALUE()
    {
        return $this->__MD5_VALUE;
    }

    public function __GET_MD5($value)
    {
        return md5($this->__GET_MD5_VALUE().$value);
    }

    public function __GET_IS_EMPTY($VALUE){

        IF(empty($VALUE))
        {
            return false;
        }
        return true;
    }

    public function __GET_IS_SET_POST($VALUE){

        IF(isset($_POST[$VALUE]))
        {
            return true;
        }
        return false;
    }

    public function __POST($VALUE){

        return $this->CI->input->post($VALUE,true);
    }

    public function __GET_REGISTER_PATH()
    {
        return $this->__GET_HOME_PAGE().$this->__REGISTER_PATH;
    }

    public function __GET_INDEX_REGISTER_PATH()
    {
        return $this->__INDEX_REGISTER_PATH;
    }
    public function __GET_INDEX_LOGIN_PATH()
    {
        return $this->__INDEX_LOGIN_PATH;
    }
    public function __GET_LOGIN_PATH()
    {
        return $this->__GET_HOME_PAGE().$this->__LOGIN_PATH;
    }

    public function __GET_REMOTE_USERNAME()
    {
        return $this->__GET_HOME_PAGE().$this->__REMOTE_USERNAME_PATH;
    }

    public function __GET_REMOTE_EMAIL(){
        return $this->__GET_HOME_PAGE().$this->__REMOTE_EMAIL_PATH;
    }

    public function __GET_NAME_REMOTE(){
        return $this->___NAME_REOMTE;
    }

    public function __GET_REMOTE_USERNAME_LOGIN()
    {
        return $this->__GET_HOME_PAGE().$this->__REMOTE_USERNAME_PATH;
    }

    public function __GET_REMOTE_EMAIL_LOGIN(){
        return $this->__GET_HOME_PAGE().$this->__REMOTE_EMAIL_LOGIN_PATH;
    }




}