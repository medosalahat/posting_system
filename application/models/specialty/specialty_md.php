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

       $this->db->select('*');

       $this->db->from($this->specialty_table->__GET_TABLE());
       return  $this->db->get()->result_array();
   }

}