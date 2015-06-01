<?php
Class User_me_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    function __GET_ME_DB($DATA , $table)
    {
        $this->db->select('*');

        $this->db->from($table);

        $this->db->where($DATA);

        $this->db->limit(1);

        return array_shift($this->db->get()->result_array());

    }

}