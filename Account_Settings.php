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
    <div id="account_settings">
        <div class="container-fluid">
            <div class="account_settings_nav">
                <div class="d-flex justify-content-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="Edit_Account.php?id_email=<?php echo $_SESSION["email_id"];?>"
                                class="nav-link">Edit Account</a>
                        </li>
                        <li class="nav-item">
                            <form action="Delete_Account.php?id_email<?php echo $_SESSION["email_id"]; ?>"
                                method="post">
                                <input type="hidden" value="<?php echo$row["Id"];?>">
                                <button type="submit" class="nav-link text-black" name="delete">Delete Account</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="Lagout.php" class="nav-link">Lag Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
    include "Components/Footer.php";
?>