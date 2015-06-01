<?php
Class Section_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/section_table');
        $this->load->library('table/members_table');
        $this->load->library('table/user_table');


    }

    public function __GET_DB()
    {

        $TABLE=$this->section_table->__GET_TABLE();
        $this->db->select('*');
        $this->db->from($TABLE);
        return $this->db->get()->result_array();
    }
    public function This_user_is_members($id,$id_user)
    {
        $ID_SECTION = $this->members_table->__GET_ID_SECTION();
        $ID_USER = $this->members_table->__GET_ID_USER();
        $where ="$ID_SECTION = '$id' and $ID_USER = '$id_user'";
        $TABLE=$this->members_table->__GET_TABLE();

        $select=array(
            $this->members_table->__GET_ID(),
            $this->members_table->__GET_ID_SECTION(),
            $this->members_table->__GET_ID_USER(),
            $this->members_table->__GET_TYPE_MEMBERS(),
            $this->__GET_SELECT($this->user_table->__GET_NAME(),$this->user_table->__GET_TABLE(),$this->user_table->__GET_ID(),$this->members_table->__GET_ID_USER()),
            $this->__GET_SELECT($this->user_table->__GET_IMAGE(),$this->user_table->__GET_TABLE(),$this->user_table->__GET_ID(),$this->members_table->__GET_ID_USER()),

        );
        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($TABLE);
        return ($this->db->get()->result_array());

    }
    public function Get_members($id)
    {
        $ID_SECTION = $this->members_table->__GET_ID_SECTION();
        $where ="$ID_SECTION = '$id'";
        $TABLE=$this->members_table->__GET_TABLE();

        $select=array(
            $this->members_table->__GET_ID(),
            $this->members_table->__GET_ID_SECTION(),
            $this->members_table->__GET_ID_USER(),
            $this->members_table->__GET_TYPE_MEMBERS(),
            $this->__GET_SELECT($this->user_table->__GET_NAME(),$this->user_table->__GET_TABLE(),$this->user_table->__GET_ID(),$this->members_table->__GET_ID_USER()),
            $this->__GET_SELECT($this->user_table->__GET_IMAGE(),$this->user_table->__GET_TABLE(),$this->user_table->__GET_ID(),$this->members_table->__GET_ID_USER()),

        );
        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($TABLE);
        return ($this->db->get()->result_array());

    }
    public function __GET_SELECT($NAME_COLUMNS , $NAME_TABLE ,$GET_WHERE_COLUMNS , $GET_WHERE_LOUMNS_TWO )
    {
        return '(select '.$NAME_COLUMNS.' from '.$NAME_TABLE.
        ' where '.$GET_WHERE_COLUMNS.' = '.$GET_WHERE_LOUMNS_TWO
        .')'.$NAME_COLUMNS;
    }
}