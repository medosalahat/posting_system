<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class contact_us_table
{
    private $Table = 'contact_us';

    private $id = 'id';

    private $name = 'name';

    private $mobile = 'mobile';

    private $email = 'email';

    private $message = 'message';
    private $ip = 'ip';

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

    public function __GET_NAME()
    {
        return $this->name;
    }

    public function __GET_MOBILE()
    {
        return $this->mobile;
    }

    public function __GET_EMAIL()
    {
        return $this->email;
    }

    public function __GET_MESSAGE()
    {
        return $this->message;
    }
    public function __GET_IP()
    {
        return $this->ip;
    }
}