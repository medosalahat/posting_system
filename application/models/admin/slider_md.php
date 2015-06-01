<?php
Class Slider_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/slider_table');

    }

    public function __GET_DB()
    {

        $TABLE=$this->slider_table->__GET_TABLE();
        $this->db->select('*');

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }

    public function __REOMVE($id,$id_cloumns,$table)
    {
        $sql="DELETE FROM $table WHERE $id_cloumns=$id";

        //return $sql;

        return $this->DeleteSql($sql);


    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}


}