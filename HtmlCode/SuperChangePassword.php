<?php
session_start();
$flag = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_SESSION['superemail'];
    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password'];

    if (trim($_POST['password']) !=  trim($_POST['pass'])) {
        $password_err = "Passwords should match";
        $flag = 1;
    } else {
        if ($oldpassword == $_SESSION['superpassword']) {
            $conn = new mysqli('localhost:3307', 'root', '', 'patient');
            if ($conn->connect_error) {
                echo "$conn->connect_error";
                die("Connection Failed : " . $conn->connect_error);
            }
            $stmt = $conn->prepare("update superadminpage set password=? where email=? and password=?;");
            $stmt->bind_param("sss", $password, $email, $oldpassword);
            $execval = $stmt->execute();
            $stmt->close();
            header("location: SuperAdminSignin.php");
        } else {
            $flag = 2;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Change Password</title>
    <link rel="stylesheet" href="../Cssfile/signup.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <h2 style="color: red;">
            <?php
            if ($flag == 1) {
                echo "Password Should Match";
            } elseif ($flag == 2) {
                echo "Enter Correct Password";
            }
            ?>
        </h2>
        <fieldset>
            <legend>Reset Password</legend>
            <form id="Form" action="" method="post">
                <div id="mid">
                    <!-- <p class="info">Mobile No: <input type="value" name="mobile" id="mobile" placeholder="Enter Mobile Number" required></p> -->
                    <p class="info">Enter Old Password: <input type="password" name="oldpassword" placeholder="Enter old password" required></p>
                    <p class="info">Password: <input type="password" name="password" id="password" placeholder="Create Password" required></p>
                    <p>Re-Enter Password: <input type="password" name="pass" id="password" placeholder="Re-Enter Password" required></p>
                </div>
                <input type="submit" id="submit" />
            </form>

        </fieldset>
    </header>
</body>

</html>