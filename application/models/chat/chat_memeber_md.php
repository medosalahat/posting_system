<?php

Class Chat_memeber_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/chat_member_table');
        $this->load->library('table/user_table');

    }

    public function __GET_NEW_CHAT($id)
    {
        $ID = $this->chat_member_table->__GET_ID();

        $ID_USER = $this->chat_member_table->__GET_ID_USER();

        $TEXT = $this->chat_member_table->__GET_TEXT();

        $ID_SECTION = $this->chat_member_table->__GET_ID_SECTION();



        $TABLE = $this->chat_member_table->__GET_TABLE();

        $ID_USER_TABLE = $this->user_table->__GET_ID();

        $NAME_V = $this->user_table->__GET_NAME() . "_" . $this->user_table->__GET_TABLE();

        $NAME = $this->user_table->__GET_NAME();

        $IMAGE = $this->user_table->__GET_IMAGE();

        $IMAGE_V = $this->user_table->__GET_IMAGE() . "_" . $this->user_table->__GET_TABLE();

        $TABLE_USER = $this->user_table->__GET_TABLE();

        $data = array($this->chat_member_table->__GET_SHOW() => 1);

        $this->db->update($TABLE, $data);



        $QUERY = "
        $ID ,
        $ID_USER ,
        (SELECT $NAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $NAME_V ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $IMAGE_V ,
        $TEXT

        ";

        $this->db->select($QUERY);

        $this->db->where($ID_SECTION,$id);

        $this->db->from($TABLE);

        return $this->db->get()->result_array();




    }






    private function ___DB_REAL_ESCAPE_STRING($VALUE)
    {
        return mysql_real_escape_string($VALUE);
    }

    public function __GET_NEW_CHAT_AJAX_md($id)
    {
        $ID = $this->chat_member_table->__GET_ID();

        $ID_USER = $this->chat_member_table->__GET_ID_USER();
        $ID_SECTION = $this->chat_member_table->__GET_ID_SECTION();

        $TEXT = $this->chat_member_table->__GET_TEXT();

        $TABLE = $this->chat_member_table->__GET_TABLE();

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


        $data = array($this->chat_member_table->__GET_SHOW() => 0 , $this->chat_member_table->__GET_ID_SECTION()=>$id);
        $this->db->where($data);

        $q = $this->db->get()->result_array();

        $data = array($this->chat_member_table->__GET_SHOW() => 1 , $this->chat_member_table->__GET_ID_SECTION()=>$id);


        $this->db->where($data);

        $this->db->update($TABLE, $data);

        return $q;

    }

    function __SET_NEW_CHAT($text,$id,$id_section)
    {


        $array = array( $this->chat_member_table->__GET_TEXT() => $text, $this->chat_member_table->__GET_ID_USER() => $id , $this->chat_member_table->__GET_ID_SECTION()=> $id_section);

        $this->db->insert($this->chat_member_table->__GET_TABLE(), $array);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;

    }

}