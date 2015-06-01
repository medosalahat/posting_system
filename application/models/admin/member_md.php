<?php

Class Member_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/members_table');
        $this->load->library('table/user_table');
        $this->load->library('table/section_table');
    }
    public function INSERT_NEW_USER_TO_SECTION($id_user,$id_section)
    {
        $data=array(
            $this->members_table->__GET_ID_USER()=>$id_user ,
            $this->members_table->__GET_ID_SECTION()=>$id_section ,

        );
        $this->db->insert($this->members_table->__GET_TABLE(), $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;

    }
    function __GET_DB()
    {
        $ID = $this->user_table->__GET_ID();

        $GET_ID = $this->members_table->__GET_ID();

        $GET_TABLE = $this->members_table->__GET_TABLE();

        $GET_ID_SECTION = $this->members_table->__GET_ID_SECTION();

        $GET_TITLE = $this->section_table->__GET_TITLE();
        $__GET_ID = $this->section_table->__GET_ID();

        $TABLe = $this->section_table->__GET_TABLE();

        $GET_ID_USER = $this->members_table->__GET_ID_USER();

        $NAME=$this->user_table->__GET_NAME();

        $IMAGE=$this->user_table->__GET_IMAGE();

        $TABLE_USER=$this->user_table->__GET_TABLE();

        $QUERY = "
        $GET_ID ,
        $GET_ID_SECTION,
        $GET_ID_USER ,
        (SELECT $NAME from $TABLE_USER WHERE $ID =  $GET_ID_USER) $NAME ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID =  $GET_ID_USER) $IMAGE,
        (SELECT $GET_TITLE from $TABLe WHERE $ID =  $GET_ID_SECTION ) $GET_ID_SECTION
        ";

        $this->db->select($QUERY);


        $this->db->from($GET_TABLE);

        return $this->db->get()->result_array();

    }
    function remove_row($id)
    {
        $id_cloumns = $this->members_table->__GET_ID();
        $table = $this->members_table->__GET_TABLE();
        $sql="DELETE FROM $table WHERE $id_cloumns=$id";
        return $this->DeleteSql($sql);
    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}

}