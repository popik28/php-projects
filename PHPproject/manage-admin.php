<?php include('partials/menu.php');
include('config/adminDBclass.php') ?>

<!-- Menu Section -->

<!--Main Content-->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Admin</h1>

    <?php //If one of the operations: add/delete/change password happened provide message.
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if (isset($_SESSION['change-pwd'])) {
      echo $_SESSION['change-pwd'];
      unset($_SESSION['change-pwd']);
    }
    ?>



    <!-- btn to add admin -->
    <br /> <br />
    <a href="admin/add-admin.php" class="btn-primary">Add Admin</a>
    <br /> <br /> <br />

    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <?php //Display all admins
      $adminArray = array();
      $dbAdmins = new adminDBclass(); //Create connection
      $adminArray = $dbAdmins->getAdmins();
      $count = count($adminArray); //Count number of rows
      $sn = 1;

      if ($count > 0) {
        //Data found
        for ($i = 0; $i < $count; $i++) {
          $id = $adminArray[$i]->getId(); //Get data of each object from array
          $fullname = $adminArray[$i]->getfullname();
          $username = $adminArray[$i]->getusername();
      ?>
          <tr>
            <td><?php echo $sn++ ?></td>
            <td><?php echo $fullname ?></td>
            <td><?php echo $username ?></td>
            <td>
              <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
              <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </table>
  </div>
</div>
<?php include('partials/footer.php')  ?>