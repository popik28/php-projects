<?php include('partials/menu.php');
include('../config/adminDBclass.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id']; //Get admin id from previous page
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">

                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">

                    </td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    //Submitted
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //SQL Query
    $updatePass = new adminDBclass();
    $res = $updatePass->updatePass($id, $current_password, $new_password, $confirm_password);

    $_SESSION['change-pwd'] = $res; //Save res in variable to provide message with context about sucess/failure of operation
    if ($res == true)
        header('location:' . SITEURL . 'manage-admin.php');
}


?>

<?php include('partials/footer.php'); ?>