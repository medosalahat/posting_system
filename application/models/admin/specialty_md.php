<?php
Class Specialty_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/specialty_table');
    }

   public function __GET_ALL_DB($id)
   {

       $this->db->select('*');
       $this->db->where('id_college',$id);

       $this->db->from($this->specialty_table->__GET_TABLE());
       return  $this->db->get()->result_array();
   }
    public function __GET_DB()
   {
       $this->load->library('table/college_table');
       $data=array(
           $this->specialty_table->__GET_TEXT(),
           $this->specialty_table->__GET_ID(),
           '( select '.$this->college_table->__GET_TEXT()." from " .$this->college_table->__GET_TABLE().' where '
           .$this->college_table->__GET_ID().' = '.$this->specialty_table->__GET_ID_COLLEGE().' ) '.
           $this->specialty_table->__GET_ID_COLLEGE()
       );
       $this->db->select($data);

       $this->db->from($this->specialty_table->__GET_TABLE());
       return  $this->db->get()->result_array();
   }
    function SET_new($college,$specialty){

        $TABLE=$this->specialty_table->__GET_TABLE();

        $data=array(

            $this->specialty_table->__GET_ID_COLLEGE()=>$college,
            $this->specialty_table->__GET_TEXT()=>$specialty,


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