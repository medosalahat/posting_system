<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class requirements
{
    private $Table = 'system_requirements';

    private $id = 'id';

    private $type = 'type';

    private $value = 'value';


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

    public function __GET_TYPE()
    {
        return $this->type;
    }

    public function __GET_VALUE()
    {
        return $this->value;
    }

}