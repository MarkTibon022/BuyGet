<?php
    session_start();
    include_once "Connection/Config.php";

    if (isset($_POST["delete"])) {
        $id_email = $_SESSION["email_id"];

        $sql = "DELETE FROM user_data WHERE Email = '$id_email'";
        $result = $con->query($sql);

        session_destroy();
        header("location: index.php");
    }

?>