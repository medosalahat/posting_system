<?php
Class Set_row_contact_us_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function __SET_NEW($array,$table)
    {
        $this->db->insert($table, $array);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;


    }



}