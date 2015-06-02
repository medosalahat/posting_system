<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_page
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

    }

    public function __GET_ADMIN_PAGE(){

        return base_url() . 'admin/home';

    }


    public function __GET_ADMIN_USER_PAGE(){

        return base_url() . 'admin/users';

    }

      public function __GET_ADMIN_POST_PAGE(){

        return base_url() . 'admin/post';

    }

    public function __GET_ADMIN_SECTION_PAGE(){

        return base_url() . 'admin/section';

    }

    public function __GET_ADMIN_SLIDER_PAGE(){

        return base_url().'admin/slider';
    }

    public function __GET_ADMIN_CONTACT_PAGE(){

        return base_url().'admin/contact';
    }

    public function __GET_ADMIN_CHAT_PAGE(){

        return base_url().'admin/chat';
    }
    public function __GET_ADMIN_MEDIA_PAGE(){

        return base_url().'admin/media';
    }
    public function __GET_ADMIN_SYSTEM_PAGE(){

        return base_url().'admin/system';
    }

 public function __GET_ADMIN_MEMBERS_PAGE(){

        return base_url().'admin/members';
    }
    public function __GET_ADMIN_SECTION_PAGE_s(){

        return base_url().'section';
    }





    public function __GET_IS_ADMIN()
    {

        $this->CI->load->model('user/user_md');
        $this->CI->load->library('table/user_table');
        $this->CI->load->library('system/session_system');

        return $this->CI->user_md->___DB_GET_ADMIN(
            $this->CI->session_system->__GET_SYSTEM(),
            $this->CI->user_table->__GET_ID(),
            $this->CI->user_table->__GET_IS_ADMIN(),
            $this->CI->user_table->__GET_TABLE()
        );
    }


}