<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Specialty extends CI_Controller
{
    function __construct()
    {
        parent::__construct();


    }

    public function get()
    {

        $this->load->model('specialty/specialty_md');

        echo json_encode(($this->specialty_md->__GET_ALL_DB($_POST['id'])));

    }

}

