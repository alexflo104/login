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

        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqLi_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password && $user_data['user_email'] === $user_email) {
                    $_SESSION['user_id'] = $user_data['user_id'];

                    header("Location: index.php");
                    die;
                }
            }
        }

    } else {
        $error = "please enter valid credentials";
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
        <div class="flx-cont login">
			<h1>LogIn</h1>
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
				<input type="submit" value="Login" class="sbmt-btn">
			</form>
			<h2>OR</h2>
			<a href = "signup.php"  type = "button" class="google-signin-btn">
				SignUp
            </a>
		</div>
    </main>

</body>
</html>