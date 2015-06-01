<?php

Class Get_chat_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/chat_table');

        $this->load->library('table/user_table');

    }

    public function __GET_NEW_CHAT_AJAX_md()
    {
        $ID = $this->chat_table->__GET_ID();

        $ID_USER = $this->chat_table->__GET_ID_USER();

        $TEXT = $this->chat_table->__GET_TEXT();

        $TABLE = $this->chat_table->__GET_TABLE();

        $ID_USER_TABLE = $this->user_table->__GET_ID();

        $NAME_V = $this->user_table->__GET_NAME() . "_" . $this->user_table->__GET_TABLE();

        $NAME = $this->user_table->__GET_NAME();

        $IMAGE = $this->user_table->__GET_IMAGE();

        $IMAGE_V = $this->user_table->__GET_IMAGE() . "_" . $this->user_table->__GET_TABLE();

        $TABLE_USER = $this->user_table->__GET_TABLE();

        $QUERY = "
        $ID ,
        $ID_USER ,
        (SELECT $NAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $NAME_V ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $IMAGE_V ,
        $TEXT

        ";
        $this->db->select($QUERY);

        $this->db->from($TABLE);

        $this->db->where($this->chat_table->__GET_SHOW(),0);

        $q = $this->db->get()->result_array();

        $data = array($this->chat_table->__GET_SHOW() => 1);

        $this->db->where($this->chat_table->__GET_SHOW(),0);

        $this->db->update($TABLE, $data);

        return $q;

    }

}