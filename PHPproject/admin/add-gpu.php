<?php
include('partials/menu.php');
include('../config/gpuDBclass.php');

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add gpu</h1>

        <br> <br>

        <?php
        if (isset($_SESSION['add'])) { //if operation add has been executed provide a message
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Enter your gpu type"></td>
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
    $title = $_POST['title'];
    $price = $_POST['price'];

    // //SQL Query
    $newgpu = new gpuDBclass();
    $res = $newgpu->addGpu($title, $price);

    //User feedback
    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>GPU Successfully Added</div>";
        header("location:" . SITEURL . 'index.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add GPU</div>";
        header("location:" . SITEURL . 'add-gpu.php');
    }
}

?>