<?php

require_once('../config/gpuDBclass.php');
include('partials/menu.php');


//1.Get ID of admin that is to be deleted
$id = $_GET['id'];


//2.Query SQL to find and delete admin
$deletegpu = new gpuDBclass();
$res = $deletegpu->deleteGpu($id);


//3. Redirect to manage admin page with message
if ($res == true) {
  $_SESSION['delete'] = "<div class='success'>GPU Deleted Successfully</div>";
  header('location:' . SITEURL . 'index.php');
} else {
  //Redirect to manage admin page with message(success or error)
  $_SESSION['delete'] = "<div class='error'>Failed to delete gpu try again later</div>";
  header('location:' . SITEURL . 'index.php');
}
