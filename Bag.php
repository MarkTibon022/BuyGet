<?php
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";

    $sql = "SELECT * FROM cart_data";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
?>
<main>
    <div id="cart">
        <div class="container-lg">
            <div class="account_nav">
                <div class="d-flex justify-content-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="Account_Settings.php?id_email=<?php echo $_SESSION["email_id"];?>"
                                class="nav-link">Account Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Your Order</a>
                        </li>
                        <li class="nav-item">
                            <a href="Bag.php" class="nav-link">Your Bag</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php do {?>
            <div class="cont_item">
                <div class="cart_image">
                    <img src="./Product/<?php echo $row["Image_Item"]; ?>" alt="" class="img-fluid">
                </div>
                <div class="cart_info">
                    <h4><?php echo $row["Name"]; ?></h4>
                    <p class="fw-bolder">₱ <?php echo $row["Prize"]; ?></p>
                    <p> Quality <?php echo $row["Quality"]; ?></p>
                    <p> Size <?php echo $row["Size"]; ?></p>
                </div>
                <div class="cart_btn">
                    <button>Check Out</button>
                </div>
                <div class="cart_btn_remove">
                    <form action="Delete_cart.php?cart_id=<?php echo $row["Id"]; ?>?>>" method="post">
                        <input type="hidden" value="<?php echo $row["Id"]; ?>">
                        <button name="remove">Remove</button>
                    </form>
                </div>
            </div>
            <?php } while ($row = $result->fetch_assoc());?>
        </div>
    </div>
</main>
<?php 
    include_once "Components/Footer.php";
?>