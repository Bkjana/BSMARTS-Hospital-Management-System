<?php
session_start();
if(isset($_COOKIE['adminMail'])){
    header("location: AdminEditPage.php");
}
$_SESSION['adminmail']=null;
$f = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(isset($_POST['cbox'])){
            setcookie("adminMail",$email,time()+3*24*3600);
        }
        $sql = "select *from adminsigninpage where email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $_SESSION['adminmail'] = $email;
            $_SESSION['adminpassword'] = $password;
            header("location:AdminEditPage.php");
        } else {
            $f = 1;
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SignIn Page</title>
    <link rel="stylesheet" href="../CssFile/signin.css">
</head>

<body>
    <header style="background-color: rgb(205, 247, 121);">
        <a href="home.php" style="text-decoration: none;">
            <h2 class="title" id="t">WELCOME TO ENVIORONMENT</h2>
            <h1 class="title">BSMKTS MEDICAL HOSPITAL</h1>
        </a>
        <?php
        if ($f == 1)
            echo "<h1>Login failed. Invalid username or password</h1>";
        ?>
        <p><a href="../HtmlCode/SuperAdminSignin.php">Plese Click Here To Sign In Super Admin</a></p>
        <fieldset>
            <legend>Admin SignIn</legend>
            <form id="Form" action="" method="post">

                <p class="info">Email: <input type="email" name="email" id="email" placeholder="Enter Register Email" required></p>
                <p class="info">Password: <input type="password" name="password" id="password" placeholder="Enter Password" required></p>
                </div>
                <span>
                    <p id="last"><input type="checkbox" name="cbox" value="yes" id="">Remember Me</p>

                </span>

                <p id="butt"><input type="Submit"></p>
            </form>

        </fieldset>

        <p>
            <center>Don't have an Account New Admin Sign Up?&nbsp;&nbsp; <a href="AdminSignUp.php" target="_blank">SignUp</a> </center>
        </p>
    </header>
</body>

</html>