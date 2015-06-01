<?php
Class Register_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function ___DB_NUM_ROW($VALUE , $COLUMNS ,$TABLE)
    {

        $this->db->select($COLUMNS);

        $this->db->where($COLUMNS,$this->___DB_REAL_ESCAPE_STRING($VALUE));

        $this->db->from($TABLE);

        $query=$this->db->get();

        if ($query->num_rows() > 0) {

            return false;
        }

        return true;

    }

    public function __DB_REGISTER_NEW_USER($data , $table)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    private function ___DB_REAL_ESCAPE_STRING($VALUE)
    {
        return mysql_real_escape_string($VALUE);
    }

}