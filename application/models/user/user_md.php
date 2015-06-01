<?php
Class User_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/user_table');

    }

    public function __GET_IMAGE($value ,$columns ,$cloumns_2 ,$TABLE)
    {



        $this->db->select($cloumns_2);

        $this->db->from($TABLE);

        $this->db->where(array($columns => $value));

        $this->db->limit(1);

        $q =array_shift($this->db->get()->result_array());

        return $q[$cloumns_2] ;


    }


    private function ___DB_REAL_ESCAPE_STRING($VALUE)
    {
        return mysql_real_escape_string($VALUE);
    }

    public function ___DB_GET_ADMIN($ID ,$COLUMNS_ID , $COLUMNS_ADMIN , $TABLE)
    {
        $this->db->select($COLUMNS_ADMIN);

        $this->db->from($TABLE);

        $this->db->where(array($COLUMNS_ID => $ID));

        $this->db->limit(1);

        $q =array_shift($this->db->get()->result_array());

        return $q[$COLUMNS_ADMIN] ;

    }

}