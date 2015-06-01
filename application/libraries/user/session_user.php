<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Session_user
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');
    }

   public function __SET_ID($ID){

        $this->CI->session->set_userdata('ID',$ID);

    }

    public function __SET_ADMIN($ADMIN){

        $this->CI->session->set_userdata('IS_ADMIN',$ADMIN);

    }

    public function __SET_NAME($NAME){

        $this->CI->session->set_userdata('NAME',$NAME);
    } public function __SET_SECTION_ID($NAME){

        $this->CI->session->set_userdata('SECTION_ID',$NAME);
    }
    public function __GET_SECTION_ID(){

        return $this->CI->session->userdata('SECTION_ID');

    }

    public function __SET_IMAGE($IMAGE){

        $this->CI->session->set_userdata('IMAGE',$IMAGE);

    }

    public function __SET_USERNAME($USERNAME){

        $this->CI->session->set_userdata('USERNAME',$USERNAME);

    }

    public function __GET_ID(){

        return $this->CI->session->userdata('ID');

    }

    public function __GET_ADMIN(){

        return $this->CI->session->userdata('IS_ADMIN');

    }

    public function __GET_NAME(){

        return $this->CI->session->userdata('NAME');
    }

    public  function __GET_IMAGE(){

        return $this->CI->session->userdata('IMAGE');

    }

    public function __GET_USERNAME(){

        return $this->CI->session->userdata('USERNAME');

    }

    public function __GET_IP_USER()
    {
        return $this->CI->input->ip_address();
    }

}