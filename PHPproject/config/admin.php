<?php

class admin
{
    protected $id;
    protected $fullname;
    protected $username;
    protected $password;
    //Class is consisted of general get/set methods
    public function getId()
    {
        return $this->id;
    }

    public function getfullname()
    {
        return $this->fullname;
    }

    public function setfullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getusername()
    {
        return $this->username;
    }


    public function setusername($username)
    {
        $this->fullname = $username;
    }


    public function getpassword()
    {
        return $this->password;
    }


    public function setpassword($password)
    {
        $this->password = md5($password);
    }
}
