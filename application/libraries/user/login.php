<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class login
{
    private $CI;

    private $__ID;

    private $__DATA_LOGIN;

    private $__EMAIL;

    private $__DATA;


    private $__sub= 'Login';

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('system/life_line');

        $this->CI->load->library('system/session_system');

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/user_table');

        $this->CI->load->model('user/login_md');
    }

    public function ___SET_NEW_LOGIN_USER_AFTER_REGISTER($value)
    {

        $this->__ID = $value ;

        $this->__SET_DATA($this->CI->login_md->__GET_USER_BY_ID($this->__ID,$this->CI->user_table->__GET_TABLE()));

        if($this->__GET_DATA_IS_ARRAY())
        {

            return $this->___SET_NEW_LOGIN();

        }
        return 'login';

    }

    public function __SET_NEW_LOGIN_USER()
    {

        if ($this->__SET_PASSWORD($this->__sub."_".$this->CI->user_table->__GET_PASSWORD())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__GET_MD5(
                    $this->CI->life_line->__POST(
                        $this->__sub."_".$this->CI->user_table->__GET_PASSWORD()
                    )
                ),
                $this->CI->user_table->__GET_PASSWORD()
            );

        }

        if ($this->__SET_EMAIL($this->__sub."_".$this->CI->user_table->__GET_EMAIL())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->__sub."_".$this->CI->user_table->__GET_EMAIL()),
                $this->CI->user_table->__GET_EMAIL()
            );


        }

        $array = $this->CI->login_md->__GET_USER_BY_EMAIL_PASSWORD(
            $this->__GET_DATA_ARRAY(),
            $this->CI->user_table->__GET_TABLE()
        );




        if(is_array($array))
        {

            $this->__SET_DATA_LOGIN($array);

            $this->__ID = $this->__GET_DATA_LOGIN_BY_INDEX($this->CI->user_table->__GET_ID());

            if ($this->___SET_NEW_LOGIN_AFTER_LOGIN()) {

                return array('valid' => $this->CI->session_system->__GET_SYSTEM());
            }
            return false;

        }

        return 'Password Not Match';


    }

    public function ___SET_NEW_LOGIN()
    {

        $this->CI->session_system->__SET_SYSTEM($this->__ID);

        $this->CI->session_user->__SET_ID($this->__ID);

        $this->CI->session_user->__SET_ADMIN($this->__GET_INDEX_DATA($this->CI->user_table->__GET_IS_ADMIN()));

        $this->CI->session_user->__SET_NAME($this->__GET_INDEX_DATA($this->CI->user_table->__GET_NAME()));

        $this->CI->session_user->__SET_USERNAME($this->__GET_INDEX_DATA($this->CI->user_table->__GET_USERNAME()));

        return true;

    }

    public function ___SET_NEW_LOGIN_AFTER_LOGIN()
    {

        $this->CI->session_system->__SET_SYSTEM($this->__ID);

        $this->CI->session_user->__SET_ID($this->__ID);

        $this->CI->session_user->__SET_ADMIN($this->__GET_INDEX_DATA_LOGIN($this->CI->user_table->__GET_IS_ADMIN()));

        $this->CI->session_user->__SET_NAME($this->__GET_INDEX_DATA_LOGIN($this->CI->user_table->__GET_NAME()));

        $this->CI->session_user->__SET_USERNAME($this->__GET_INDEX_DATA_LOGIN($this->CI->user_table->__GET_USERNAME()));

        return true;

    }

    private function __GET_DATA_IS_ARRAY()
    {
        if(is_array($this->__GET_DATA())){return true ; } return false;
    }

    private function __GET_INDEX_DATA($INDEX)
    {
        return $this->__DATA[$INDEX];
    }

    private function __GET_INDEX_DATA_LOGIN($INDEX)
    {
        return $this->__DATA_LOGIN[$INDEX];
    }

    private function __SET_DATA($DATA)
    {
        $this->__DATA= $DATA ;
    }

    private function __SET_DATA_LOGIN($DATA)
    {
        $this->__DATA_LOGIN= $DATA ;
    }

    private function __GET_DATA()
    {
        return $this->__DATA;
    }

    public function __GET_EMAIL_FROM_DB()
    {

        if ($this->__SET_EMAIL($this->__sub."_".$this->CI->user_table->__GET_EMAIL())) {

            if ($this->CI->login_md->___DB_NUM_ROW(
                $this->CI->life_line->__POST($this->__sub."_".$this->CI->user_table->__GET_EMAIL()),
                $this->CI->user_table->__GET_EMAIL(),
                $this->CI->user_table->__GET_TABLE()
            )
            ) {

                return true;
            }
            return false;
        }
        return false;
    }

    private function __SET_EMAIL($EMAIL)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($EMAIL) && $this->CI->life_line->__GET_IS_SET_POST($EMAIL)) {

            $this->__EMAIL = $EMAIL;

            return true;
        }
        return false;

    }

    private function __SET_PASSWORD($PASSWORD)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($PASSWORD) && $this->CI->life_line->__GET_IS_SET_POST($PASSWORD)) {

            $this->__PASSWORD = $PASSWORD;

            return true;
        }
        return false;

    }


    private function __SET_DATA_BY_INDEX($VALUE, $INDEX)
    {
        return $this->_DATA[$INDEX] = $VALUE;
    }

    private function __GET_DATA_LOGIN_BY_INDEX($INDEX)
    {
        return $this->__DATA_LOGIN[$INDEX];
    }

    private function __GET_DATA_ARRAY()
    {
        return $this->_DATA;
    }



    private function __GET_DATA_LOGINE_ARRAY()
    {

        return $this->__DATA_LOGIN;
    }

}