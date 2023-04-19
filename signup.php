<?php 
session_start();

include "connection.php";
include "functions.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($user_email) && !empty($password) && !is_numeric($user_name)) {
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,user_email,password) values ('$user_id','$user_name','$user_email','$password')"
            ;

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        $error = "please enter correct information";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Login-Signup Page</title>

    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>

    <main>
    <div class="flx-cont signUp">
			<h1>SignUp</h1>
			<form method = "post">
				<input type="text" name="user_name" placeholder="Your Name" class="form-input">
				<input type="email" name="user_email" placeholder="Your Email" class="form-input">
				<input type="password" name="password" placeholder="Password" class="form-input">

                <p class="alert" style ="font-size: 15px;color: #fa4d4d;margin: 10px 0;text-align: center;">
                    <?php 
                        if (isset($error) && $error != "") {
                            echo $error;
                        }
                    ?>
                </p>
				<input type="submit" value="SignUp" class="sbmt-btn">
			</form>
			<h2>OR</h2>
			<a href = "login.php"  type = "button" class="google-signin-btn">
				Log In
            </a>
		</div>
    </main>

</body>
</html>