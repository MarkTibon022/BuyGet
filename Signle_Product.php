<?php 
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";
    $success = null;

    $product_id = $_GET["product_id"];
    $sql = "SELECT * FROM product_data WHERE Id = '$product_id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST["addtobad"])) {
        
        $imageitem = $_POST["imageitem"];
        $sname = $_POST["sname"];
        $sprize = $_POST["sprize"];
        $squality = $_POST["squality"];
        $ssize = $_POST["ssize"];

        $sql = "INSERT INTO `cart_data`(`Image_Item`, `Name`, `Prize`, `Size`, `Quality`) VALUES ('$imageitem','$sname','$sprize','$squality','$ssize')";
        $con->query($sql);
        $success = "Success Add to Bag";
        header("location: Item.php");
    }
?>
<main>
    <div id="signle_product" class="pt-3">
        <div class="container-lg">
            <?php if (isset($success)) {?>
            <div class="success">
                <p><?php echo $success ?></p>
            </div>
            <?php } else {};?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="image_product">
                        <img src="./Product/<?php echo $row["Product_Image"] ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product_info">
                        <h2><?php echo $row["Name"] ?></h2>
                        <h4>₱<?php echo $row["Prize"] ?></h4>
                        <form action="" method="post">
                            <div class="single_select">
                                <select name="squality">
                                    <option value="US7">US 7</option>
                                    <option value="US 7.5">US 7.5</option>
                                    <option value="US 8">US 8</option>
                                    <option value="US 8.5">US 8.5</option>
                                    <option value="US 9">US 9</option>
                                    <option value="US 9.5">US 9.5</option>
                                    <option value="US 10">US 10</option>
                                    <option value="US 10.5">US 10.5</option>
                                    <option value="US 11">US 11</option>
                                    <option value="US 11.5">US 11.5</option>
                                    <option value="US 12">US 12</option>
                                    <option value="US 12.5">US 12.5</option>
                                    <option value="US 13">US 13</option>
                                    <option value="US 13.5">US 13.5</option>
                                </select>
                            </div>
                            <div class="single_select">
                                <select name="ssize">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <input type="hidden" value="<?php echo $row["Product_Image"] ?>" name="imageitem">
                            <input type="hidden" value="<?php echo $row["Name"] ?>" name="sname">
                            <input type="hidden" value="<?php echo $row["Prize"] ?>" name="sprize">
                            <div class="single_btn">
                                <a href="#" name="addtobad"><i class="bi bi-cart me-2"></i>BUY</a>
                            </div>
                            <div class="single_btn">
                                <button type="submit" name="addtobad"><i class="bi bi-bag me-2"></i>ADD TO BAG</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include_once "Components/Footer.php";
?>