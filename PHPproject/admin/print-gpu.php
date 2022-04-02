<?php
include('partials/menu.php');
include('../config/gpuDBclass.php');

//Create connection and get gpu table
$gpuArray = array();
$dbGPUs = new gpuDBclass();
$gpuArray = $dbGPUs->getgpu();
$str = "";

for ($i = 0; $i < count($gpuArray); $i++) {
  $id = $gpuArray[$i]->getId();
  $title = $gpuArray[$i]->gettitle();
  $price = $gpuArray[$i]->getprice();

  $str .= $id . ' ' . $title . ' ' . $price . "\n";
} //Create a long string variable table information

file_put_contents("report.txt", $str);
//Input string variable to a file
$_SESSION['report'] = "<div class='success'>Report Successfully Printed!</div>";
header('location:' . SITEURL . 'index.php');
