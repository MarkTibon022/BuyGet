<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_store";

    $con = new mysqli($host, $username, $password, $dbname);

    if ($con->connect_error) {
        die ("bad ".$con->error);
    };

    // $host = "sql110.infinityfree.com";
    // $username = "if0_37169235";
    // $password = "l6Cwa9ZIXP94I";
    // $dbname = "if0_37169235_my_store";

    // $con = new mysqli($host, $username, $password, $dbname);

    // if ($con->connect_error) {
    //     die ("bad ".$con->error);
    // };
    ?>