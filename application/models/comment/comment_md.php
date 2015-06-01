<?php
Class Comment_md extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('table/comment_table');
        $this->load->library('table/user_table');

    }

    public function __SET_NEW_COMMENT($ID , $ID_USER , $TEXT )
    {
        $TABLE = $this->comment_table->__GET_TABLE();
        $ID_POST = $this->comment_table->__GET_ID_POST();
        $USER = $this->comment_table->__GET__ID_USER();
        $ID_TEXT = $this->comment_table->__GET_TEXT();

        $data= array(
            $ID_POST =>$ID,
            $USER =>$ID_USER,
            $ID_TEXT =>$TEXT

        );

        $this->db->insert($TABLE, $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

}