<?php

Class Chat_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/chat_table');
        $this->load->library('table/user_table');

    }

    public function __GET_NEW_CHAT()
    {
        $ID = $this->chat_table->__GET_ID();

        $ID_USER = $this->chat_table->__GET_ID_USER();

        $TEXT = $this->chat_table->__GET_TEXT();

        $IMAGE_CHAT = $this->chat_table->__GET_IMAGE();

        $VIDEO_CHAT = $this->chat_table->__GET_VIDEO();

        $TABLE = $this->chat_table->__GET_TABLE();

        $ID_USER_TABLE = $this->user_table->__GET_ID();

        $NAME_V = $this->user_table->__GET_NAME() . "_" . $this->user_table->__GET_TABLE();

        $NAME = $this->user_table->__GET_NAME();

        $IMAGE = $this->user_table->__GET_IMAGE();

        $IMAGE_V = $this->user_table->__GET_IMAGE() . "_" . $this->user_table->__GET_TABLE();

        $TABLE_USER = $this->user_table->__GET_TABLE();

       $data = array($this->chat_table->__GET_SHOW() => 1);

         $this->db->update($TABLE, $data);



            $QUERY = "
        $ID ,
        $ID_USER ,
        (SELECT $NAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $NAME_V ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $IMAGE_V ,
        $TEXT

        ";

            $this->db->select($QUERY);

            $this->db->from($TABLE);

            return $this->db->get()->result_array();




    }



    public function __SET_NEW_CHAT($TEXT, $ID_USER, $TABLE, $CLOUMN, $CLOUMNS_USER)
    {

        $d=$this->chat_table->__GET_SHOW();

        $array = array($CLOUMN => $TEXT, $CLOUMNS_USER => $ID_USER ,$d=> '0');

        $this->db->insert($TABLE, $array);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;

    }


    private function ___DB_REAL_ESCAPE_STRING($VALUE)
    {
        return mysql_real_escape_string($VALUE);
    }

}