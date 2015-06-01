<?php
Class Update_name_mobile extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    function __UPDATE_DB($array,$coumns,$id,$table)
    {

        $this->db->where($coumns,$id);

        $this->db->update($table, $array);


       return $this->db->trans_complete();




    }

}