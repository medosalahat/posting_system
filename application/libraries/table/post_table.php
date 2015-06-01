<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class post_table
{
    private $Table = 'post';

    private $id = 'id';

    private $id_user = 'id_user';

    private $text = 'text';

    private $media_id = 'media_id';

    private $time_post = 'time_post';

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

    public function __GET_ID_USER()
    {
        return $this->id_user;
    }

    public function __GET_TEXT()
    {
        return $this->text;
    }

    public function __GET_MEDIA_ID()
    {
        return $this->media_id;
    }
    public function __GET_DATE_TIME()
    {
        return $this->time_post;
    }
}