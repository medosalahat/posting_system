<?php
Class Post_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/post_table');
        $this->load->library('table/user_table');

    }

    public function __GET_NEWS()
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
    public function __GET_NEWS_ME($id)
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
        $this->db->where($ID_USER,$id);

        $this->db->order_by($ID, "desc");

        $this->db->from($TABLE);

        return $this->db->get()->result_array();


    }

    public function __IS_EXIST_THIS_ID($ID , $CLOMNS , $TABLE)
    {

        $this->db->select($CLOMNS);

        $this->db->where($CLOMNS,$this->___DB_REAL_ESCAPE_STRING($ID));

        $this->db->from($TABLE);

        $query=$this->db->get();

        if ($query->num_rows() > 0) {

            return true;
        }

        return false;


    }

    function add_post($id,$post)
    {
        $this->load->library('system/session_system');
        $this->load->library('table/post_table');

        $data=array(
            $this->post_table->__GET_ID_USER() =>$id,
            $this->post_table->__GET_TEXT()=>$post,
            $this->post_table->__GET_DATE_TIME()=>$this->session_system->___GET_DATETIME(),
        );
        $table=$this->post_table->__GET_TABLE();
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