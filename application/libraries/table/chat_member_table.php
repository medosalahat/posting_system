<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class chat_member_table
{
    private $Table = 'chat_member';

    private $id = 'id';

    private $id_user = 'id_user';

    private $text = 'text';

    private $id_section = 'id_section';
    private $show = 'show';


    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function __GET_TABLE()
    {
        return $this->Table;
    }
    public function __GET_ID_SECTION()
    {
        return $this->id_section;
    }


    public function __GET_ID()
    {
        return $this->id;
    }

    public function __GET_ID_USER()
    {
        return $this->id_user;
    }

    public function __GET_TEXT()
    {
        return $this->text;
    }


    public function __GET_SHOW()
    {
        return $this->show;
    }
}