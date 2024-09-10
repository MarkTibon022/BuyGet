<?php 
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";

    $error_empty = null;
    $error_allow = null;
    $error_large = null;
    $error_move = null;

    if (isset($_POST["add"])) {
        $pimage = $_FILES["pimage"]["name"];
        $pname = $_POST["pname"];
        $pprize = $_POST["pprize"];
        $pqualty = $_POST["pquality"];

        $pimage_ext = pathinfo($pimage, PATHINFO_EXTENSION);
        $pimage_allow = array("jpg", "jpeg", "png");
        $pimage = $_FILES["pimage"]["name"];
        $pimage_tmp_name = $_FILES["pimage"]["tmp_name"];
        $pimage_size = $_FILES["pimage"]["size"];

        if (!file_exists($pimage_tmp_name)) {
            $error_empty = "empty image product";
        } else if (!in_array($pimage_ext, $pimage_allow)) {
            $error_allow = "sorry allowed JPG, JPEG, PNG";
        } else if ($pimage_size > 2000000) {
            $error_large = "sorry maximuin is 2mb";
        } else {
            $location_image = "./Product/" .basename($pimage);
            if (move_uploaded_file($pimage_tmp_name, $location_image)) {

                $sql = "INSERT INTO `product_data`(`Product_Image`, `Name`, `Prize`, `Quality`) VALUES ('$pimage','$pname','$pprize','$pqualty')";
                $con->query($sql) or die ($con->error);
                header("location: Item.php");
            } else {
                $error_move = "system error";
            }
        }

    }
?>
<main>
    <div id="sale">
        <div class="container-fluid">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form_sale_photo">
                    <label for="pimage">Upload Image Product</label>
                    <input type="file" id="pimage" name="pimage">
                </div>
                <div class="form_sale_input">
                    <input type="text" placeholder="Name Product" name="pname">
                </div>
                <div class="form_sale_input">
                    <input type="text" placeholder="Prize" name="pprize">
                </div>
                <div class="form_sale_input">
                    <input type="text" placeholder="Quality" name="pquality">
                </div>
                <div class="form_sale_btn">
                    <a href="Index.php">Cancel</a>
                    <button type="submit" name="add">Add Product</button>
                </div>
                <div class="error">
                    <p> <?php echo $error_empty?></p>
                </div>
                <div class="error">
                    <p> <?php echo $error_allow?></p>
                </div>
                <div class="error">
                    <p> <?php echo $error_large?></p>
                </div>
                <div class="error">
                    <p> <?php echo $error_move?></p>
                </div>
            </form>
        </div>
    </div>
</main>
<?php 
    include_once "Components/Footer.php"
?>