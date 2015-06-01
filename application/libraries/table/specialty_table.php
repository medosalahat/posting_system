<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class specialty_table
{
    private $Table = 'specialty';

    private $id = 'id';

    private $id_college  = 'id_college';

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

    public function __GET_ID_COLLEGE()
    {
        return $this->id_college;

    }

    public function __GET_TEXT()
    {
        return $this->text;
    }


}