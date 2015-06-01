<?php
Class Requirements_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/requirements');

    }

    public function __GET_SYSTEM_NAME()
    {
        $this->db->select($this->requirements->__GET_VALUE());

        $this->db->from($this->requirements->__GET_TABLE());

        $this->db->where(array($this->requirements->__GET_TYPE() => 'SITE_NAME'));

        $this->db->limit(1);

        $query= $this->db->get()->result_array();

        return array_shift(array_shift($query));

    }
}