<?php
session_start();
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select *from superadminpage where email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 0) {
            $count = 2;
        }
        // $conn->close();    
    }
    $_SESSION['superemail'] = $email;
    $_SESSION['superpassword'] = $password;
    $_SESSION['uniFlagOtp']=3;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin SignIn Page</title>
    <link rel="stylesheet" href="../CssFile/signin.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <?php
        if ($count == 1) {
            $gotp = rand(1111, 9999);
            $to_email = $email;
            $_SESSION['otp']=$gotp;
            $subject = "OTP verification";
            $body = "Hi, super admin verification OTP is: $gotp ";
            $headers = "From: mjana7652@gmail.com";
            if (mail($to_email, $subject, $body, $headers)) {
                header("location: otp.php");
            } else {
        ?>
                <h1 style="text-align:center; color:red; text-decoration:underline;">Please try again after some time. OTP is not sent</h1>
                <a href="home.php">GoTo Home</a>
            <?php
            }
        } else if ($count == 2) {
            ?>
            <h1 style="text-align:center; color:red; text-decoration:underline;"> Login failed. Invalid username or password.</h1>
        <?php
        }
        ?>
        <fieldset>
            <legend> Super Admin SignIn</legend>
            <form id="Form" action="" method="post">

                <p class="mobile">Gmail: <input type="email" name="email" id="mobile" placeholder="Enter Register Gmail" required></p>
                <p class="info">Password: <input type="password" name="password" placeholder="Enter Password" required></p>
                </div>
                <p><input type="submit" value="get OTP"></p>
            </form>

        </fieldset>
    </header>
</body>

</html>