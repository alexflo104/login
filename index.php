<?php
session_start();

include "connection.php";
include "functions.php";

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width-device-width, initial-scale=1">
    <title>Home</title>

    <link rel = "stylesheet" type = "text/css" href = "./style.css">

    <style type = "text/css">
        /* rgb(230,60,231) */
    </style>

</head>
<body>

<header style = "position: fixed; width: 100%;display: flex;justify-content: space-between;align-items: center;padding: 10px 25px;top: 0;right: 0">
    <h2>LOGO</h2>
    <a href = "login.php">Logout</a>
</header>

<main>
    <h1>Hello <?php echo $user_data["user_name"] ?> </h1>
</main>



</body>
</html>