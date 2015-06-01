<?php
Class Section_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/section_table');

    }
    public function ___DB_GET_SECTION()
    {
        $array=array(
            $this->section_table->__GET_ID() ,
            $this->section_table->__GET_TITLE()
        );

        $this->db->select($array);

        $this->db->from($this->section_table->__GET_TABLE());

        return  $this->db->get()->result_array();
    }

    public function __GET_DB()
    {
        $this->load->library('table/college_table');
        $this->load->library('table/section_table');
        $this->load->library('table/specialty_table');
        $data=array(
            $this->section_table->__GET_TITLE(),
            $this->section_table->__GET_ID(),
            '( select '.$this->college_table->__GET_TEXT()." from " .$this->college_table->__GET_TABLE().' where '
            .$this->college_table->__GET_ID().' = '.$this->section_table->__GET_ID_COLLEGE().' ) '.
            $this->section_table->__GET_ID_COLLEGE(),
            '( select '.$this->specialty_table->__GET_TEXT()." from " .$this->specialty_table->__GET_TABLE().' where '
            .$this->specialty_table->__GET_ID().' = '.$this->section_table->__GET_ID_SPECIALTY().' ) '.
            $this->section_table->__GET_ID_SPECIALTY()
        );

        $TABLE=$this->section_table->__GET_TABLE();
        $this->db->select($data);

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }
    function SET_new($text,$specialty,$college){

        $TABLE=$this->section_table->__GET_TABLE();

        $data=array(
            $this->section_table->__GET_TITLE()=>$text,
            $this->section_table->__GET_ID_COLLEGE()=>$college,
            $this->section_table->__GET_ID_SPECIALTY()=>$specialty,

        );
        $this->db->insert($TABLE, $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;


    }


    public function __REOMVE($id,$id_cloumns,$table)
    {
        $sql="DELETE FROM $table WHERE $id_cloumns=$id";

        //return $sql;

        return $this->DeleteSql($sql);


    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}


}