<?php
Class System_rq_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();



    }

    public function __GET_NAME()
    {
        $this->load->library('table/requirements');

        $TABLE=$this->requirements->__GET_TABLE();
        $this->db->select('*');
        $this->db->where($this->requirements->__GET_TYPE(),'SITE_NAME');

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }
    public function __UPDATE($name,$name_value,$SITE_NAME,$SITE_NAME_value,$TABLE)
    {

        $data = array($name_value =>$name );

        $this->db->where($SITE_NAME, $SITE_NAME_value);

        $this->db->update($TABLE, $data);

        return $this->db->affected_rows();

    }


}