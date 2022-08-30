<?php
session_start();
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $otp = $_POST['otp'];
    if ($otp == $_SESSION['otp']) {
        header("location: SuperAdminPage.php");
    } else {
        $_SESSION['uniFlagOtp']=$_SESSION['uniFlagOtp']-1;
        $count = 1;
    }
}
if($_SESSION['uniFlagOtp']==0){
    $to_email = $_SESSION['superemail'];
    $subject = "Alert";
    $body = "Some One Wants To Access Yor Super Admin ID, he/she has your password please change password";
    $headers = "From: noreply@gmail.com";
    header("location: home.php");
    mail($to_email,$subject,$body,$headers);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP varification Page</title>
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
        ?>
            <h1 style="text-align:center; color:red;">OTP does not match</h1>
            <h3 style="text-align:center; color:red;">you have only <?php echo $_SESSION['uniFlagOtp'] ?> chance.</h3>
            <a href="SuperAdminSignin.php">GoTo SignIn Page</a>
        <?php
        }
        ?>
        <fieldset>
            <legend>OTP verification</legend>
            <form id="Form" action="" method="post">
                <p class="mobile">OTP: <input type="number" name="otp" placeholder="Enter OTP send to Register email" required style="width: 225px;"></p>
                <input type="submit" value="Check OTP">
            </form>

        </fieldset>
    </header>
</body>

</html>