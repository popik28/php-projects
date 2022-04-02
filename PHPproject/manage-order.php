<?php include('partials\menu.php');
include('config\orderDBclass.php') ?>


<div class="main-content">
      <div class="wrapper">
            <h1>Manage Orders</h1>

            <?php  //If one of the operations: add/delete/change password happened provide message.
            if (isset($_SESSION['add'])) {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
            }
            ?>
            <!-- btn to add gpu -->
            <br /> <br />
            <a href="admin/add-order.php" class="btn-primary">Add order</a>
            <br /> <br /> <br />
            <table class="tbl-full">
                  <tr>
                        <th>S.N</th>
                        <th>GPU Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Admin Name</th>
                        <th>Supplier Name</th>
                        <th>Action</th>
                  </tr>

                  <?php //Display all gpu
                  $orderArray = array();
                  $dbOrder = new orderDBclass(); //Create connection
                  $orderArray = $dbOrder->getorder();
                  $count = count($orderArray); //Count number of rows
                  $sn = 1;

                  if ($count > 0) {
                        //we have data in data base
                        for ($i = 0; $i < $count; $i++) {
                              //For loop executes as long as we have data in DB
                              //Get individual data
                              $id = $orderArray[$i]->getId();
                              $gpu = $orderArray[$i]->getgpu();
                              $price = $orderArray[$i]->getprice();
                              $qty = $orderArray[$i]->getqty();
                              $order_date = $orderArray[$i]->getorder_date();
                              $status = $orderArray[$i]->getstatus();
                              $admin_name = $orderArray[$i]->getadmin_name();
                              $supplier_name = $orderArray[$i]->getsupplier_name();
                              //Display the values in our table
                  ?>
                              <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $gpu ?></td>
                                    <td><?php echo $price ?></td>
                                    <td><?php echo $qty ?></td>
                                    <td><?php echo $order_date ?></td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $admin_name ?></td>
                                    <td><?php echo $supplier_name ?></td>
                                    <td>
                                          <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>" class="btn-primary">Update order</a>
                                          <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id ?>" class="btn-danger">Delete order</a>
                                    </td>
                                    <td>
                                    </td>
                              </tr>


                  <?php
                        }
                  }



                  ?>
            </table>
      </div>
</div>

<?php include('partials\footer.php') ?>