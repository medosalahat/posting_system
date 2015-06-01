<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class upload_image
{
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('user/session_user');


    }

    public function GetTypeFile($index)
    {
        return $_FILES[$index]["type"];
    }

    public function GetErrorFile($index)
    {
        if ($_FILES[$index]["error"] > 0) {
            return $_FILES[$index]["error"];
        }
        return true;
    }

    public function GetNameFile($index)
    {
        return $_FILES[$index]["name"];
    }
    public function GetTempName($index)
    {
        return $_FILES[$index]["tmp_name"];
    }

    public function pathFileUpload($index)
    {
        return $this->GetPathFile().$this->RenameFile($index);
    }
    public function RenameFile($index)
    {
        $temp = explode(".",$this->GetNameFile($index));

        return md5(rand(1,99999)) . '.' .end($temp);
    }

    public function GetId()
    {
        return $this->CI->session_user->__GET_ID();
    }

    public function GetPathFile()
    {
        return "assets/image_user/";
    }

    public function move_file($index)
    {


        if($this->GetTypeFile($index)!='image/jpeg')
        {
            return 'Invalid file type';
        }
        if($this->GetErrorFile($index) != true)
        {
            return $this->GetErrorFile($index);
        }
        if (!file_exists($this->GetPathFile())) {
            mkdir($this->GetPathFile(), 0777, true);
        }

        $path = $this->pathFileUpload($index);
        if ( move_uploaded_file($this->GetTempName($index),$path)) {

            return array(
                'id'=>$this->GetId(),
                'file'=>$path
            );
        }
        return false;
    }
}
