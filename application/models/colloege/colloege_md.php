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

}