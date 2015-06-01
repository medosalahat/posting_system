<?php
Class Contact_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/contact_us_table');

    }

    public function __GET_DB()
    {

        $this->db->select('*');

        $this->db->from($this->contact_us_table->__GET_TABLE());


        return  $this->db->get()->result_array();
    }

    public function __REOMVE($id,$id_cloumns,$table)
    {
        $sql="DELETE FROM $table WHERE $id_cloumns=$id";

        return $this->DeleteSql($sql);


    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}


}