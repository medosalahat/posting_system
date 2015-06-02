<?php
Class Users_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    public function ___DB_GET_USERS()
    {
        $array=array(
            $this->user_table->__GET_ID() ,
            $this->user_table->__GET_NAME()
        );

        $this->db->select($array);

        $this->db->from($this->user_table->__GET_TABLE());

        return  $this->db->get()->result_array();
    }
    public function ___DB_GET_USERS2()
    {

        $this->db->select('*');

        $this->db->from($this->user_table->__GET_TABLE());

        return  $this->db->get()->result_array();
    }

    public function ___EDIT_USER($ID , $COLUMNS_ID , $ADMIN ,$COLUMNS_ADMIN,$TABLE)
    {

        $data = array($COLUMNS_ADMIN => $ADMIN);

        $this->db->where($COLUMNS_ID, $ID);

        $this->db->update($TABLE, $data);

        return $this->db->affected_rows();

    }
    public function ___EDIT_LEVEL($ID , $COLUMNS_ID , $ADMIN ,$COLUMNS_ADMIN,$TABLE)
    {

        $data = array($COLUMNS_ADMIN => $ADMIN);

        $this->db->where($COLUMNS_ID, $ID);

        $this->db->update($TABLE, $data);

        return $this->db->affected_rows();

    }

}