<?php
session_start();
define('SITEURL', 'http://localhost/PHPproject/'); //Menu is used in all files, siteurl is helpful for redirections
?>
<html>

<head>
  <title> GPU Order Website - Home Page </title>
  <link rel="stylesheet" href="css/admin.css">
</head>

<body>
  <!-- Menu Section -->
  <div class="menu text-center">
    
    <div class="wrapper">
      <image src="images./logo.png"></image>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin</a></li>
        <li><a href="manage-order.php">Order</a></li>
      </ul>
    </div>
  </div>