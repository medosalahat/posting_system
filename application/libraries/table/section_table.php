<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class section_table
{
    private $Table = 'section';

    private $id = 'id';

    private $title	 = 'title';

    private $id_college = 'id_college';

    private $id_specialty = 'id_specialty';

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
    public function __GET_ID_COLLEGE()
    {
        return $this->id_college;
    }


    public function __GET_ID_SPECIALTY()
    {
        return $this->id_specialty;
    }


}