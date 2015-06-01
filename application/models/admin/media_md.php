<?php

Class Media_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/media_table');


    }

    public function __GET_DB()
    {

        $TABLE=$this->media_table->__GET_TABLE();
        $this->db->select('*');

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }



}