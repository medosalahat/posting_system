<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
{

    private  $__DATA;

    function __construct()
    {
        parent::__construct();

        $this->load->library('user/register');

        $this->load->library('user/login');

        $this->load->library('table/user_table');


    }

    public function SET_NEW_USER()
    {

        $this->___SET_DATA($this->register->__SET_NEW_USER_LIB());

        if($this->__GET_DATA_BY_INDEX('valid'))
        {
            $this->___SET_DATA_BY_INDEX(
            $this->login->___SET_NEW_LOGIN_USER_AFTER_REGISTER($this->__GET_DATA_BY_INDEX($this->user_table->__GET_ID()))
            ,$this->user_table->__GET_ID());

            echo json_encode(array('valid'=>$this->get_instance()->session_login->__GET_REDIRECT_MAIN_PAGE()));


        }
    }
    public function add_post()
    {
        $this->load->library('system/session_system');

        $post=$_POST['post'];
        $id=$this->session_system->__GET_SYSTEM();
        $this->load->model('post/post_md');

        echo json_encode(array($this->post_md->add_post($id,$post)));
    }
    public function GET_USERNAME()
    {

        echo json_encode(array('valid'=>$this->register->__GET_USERNAME_FROM_DB()));
    }
    public function GET_EMAIL(){

        echo json_encode(array('valid'=>$this->register->__GET_EMAIL_FROM_DB()));


    }
    public function SET_NEW_LOGIN(){

        echo json_encode(array('valid'=>$this->login->__SET_NEW_LOGIN_USER()));

    }
    public function GET_EMAIL_LOGIN(){

        echo json_encode(array('valid'=>$this->login->__GET_EMAIL_FROM_DB()));

    }
    private function ___SET_DATA($DATA)
    {
        $this->__DATA = $DATA;
    }
    private function ___SET_DATA_BY_INDEX($DATA,$INDEX)
    {
        $this->__DATA[$INDEX] = $DATA;
    }
    private function __GET_DATA_BY_INDEX($INDEX)
    {
        return $this->__DATA[$INDEX];
    }


    public function upload_new_image()
    {
        $this->load->library('user/edit_image');
        $this->load->library('upload_image');
        $file = $this->edit_image->___SET_NEW_IMAGE_USER($this->upload_image->move_file("file"));

        //echo base_url().$file;
        $this->load->library('template/user_page_render');
        $this->user_page_render->__GET_PAGE();
    }
    public function upload_image_post()
    {
        $this->load->library('user/edit_image');
        $this->load->library('upload_image');
        $file = $this->edit_image->___SET_NEW_IMAGE_POST($this->upload_image->move_file("file_post"));

        echo base_url().$file;
    }

    public function update()
    {
        $this->load->library('user/update_user');

        if($this->__IS_SET_POST('name') && $this->__IS_SET_POST('mobile'))
        {

            if($this->__IS_EMPTY($_POST['name']) && $this->__IS_EMPTY($_POST['mobile']))
            {

                echo json_encode(array('valid'=>$this->update_user->update_name_mobile(
                    $this->__FILTER_VALUE($_POST['name']),
                    $this->__FILTER_VALUE($_POST['mobile'])
                )));


            }

        }


    }

    private function __IS_SET_POST($value)
    {

        if(isset($_POST[$value]))
        {
            return true;
        }
        return false ;

    }
    private function __FILTER_VALUE($value)
    {
        return mysql_real_escape_string($value);

    }
    private function __IS_EMPTY($value)
    {
        if(empty($value))
        {
            return false;
        }

        return true;
    }

    public function __GET_specialty()
    {

    }
}

