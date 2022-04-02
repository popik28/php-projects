<?php
require_once("gpuClass.php");
require_once("dbClass.php");

class gpuDBclass
{
  public function getgpu()
  { //Function aquires all database GPUs and returns it in an array.
    $db = new dbClass;
    $db->connect(); //Create connection to DB
    $gpuarray = array();
    $result = $db->connection->query("SELECT * FROM tbl_gpu");
    while ($row = $result->fetchObject('gpuClass')) {
      $gpuarray[] = $row; //Insert each row from the database to an object array
    }
    $db->disconnect();
    return $gpuarray;
  }

  public function addGpu($title, $price)
  { //Adds a GPU to the gpu table in DB
    $db = new dbClass;
    $db->connect();
    //Uses title and price to add a new GPU to the table
    $result = $db->connection->query("INSERT INTO tbl_gpu SET
      title='$title',
      price='$price'
      ");

    $db->disconnect();
    return $result;
  }

  public function deleteGpu($id)
  { //Uses ID provided as parameter, finds ID in DB and deletes that occurance of ID. 
    $db = new dbClass;
    $db->connect();

    $result = $db->connection->query("DELETE FROM tbl_gpu WHERE id=$id");

    $db->disconnect();
    return $result;
  }
}
