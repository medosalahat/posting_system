<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_table
{
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
    public function __GET_NAME()
    {
        return $this->name;
    }
    public function __GET_USERNAME()
    {
        return $this->username;
    }
    public function __GET_EMAIL()
    {
        return $this->email;
    }
    public function __GET_PASSWORD()
    {
        return $this->password;
    }
    public function __GET_PASSWORD_CONFIRMATION()
    {
        return $this->password_confirmation;
    }
    public function __GET_GENDER()
    {
        return $this->gender;
    }
    public function __GET_BIRTHDAY()
    {
        return $this->birthday;
    }
    public function __GET_MOBILE()
    {
        return $this->mobile;
    }
    public function __GET_IMAGE()
    {
        return $this->image;
    }
    public function __GET_IS_ADMIN()
    {
        return $this->isadmin;
    }
    public function __GET_COLLEGE()
    {
        return $this->college;
    }
    public function __GET_SPECIALTY()
    {
        return $this->specialty;
    }
    public function __GET_STATUS()
    {
        return $this->status;
    }
    public function __GET_LAST_IP()
    {
        return $this->last_ip;
    }
    public function __GET_LEVEL()
    {
        return $this->level;
    }

    public function __TABLE_USER_ALL()
    {

        return array(
            $this->__GET_ID(), // 0
            $this->__GET_NAME(),// 1
            $this->__GET_USERNAME(),// 2
            $this->__GET_EMAIL(),// 3
            $this->__GET_GENDER(),// 4
            $this->__GET_BIRTHDAY(),// 5
            $this->__GET_MOBILE(),// 6
            $this->__GET_IMAGE(),// 7
            $this->__GET_IS_ADMIN(),// 8
            $this->__GET_STATUS(),// 9
            $this->__GET_LAST_IP()// 10
        );


    }

    private $Table = 'user';

    private $id = 'id';

    private $id_user = 'id_user';

    private $name = 'name';

    private $username = 'username';

    private $email = 'email';

    private $password = 'password';

    private $password_confirmation = 'password_confirmation';

    private $gender = 'gender';

    private $birthday = 'birthday';

    private $college = 'college';

    private $specialty = 'specialty';

    private $mobile = 'mobile';

    private $image = 'image';

    private $isadmin = 'isadmin';

    private $status = 'status';

    private $last_ip = 'last_ip';
    private $level = 'level';


}