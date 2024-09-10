<?php
    include_once "Connection/Config.php";
    include_once "Components/Header.php";

    $error_fname = null;
    $error_lname = null;
    $error_phone = null;
    $error_address = null;
    $error_email = null;
    $error_password = null;

    if (isset($_POST["signup"])) {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user_data WHERE Email = '$email'";
        $result = $con->query($sql);
        $total = $result->num_rows;

        if ($total > 0) {

            echo "a";
        } else {

            if (empty(trim($fname))) {
                $error_fname = "Input Name";
            } else if (empty(trim($lname))) {
                $error_lname = "Input Last Name";
            } else if (empty(trim($phone))) {
                $error_phone = "Input Phone Number";
            } else if (empty(trim($address))) {
                $error_address = "Input your Address";
            } else if (empty(trim($email))) {
                $error_email = "Input Your Email";
            } else if (empty(trim($password))) {
                $error_password = "Create Password";
            } else {
                $sql = "INSERT INTO `user_data`(`Name`, `Last_name`, `Email`, `Password`, `Phone`, `Address`) VALUES ('$fname','$lname','$email','$password','$phone','$address')";
                $con->query($sql) or die ($con->error);
                header("location: Lagin.php");
            }
        }
    }

?>
<main>
    <div id="signup">
        <div class="container-fluid">
            <form action="" method="post">
                <div class="form_signup_header">
                    <img src="Assets/Image/navtwo.png" alt="" class="img-fluid">
                    <h1>Sign Up</h1>
                </div>
                <div class="form_signup_input">
                    <input type="text" name="fname" placeholder="First Name">
                </div>
                <div class="error">
                    <p><?php echo $error_fname?></p>
                </div>
                <div class="form_signup_input">
                    <input type="text" name="lname" placeholder="Last Name">
                </div>
                <div class="error">
                    <p><?php echo $error_lname?></p>
                </div>
                <div class="form_signup_input">
                    <input type="number" name="phone" placeholder="Phone No">
                </div>
                <div class="error">
                    <p><?php echo $error_phone?></p>
                </div>
                <div class="form_signup_input">
                    <input type="text" name="address" placeholder="Address">
                </div>
                <div class="error">
                    <p><?php echo $error_address?></p>
                </div>
                <div class="form_signup_input">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="error">
                    <p><?php echo $error_email?></p>
                </div>
                <div class="form_signup_input">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="error">
                    <p><?php echo $error_password?></p>
                </div>
                <div class="form_signup_btn">
                    <a href="Lagin.php">Lag In</a>
                    <button type="submit" name="signup">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    include_once "Components/Footer.php";
?>