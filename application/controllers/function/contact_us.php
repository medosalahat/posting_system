<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function set_new()
    {
        $this->load->library('contact_us/contact_us_lib');
        $this->load->library('table/contact_us_table');
        $this->load->library('user/session_user');
        if (
            $this->__IS_SET_POST('name') &&
            $this->__IS_SET_POST('email') &&
            $this->__IS_SET_POST('phone') &&
            $this->__IS_SET_POST('message')
        ) {
            if (
                $this->__IS_EMPTY($_POST['name']) &&
                $this->__IS_EMPTY($_POST['email']) &&
                $this->__IS_EMPTY($_POST['phone']) &&
                $this->__IS_EMPTY($_POST['message'])
            ) {


                 $this->contact_us_lib->set_new_row(array(
                        $this->contact_us_table->__GET_NAME() => $this->__FILTER_VALUE($_POST['name']),
                        $this->contact_us_table->__GET_EMAIL() => $this->__FILTER_VALUE($_POST['email']),
                        $this->contact_us_table->__GET_MOBILE() => $this->__FILTER_VALUE($_POST['phone']),
                        $this->contact_us_table->__GET_MESSAGE() => $this->__FILTER_VALUE($_POST['message']),
                        $this->contact_us_table->__GET_IP() => $this->session_user->__GET_IP_USER()
                    )
                    ,
                    $this->contact_us_table->__GET_TABLE()
                );

            }

        }

        $this->load->library('template/contact_us_page_render');

        $this->contact_us_page_render->__GET_PAGE();


    }



    private function __IS_SET_POST($value)
    {

        if (isset($_POST[$value])) {
            return true;
        }
        return false;

    }

    private function __FILTER_VALUE($value)
    {
        return mysql_real_escape_string($value);

    }

    private function __IS_EMPTY($value)
    {
        if (empty($value)) {
            return false;
        }

        return true;
    }

} ?>