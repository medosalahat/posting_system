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
    public function ___SET_NEW_Slider($img,$title,$text)
    {
        $arr=array(
            $this->slider_table->__GET_TITLE()=>$title,
            $this->slider_table->__GET_TEXT()=>$text,
            $this->slider_table->__GET_IMAGE()=>$img['file']
        );
        $this->db->insert($this->slider_table->__GET_TABLE(), $arr);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;

    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}


}