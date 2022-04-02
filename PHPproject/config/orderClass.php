<?php

class orderClass
{
    protected $id;
    protected $gpu;
    protected $price;
    protected $qty;
    protected $order_date;
    protected $status;
    protected $admin_name;
    protected $supplier_name;
    //Simple class made of get/set that is used to import/export information from GPU table.

    public function getId()
    {
        return $this->id;
    }
    public function getgpu()
    {
        return $this->gpu;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getqty()
    {
        return $this->qty;
    }
    public function getorder_date()
    {
        return $this->order_date;
    }
    public function getstatus()
    {
        return $this->status;
    }
    public function getadmin_name()
    {
        return $this->admin_name;
    }
    public function getsupplier_name()
    {
        return $this->supplier_name;
    }
}
