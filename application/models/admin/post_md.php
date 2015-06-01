<?php
Class Post_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/post_table');

    }

    public function __GET_DB()
    {

        $ID=$this->post_table->__GET_ID();

        $ID_USER=$this->post_table->__GET_ID_USER();

        $TEXT=$this->post_table->__GET_TEXT();

        $MEDIA_ID=$this->post_table->__GET_MEDIA_ID();

        $TABLE=$this->post_table->__GET_TABLE();

        $DATE_TIME=$this->post_table->__GET_DATE_TIME();

        $ID_USER_TABLE=$this->user_table->__GET_ID();

        $NAME=$this->user_table->__GET_NAME();

        $IMAGE=$this->user_table->__GET_IMAGE();

        $TABLE_USER=$this->user_table->__GET_TABLE();

        $QUERY = "
        $ID ,
        $ID_USER ,
        (SELECT $NAME from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $NAME ,
        (SELECT $IMAGE from $TABLE_USER WHERE $ID_USER_TABLE =  $ID_USER) $IMAGE ,
        $TEXT ,
        $MEDIA_ID,
        $DATE_TIME

        ";

        $this->db->select($QUERY);

        $this->db->order_by($ID, "desc");

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }

    public function __REOMVE($id,$id_cloumns,$table)
    {
        $sql="DELETE FROM $table WHERE $id_cloumns=$id";

        //return $sql;

        return $this->DeleteSql($sql);


    }
    function DeleteSql($sql){IF($this->db->query($sql)){return true;}else{return false;}}


}