<?php
Class Login_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    public function __GET_USER_BY_ID($id, $table)
    {


        $this->db->select('*');

        $this->db->from($table);

        $this->db->where(array($this->user_table->__GET_ID() => $id));

        $this->db->limit(1);

        return array_shift($this->db->get()->result_array());


    }

    public function __GET_USER_BY_EMAIL_PASSWORD($DATA,$table)
    {


        $this->db->select('*');

        $this->db->from($table);

        $this->db->where($DATA);

        $this->db->limit(1);

        return array_shift($this->db->get()->result_array());


    }

    public function ___DB_NUM_ROW($VALUE , $COLUMNS ,$TABLE)
    {

        $this->db->select($COLUMNS);

        $this->db->where($COLUMNS,$this->___DB_REAL_ESCAPE_STRING($VALUE));

        $this->db->from($TABLE);

        $query=$this->db->get();

        if ($query->num_rows() > 0) {

            return true;
        }

        return false;

    }

    private function ___DB_REAL_ESCAPE_STRING($VALUE)
    {
        return mysql_real_escape_string($VALUE);
    }

}