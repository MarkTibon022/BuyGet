<?php 
    include_once "Connection/Config.php";
    $cart_id = $_GET["cart_id"];

    if (isset($_POST["remove"])) {
        
        $sql = "DELETE FROM `cart_data` WHERE Id = '$cart_id'";
        $con->query($sql);
        header("location: Bag.php");
    }
?>