<?php
Class Edit_image_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    function __UPDATE_IMAGE($NAME_CLOMNS,$VALUE,$array,$table)
    {

        $this->db->where($NAME_CLOMNS,$VALUE);

        $this->db->update($table, $array);


        $this->db->trans_complete();

        $this->db->select($this->user_table->__GET_IMAGE());
        $this->db->where($NAME_CLOMNS,$VALUE);
        $this->db->from($table);

         $q =array_shift($this->db->get()->result_array());

        return $q[$this->user_table->__GET_IMAGE()];


    }
    function __UPDATE_IMAGE_post($id_post,$id_user,$file,$table)
    {
        $this->load->library('table/post_table');


        $this->db->where($this->post_table->__GET_ID(),$id_post);

        $this->db->update($table, $file);


       return $this->db->trans_complete();




    }

}