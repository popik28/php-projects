<?php
include('partials/menu.php');
include('../config/orderDBclass.php');

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add gpu</h1>

        <br> <br>
        <?php
        if (isset($_SESSION['add'])) {
            //if operation add has been executed provide a message
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>gpu: </td>
                    <td><input type="text" name="gpu" placeholder="Enter your GPU type"></td>
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
                    <td><input type="text" name="qty" placeholder="Enter your GPU quantity"></td>
                </tr>
                <tr>
                    <td>
                        admin_name:
                    </td>
                    <td>
                        <input type="name" name="admin_name" placeholder="Enter admin name">
                    </td>
                </tr>
                <tr>
                    <td>supplier_name: </td>
                    <td><input type="text" name="supplier_name" placeholder="Enter supplier name"></td>
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

<?php include('partials/footer.php') ?>


<?php
//Process information, check submit has been clicked
if (isset($_POST['submit'])) {
    //Button Clicked
    $gpu = $_POST['gpu'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $order_date = date("Y-m-d h:i:sa"); //order date
    $status = 'inTransit';
    $admin_name = $_POST['admin_name'];
    $supplier_name  = $_POST['supplier_name']; //Define parameters entered from user.

    //SQL Query
    $addAdmin = new orderDBclass();
    $res = $addAdmin->addOrder($gpu, $price, $qty, $order_date, $status, $admin_name, $supplier_name);

    //User feedback
    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>Order Successfully Added</div>";
        header("location:" . SITEURL . 'manage-order.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add order</div>";
        header("location:" . SITEURL . 'manage-order.php');
    }
}

?>