<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class media_table
{
    private $Table = 'media';

    private $id = 'id';

    private $id_post = 'id_post';

    private $media_value = 'media_value';

    private $media_type = 'media_type';

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

    public function __GET_IP_POST()
    {
        return $this->id_post;
    }

    public function __GET_MEDIA_VALUE()
    {
        return $this->media_value;
    }

    public function __GET_MEDIA_TYPE()
    {
        return $this->media_type;
    }
}