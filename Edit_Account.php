<?php 
    // session_start();
    include_once "Connection/Config.php";
    include_once "Components/Header.php";
    include_once "Components/Navbar.php";

    $id_email = $_SESSION["email_id"];

    $sql = "SELECT * FROM user_data WHERE Email = '$id_email'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST["edit"])) {

        $profile = $_FILES["profile"]["name"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $profile_ext = pathinfo($profile, PATHINFO_EXTENSION);
        $profile_allow = array("jpg", "jpeg", "png");
        $profile_tmp_nam = $_FILES["profile"]["tmp_name"];
        $profile_size = $_FILES["profile"]["size"];

        if (!file_exists($profile_tmp_nam)) {
            echo "no file";
        } else if (!in_array($profile_ext, $profile_allow)) {
            echo  "not allow";
        } else if ($profile_size > 1000000) {
            echo "large file";
        } else {
            $location_image = "./UserProfile/" .$profile;
            if (move_uploaded_file($profile_tmp_nam, $location_image)) {
                $sql = "UPDATE `user_data` SET`Profile`='$profile',`Name`='$fname',`Last_name`='$lname',`Email`='$email',`Password`='$password',`Phone`='$phone',`Address`='$address' WHERE Email = '$email'";
                $result = $con->query($sql);
                header("location: Account.php");
            } else {
                echo "not move";
            }
        }

    }
?>
<main>
    <div id="edit_account">
        <div class="container-fluid">
            <h1>Edit Account</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form_edit_photo">
                    <label for="user_profile">Set Profile</label>
                    <input type="file" id="user_profile" name="profile">
                </div>
                <div class="form_edit_input">
                    <input type="text" placeholder="First Name" name="fname" value="<?php echo $row["Name"]; ?>">
                </div>
                <div class="form_edit_input">
                    <input type="text" placeholder="Last Name" name="lname" value="<?php echo $row["Last_name"]; ?>">
                </div>
                <div class="form_edit_input">
                    <input type="number" placeholder="Phone Number" name="phone" value="<?php echo $row["Phone"]; ?>">
                </div>
                <div class="form_edit_input">
                    <input type="text" placeholder="Address" name="address" value="<?php echo $row["Address"]; ?>">
                </div>
                <div class="form_edit_input">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $row["Email"]; ?>">
                </div>
                <div class="form_edit_input">
                    <input type="Password" placeholder="Password" name="password"
                        value="<?php echo $row["Password"]; ?>">
                </div>
                <div class="form_edit_btn">
                    <a href="Account.php?id_email=<?php echo $_SESSION["email_id"];?>">Bark</a>
                    <button type="submit" name="edit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php 
    include "Components/Footer.php";
?>