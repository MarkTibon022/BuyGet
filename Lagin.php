<?php
    include_once "Connection/Config.php";
    include_once "Components/Header.php";

    $error_email = null;
    $error_password = null;
    $error_valid_account = null;


    if (isset($_POST["lagin"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user_data WHERE Email = '$email' AND Password = '$password'";
        $result = $con->query($sql);
        $total = $result->num_rows;

        if ($total > 0) {
            if (empty(trim($email))) {
                $error_email = "Input Email";
            } else if (empty(trim($password))) {
                $error_password = "Input Password";
            }else {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION["email_id"] = $row["Email"];
                $_SESSION["name_id"] = $row["Name"];
                header("location: index.php");
            }
        } else {
            $error_valid_account = "Sorry Not Found Account";
        }
    }
?>
<main>
    <div id="lagin">
        <div class="container-fluid">
            <form action="" method="post">
                <div class="form_header">
                    <img src="Assets/Image/navtwo.png" alt="" class="fluid">
                    <h1>Lag In</h1>
                </div>
                <div class="form_input">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="error">
                    <p><?php echo $error_email?></p>
                </div>
                <div class="form_input">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="error">
                    <p><?php echo $error_password?></p>
                </div>
                <p>By continuing, I agree to Nike’s <a href=""> Privacy Policy</a> and <a href="">Terms of Use.</a></p>
                <div class="error">
                    <p><?php echo $error_valid_account?></p>
                </div>
                <div class="form_btn">
                    <button type="submit" name="lagin">Lag in</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    include_once "Components/Footer.php";
?>