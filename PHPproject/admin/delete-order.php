<?php

require_once('../config/orderDBclass.php');
include('partials/menu.php');


//1. Get ID of admin that is to be deleted
$id = $_GET['id'];

//2.Query SQL to find and delete admin
$deleteorder = new orderDBclass();
$res = $deleteorder->deleteOrder($id);

//3. Redirect to manage admin page with message
if ($res == true) {
  $_SESSION['delete'] = "<div class='success'>order Deleted Successfully</div>";
  header('location:' . SITEURL . 'manage-order.php');
} else {
  //redirect to mange admin page with message(success or error)
  $_SESSION['delete'] = "<div class='error'>Failed to delete order try again later</div>";
  header('location:' . SITEURL . 'manage-order.php');
}
