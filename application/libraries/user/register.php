<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class register
{
    private $CI;

    private $__NAME;

    private $__USERNAME;

    private $__EMAIL;

    private $__PASSWORD;

    private $__GENDER;

    private $__BIRTHDAY;

    private $__MOBILE;

    private $__IMAGE;

    private $__IP;

    private $_DATA;

    private $__Validator;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');

        $this->CI->load->library('system/life_line');

        $this->CI->load->library('user/session_user');

        $this->CI->load->library('table/user_table');

        $this->CI->load->model('user/register_md');
    }

    public function __SET_NEW_USER_LIB()
    {
        if ($this->CI->life_line->__POST('t_and_c') != 1) {

            return false;
        }

        if ($this->__SET_NAME($this->CI->user_table->__GET_NAME())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_NAME()),
                $this->CI->user_table->__GET_NAME()
            );
        }

        if ($this->__SET_EMAIL($this->CI->user_table->__GET_EMAIL())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_EMAIL()),
                $this->CI->user_table->__GET_EMAIL()
            );
        }

        if ($this->__SET_USERNAME($this->CI->user_table->__GET_USERNAME())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_USERNAME()),
                $this->CI->user_table->__GET_USERNAME()
            );
        }

        if ($this->__SET_BIRTHDAY($this->CI->user_table->__GET_BIRTHDAY())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_BIRTHDAY()),
                $this->CI->user_table->__GET_BIRTHDAY()
            );
        }

        if ($this->__SET_MOBILE($this->CI->user_table->__GET_MOBILE())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_MOBILE()),
                $this->CI->user_table->__GET_MOBILE()
            );
        }

        if ($this->__SET_PASSWORD($this->CI->user_table->__GET_PASSWORD())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__GET_MD5(
                    $this->CI->life_line->__POST(
                        $this->CI->user_table->__GET_PASSWORD()
                    )
                ),
                $this->CI->user_table->__GET_PASSWORD()
            );
        }

        if ($this->__SET_GENDER($this->CI->user_table->__GET_GENDER())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_GENDER()),
                $this->CI->user_table->__GET_GENDER()
            );
        }

        if ($this->__SET_IP($this->CI->session_user->__GET_IP_USER())) {
            $this->__SET_DATA_BY_INDEX(
                $this->__GET_IP(),
                $this->CI->user_table->__GET_LAST_IP()
            );
        }

        if ($this->__SET_PASSWORD_CONFIRMATION($this->CI->user_table->__GET_PASSWORD_CONFIRMATION())) {
            $this->__SET_DATA_BY_INDEX(
                $this->CI->life_line->__GET_MD5(
                    $this->CI->life_line->__POST(
                        $this->CI->user_table->__GET_PASSWORD_CONFIRMATION()
                    )
                ),
                $this->CI->user_table->__GET_PASSWORD_CONFIRMATION()
            );
        }

        $this->__SET_DATA_BY_INDEX(
            $this->CI->life_line->__POST('college'),
            'college'
        );
        $this->__SET_DATA_BY_INDEX(
            $this->CI->life_line->__POST('specialty'),
            'specialty'
        );


        if ($this->__CONFIRMA_USERNAME_EMAIL()) {
            if ($this->__CONFIRMA_PASSWORD()) {
                $this->__REMOVE_INDEX_IN_ARRAY($this->CI->user_table->__GET_PASSWORD_CONFIRMATION());
                if ($this->__REGISTER_NEW_USER()) {
                    return array(
                        'valid' => true,
                        $this->CI->user_table->__GET_ID() => $this->__GET_VALIDATOR()
                    );
                }
                return false;
            }
            return 'password';
        }
        return 'Email_or_username';

    }

    private function __CONFIRMA_PASSWORD()
    {
        if (
            $this->__GET_DATA_BY_INDEX($this->CI->user_table->__GET_PASSWORD())
            ==
            $this->__GET_DATA_BY_INDEX($this->CI->user_table->__GET_PASSWORD_CONFIRMATION())
        ) {
            return true;
        }

        return false;

    }

    private function __CONFIRMA_USERNAME_EMAIL()
    {
        IF ($this->__GET_USERNAME_FROM_DB() && $this->__GET_EMAIL_FROM_DB()) {
            return true;
        }
        return false;
    }

    private function __REGISTER_NEW_USER()
    {

        $this->__SET_VALIDATOR(
            $this->CI->register_md->__DB_REGISTER_NEW_USER(
                $this->__GET_DATA_ARRAY(),
                $this->CI->user_table->__GET_TABLE()
            ));

        return $this->__GET_VALIDATOR();

    }

    public function __GET_USERNAME_FROM_DB()
    {

        if ($this->__SET_USERNAME($this->CI->user_table->__GET_USERNAME())) {

            if ($this->CI->register_md->___DB_NUM_ROW(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_USERNAME()),
                $this->CI->user_table->__GET_USERNAME(),
                $this->CI->user_table->__GET_TABLE()
            )
            ) {

                return true;
            }
            return false;
        }
        return false;
    }

    public function __GET_EMAIL_FROM_DB()
    {

        if ($this->__SET_EMAIL($this->CI->user_table->__GET_EMAIL())) {

            if ($this->CI->register_md->___DB_NUM_ROW(
                $this->CI->life_line->__POST($this->CI->user_table->__GET_EMAIL()),
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

    private function __SET_DATA_BY_INDEX($VALUE, $INDEX)
    {
        $this->_DATA[$INDEX] = $VALUE;
    }

    private function __GET_DATA_ARRAY()
    {

        return $this->_DATA;
    }

    private function __SET_NAME($NAME)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($NAME) && $this->CI->life_line->__GET_IS_SET_POST($NAME)) {
            $this->__NAME = $NAME;

            return true;
        }

        return false;

    }

    private function __SET_USERNAME($USERNAME)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($USERNAME) && $this->CI->life_line->__GET_IS_SET_POST($USERNAME)) {

            $this->__USERNAME = $USERNAME;

            return true;
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

    private function __SET_PASSWORD_CONFIRMATION($PASSWORD_CONFIRMATION)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($PASSWORD_CONFIRMATION) && $this->CI->life_line->__GET_IS_SET_POST($PASSWORD_CONFIRMATION)) {

            $this->__PASSWORD = $PASSWORD_CONFIRMATION;

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

    private function __SET_GENDER($GENDER)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($GENDER) && $this->CI->life_line->__GET_IS_SET_POST($GENDER)) {

            $this->__GENDER = $GENDER;

            return true;
        }

        return false;

    }

    private function __SET_BIRTHDAY($BIRTHDAY)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($BIRTHDAY) && $this->CI->life_line->__GET_IS_SET_POST($BIRTHDAY)) {

            $this->__BIRTHDAY = $BIRTHDAY;

            return true;
        }
        return false;

    }

    private function __SET_MOBILE($MOBILE)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($MOBILE) && $this->CI->life_line->__GET_IS_SET_POST($MOBILE)) {

            $this->__MOBILE = $MOBILE;

            return true;
        }
        return false;

    }

    private function __SET_IMAGE($IMAGE)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($IMAGE) && $this->CI->life_line->__GET_IS_SET_POST($IMAGE)) {

            $this->__IMAGE = $IMAGE;

            return true;
        }

        return false;

    }

    private function __SET_IP($IP)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($IP)) {

            $this->__IP = $IP;
            return true;
        }

        return false;


    }

    private function __GET_IP()
    {

        return $this->__IP;
    }

    private function __SET_VALIDATOR($VALIDATOR)
    {

        if ($this->CI->life_line->__GET_IS_EMPTY($VALIDATOR)) {

            $this->__Validator = $VALIDATOR;

            return true;
        }

        return false;
    }

    private function __GET_VALIDATOR()
    {

        return $this->__Validator;
    }

    private function __GET_DATA_BY_INDEX($INDEX)
    {
        return $this->_DATA[$INDEX];
    }

    private function __REMOVE_INDEX_IN_ARRAY($INDEX)
    {

        unset($this->_DATA[$INDEX]);

        return true;
    }


}