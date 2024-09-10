<?php
    session_start();
    require_once "Components/Header.php";
?>
<main>
    <div id="navbar">
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <a href="" class="navbar-brand">
                    <img src="Assets/Image/navone.png" alt="" class="nav_logo">
                </a>
                <button type="submit" class="btn navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#nav_links"><i class="bi bi-list"></i></button>
                <div class="collapse navbar-collapse ms-lg-5" id="nav_links">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="Item.php" class="nav-link">Item</a>
                        </li>
                        <li class="nav-item">
                            <a href="Sale.php" class="nav-link">Sale</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Updates
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="nav_links">
                    <?php if (isset($_SESSION["name_id"])) {?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="Account.php?id_email=<?php echo $_SESSION["email_id"];?>" class="nav-link"><i
                                    class="bi bi-person pe-1"></i><?php echo $_SESSION["name_id"] ?></a>
                        </li>
                    </ul>
                    <?php } else {?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="Lagin.php" class="nav-link">Lag In</a>
                        </li>
                        <li class="nav-item">
                            <a href="Signup.php" class="nav-link">Sign Up</a>
                        </li>
                    </ul>
                    <?php };?>
                </div>
            </div>
        </nav>
    </div>
</main>
<?php require_once "Components/Footer.php";?>