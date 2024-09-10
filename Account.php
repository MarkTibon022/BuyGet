<?php
    // session_start();
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";

    $id_email = $_SESSION["email_id"];

    $sql = "SELECT * FROM user_data WHERE Email = '$id_email'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
?>
<main>
    <div id="account">
        <div class="container-fluid">
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
            <div class="profile">
                <div class="img_user">
                    <?php if (empty($row["Profile"])) {?>
                    <img src="Assets/Image/user.jpg" alt="" class="img-fluid profile_user">
                    <?php } else { ?>
                    <div class="img_user">
                        <img src="./UserProfile/<?php echo $row["Profile"]; ?>" alt="" class="img-fluid profile_user">
                    </div>
                    <?php };?>
                    <div class="info_user">
                        <h4><?php echo $row["Email"]; ?></h4>
                        <p>Member BUYGET Since 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include_once "Components/Footer.php";
?>