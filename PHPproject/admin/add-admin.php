<?php
include('partials/menu.php');
include('../config/adminDBclass.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br> <br>

        <?php
        //if operation add has been executed provide a message
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="fullname" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
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
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Encryption

    //Query Execution
    $addAdmin = new adminDBclass(); //Create object used to operate admin table
    $res = $addAdmin->addadmin($fullname, $username, $password);


    //User feedback
    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>Admin Successfully Added</div>";
        header("location:" . SITEURL . 'manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}

?>