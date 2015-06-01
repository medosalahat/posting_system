<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class college_table
{
    private $Table = 'college';

    private $id = 'id';

    private $text = 'text';



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

    public function __GET_TEXT()
    {
        return $this->text;
    }


}