<?php include('partials/menu.php');
include('../config/orderDBclass.php')

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update order</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id']; //Get admin id from previous page

        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>gpu: </td>
                    <td><input type="text" name="gpu" placeholder="Enter your gpu type"></td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price" placeholder="Enter your Price">
                    </td>
                </tr>
                <tr>
                    <td>qty: </td>
                    <td><input type="text" name="qty" placeholder="Enter your gpu qty"></td>
                </tr>
                <tr>
                    <td>status: </td>
                    <td><input type="text" name="status" placeholder="Enter supplier_name"></td>
                </tr>
                <tr>
                    <td>
                        admin_name:
                    </td>
                    <td>
                        <input type="name" name="admin_name" placeholder="Enter admin_name">
                    </td>
                </tr>
                <tr>
                    <td>supplier_name: </td>
                    <td><input type="text" name="supplier_name" placeholder="Enter supplier_name"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add gpu" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>


    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    //Button Clicked
    $gpu = $_POST['gpu'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $status = $_POST['status'];
    $admin_name = $_POST['admin_name'];
    $supplier_name  = $_POST['supplier_name'];


    //Execute the Query
    $updateOrder = new orderDBclass();
    $res2 = $updateOrder->updateOrder($id, $gpu, $price, $qty, $status, $admin_name, $supplier_name);

    //And Redirect to Manage Order with Message
    if ($res2 == true) {
        //Updated
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        header('location:' . SITEURL . 'manage-order.php');
    } else {
        //Failed to Update
        $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
        header('location:' . SITEURL . 'manage-order.php');
    }
}
?>
<?php include('partials/footer.php'); ?>