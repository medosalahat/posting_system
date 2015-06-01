<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class chat_table
{
    private $Table = 'chat';

    private $id = 'id';

    private $id_user = 'id_user';

    private $text = 'text';

    private $image = 'image';

    private $Video = 'Video';

    private $show_row = 'row';

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

    public function __GET_IMAGE()
    {
        return $this->image;
    }

    public function __GET_VIDEO()
    {
        return $this->Video;
    }

    public function __GET_SHOW()
    {
        return $this->show_row;
    }
}