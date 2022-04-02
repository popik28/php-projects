<?php
//46\3
//Ariel Cohen
//German Baronez
include('partials/menu.php');
include('config/gpuDBclass.php');
?>
<!--Main Content-->
<div class="main-content">
  <div class="wrapper">
    <h1>Current Stock</h1>
    <br />
    <!-- btn to add gpu -->
    <br /> <br />
    <a href="admin/add-gpu.php" class="btn-primary">Add GPU</a>
    <!--Add buttons for future functionality -->
    <a href="admin/print-gpu.php" class="btn-primary">Print Report</a>

    <br /> <br /> <br />

    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
      <?php
      //if one of the operations: add/delete/print report has been executed provide a message
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }
      if (isset($_SESSION['report'])) {
        echo $_SESSION['report'];
        unset($_SESSION['report']);
      }
      ?>
      <?php //Display all GPU
      $gpuArray = array();
      $dbgpu = new gpuDBclass();
      $gpuArray = $dbgpu->getgpu(); //Create connection
      $count = count($gpuArray); //Count number of rows
      $sn = 1;

      if ($count > 0) {
        //Data found
        for ($i = 0; $i < $count; $i++) {
          $id = $gpuArray[$i]->getId();
          $title = $gpuArray[$i]->gettitle();
          $price = $gpuArray[$i]->getprice();

      ?>
          <tr>
            <td><?php echo $sn++ ?></td>
            <td><?php echo $title ?></td>
            <td><?php echo $price ?></td>
            <td>
              <a href="<?php echo SITEURL; ?>admin/delete-gpu.php?id=<?php echo $id ?>" class="btn-danger">Delete GPU</a>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </table>
    <div class="clearfix"></div>

  </div>
</div>


<?php include('partials/footer.php')  ?>