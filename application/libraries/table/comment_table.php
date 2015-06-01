<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class comment_table
{
    private $Table = 'comment';

    private $id = 'id';

    private $id_post = 'id_post';

    private $id_user = 'id_user';

    private $text = 'text';

        private $display = 'display';

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

    public function __GET_ID_POST()
    {
        return $this->id_post;
    }

    public function __GET__ID_USER()
    {
        return $this->id_user;
    }

    public function __GET_TEXT()
    {
        return $this->text;
    }

    public function __GET_DISPLAY()
    {
        return $this->display;
    }
}