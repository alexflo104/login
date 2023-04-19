<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "yt_login_db";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        die("failed to connect");
    }