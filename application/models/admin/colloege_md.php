<?php
Class Colloege_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/college_table');
    }

   public function __GET_ALL_DB()
   {

       $this->db->select('*');

       $this->db->from($this->college_table->__GET_TABLE());


       return  $this->db->get()->result_array();
   }
    function SET_new($college){

        $TABLE=$this->college_table->__GET_TABLE();

        $data=array(

            $this->college_table->__GET_TEXT()=>$college,


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