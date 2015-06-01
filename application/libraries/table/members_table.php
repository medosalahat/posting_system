<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class members_table
{
    private $Table = 'members';

    private $id = 'id';

    private $id_section	 = 'id_section';

    private $id_user = 'id_user';

    private $type_members = 'type_members';

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function __GET_TABLE()
    {
        return $this->Table;
    }


    public function __GET_ID()
    {
        return $this->id;
    }

    public function __GET_ID_SECTION()
    {
        return $this->id_section;
    }
    public function __GET_ID_USER()
    {
        return $this->id_user;
    }


    public function __GET_TYPE_MEMBERS()
    {
        return $this->type_members;
    }


}