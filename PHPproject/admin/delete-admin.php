<?php

include('../config/adminDBclass.php');
include('partials/menu.php');

//1. Get ID of admin that is to be deleted
$id = $_GET['id'];

//2.Query SQL to find and delete admin
$deleteAdmin = new adminDBclass();
$res = $deleteAdmin->deleteAdmin($id);

//3.Redirect to manage admin page with message
if ($res == true) {
  $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
  header('location:' . SITEURL . 'manage-admin.php');
} else {
  //Redirect to manage admin page with message(success or error)
  $_SESSION['delete'] = "<div class='error'>Failed to delete admin try again later</div>";
  header('location:' . SITEURL . 'manage-admin.php');
}
