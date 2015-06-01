<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class slider_table
{
    private $Table = 'slider_site';

    private $id = 'id';

    private $title = 'title';

    private $text = 'text';

    private $image = 'image';

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

    public function __GET_TITLE()
    {
        return $this->title;
    }

    public function __GET_TEXT()
    {
        return $this->text;
    }

    public function __GET_IMAGE()
    {
        return $this->image;
    }

    public function __GET_DISPLAY()
    {
        return $this->display;
    }

}