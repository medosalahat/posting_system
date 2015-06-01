<?php
Class Get_comment_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/comment_table');
        $this->load->library('table/user_table');

    }

    public function __GET_COMMENT()
    {
        $ID=$this->comment_table->__GET_ID();

        $ID_USER=$this->comment_table->__GET_ID();

        $ID_POST=$this->comment_table->__GET_ID_POST();

        $TEXT=$this->comment_table->__GET_TEXT();

        $TABLE=$this->comment_table->__GET_TABLE();

        $ID_USER_TABLE=$this->user_table->__GET_ID_USER();
        $USERNAME=$this->user_table->__GET_USERNAME();

        $NAME=$this->user_table->__GET_NAME();

        $IMAGE=$this->user_table->__GET_IMAGE();

        $TABLE_USER=$this->user_table->__GET_TABLE();

        $QUERY = "
        $ID ,
        $ID_USER ,
         $ID_POST,
        (SELECT $NAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $NAME ,
        (SELECT $USERNAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $USERNAME ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $IMAGE ,
        $TEXT";

        $this->db->select($QUERY);


        $this->db->where($this->comment_table->__GET_DISPLAY(),0);

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }

}