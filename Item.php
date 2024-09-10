<?php 
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";

    $sql = "SELECT * FROM product_data";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
?>
<main>
    <div id="item" class="pt-2">
        <div class="container-fluid">
            <div class="row">
                <?php do {?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="items">
                        <img src="./Product/<?php echo $row["Product_Image"] ?>" alt="" class="img-fluid">
                    </div>
                    <div class="item_info">
                        <h5><?php echo $row["Name"];?></h5>
                        <p class="m-0">Prize <?php echo $row["Prize"] ?></p>
                        <p>Quality <?php echo $row["Quality"] ?></p>
                    </div>
                    <div class="item_btn">
                        <a href="Signle_Product.php?product_id=<?php echo $row["Id"] ?>">View</a>
                    </div>
                </div>
                <?php } while ($row = $result->fetch_assoc());?>
            </div>
        </div>
    </div>
</main>
<?php
    include_once "Components/Footer.php";
?>