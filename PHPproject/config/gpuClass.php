<?php

class gpuclass
{
    protected $id;
    protected $title;
    protected $price;
    //Simple class made of get/set that is used to import/export information from GPU table.
    public function getId()
    {
        return $this->id;
    }
    public function gettitle()
    {
        return $this->title;
    }
    public function settitle($title)
    {
        $this->title = $title;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function setprice($price)
    {
        $this->price = $price;
    }
}
