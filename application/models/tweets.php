<?php

Class Tweets extends CI_Model
{
    public function newTweets($data)
    {
        $id_str=mysql_real_escape_string($data['id_str']);
        $created_at=mysql_real_escape_string( $data['created_at']);
        $text=mysql_real_escape_string( $data['text']);
        $link=mysql_real_escape_string( $data['link']);
        $title=mysql_real_escape_string( $data['title']);
        $retweet_count=mysql_real_escape_string( $data['retweet_count']);
        $favorite_count=mysql_real_escape_string( $data['favorite_count']);
        $reply_count=mysql_real_escape_string( $data['reply_count']);
        $click_count=mysql_real_escape_string( $data['click_count']);

        $sql="INSERT INTO
             tweets(id_str,created_at,text,link,title,retweet_count,favorite_count,reply_count,click_count,date_in)
               VALUES ('$id_str','$created_at ','$text',
               '$link','$title','$retweet_count','$favorite_count','$reply_count','$click_count',CURRENT_TIMESTAMP)";
        return $this->insertNewRow_id($sql);
    }
    public function getTweetsById($id)
    {

       // echo $id;

        $sql="select count(id) s from tweets where id_str=$id";

       $s= $this->db->query($sql)->result_array();

        if(($s[0]['s']))
        {
          return  false;
        }
        else
        {
            return true;
        }

       // return 0;

    }

    public  function show()
    {
        $toda=date('Y-m-d');
        $sql="select *  from tweets ORDER by id asc";

        return $this->db->query($sql)->result_array();
    }
    private function insertNewRow_id($sql)
    {

        if ($this->db->query($sql)) {


            return $this->db->insert_id();

        } else {
            return false;
        }
    }





}