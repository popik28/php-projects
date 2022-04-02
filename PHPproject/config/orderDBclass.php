<?php
require_once("orderClass.php");
require_once("dbClass.php");

class orderDBclass
{ //Simple class made of get/set that is used to import/export information from GPU table.

  public function getorder()
  { //Gets order array from DB.
    $db = new dbClass;
    $db->connect();
    $adminsArray = array();
    $result = $db->connection->query("SELECT * FROM tbl_order");
    while ($row = $result->fetchObject('orderClass')) {
      $adminsArray[] = $row; //Insert each row from the database to an object array
    }
    $db->disconnect();
    return $adminsArray;
  }

  public function addOrder($gpu, $price, $qty, $order_date, $status, $admin_name, $supplier_name)
  { //Adds order with recieved parameters
    $db = new dbClass;
    $db->connect();
    $sql = "INSERT INTO tbl_order SET
        gpu='$gpu',
        price='$price',
        qty='$qty',
        order_date='$order_date',
        status='$status',
        admin_name='$admin_name',
        supplier_name='$supplier_name'
        ";

    $result = $db->connection->query($sql);
    $db->disconnect();
    return $result;
  }

  public function deleteOrder($id)
  {
    $db = new dbClass; //Finds and deletes an order using id provided as a parameter
    $db->connect();
    $result = $db->connection->query("DELETE FROM tbl_order WHERE id=$id");
    $db->disconnect();
    return $result;
  }

  public function updateOrder($id, $gpu, $price, $qty, $status, $admin_name, $supplier_name)
  { //Finds order using id and updates order according to parameters provided.
    $db = new dbClass;
    $db->connect();
    $sql = "UPDATE tbl_order SET 
    gpu='$gpu',
    price='$price',
    qty='$qty',
    status='$status',
    admin_name='$admin_name',
    supplier_name='$supplier_name'
    WHERE id=$id
    ";

    $result = $db->connection->query($sql);
    $db->disconnect();
    return $result;
  }
}
