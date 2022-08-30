<?php
session_start();
$flag=0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mobile = $_SESSION['usermobile'];
    $oldpassword = $_POST['oldpassword'];
    // $password =password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (trim($_POST['password']) !=  trim($_POST['pass'])) {
        $password_err = "Passwords should match";
        $flag=1;
    }
    else{
        $password = $_POST['password'];
        $conn = new mysqli('localhost:3307', 'root', '', 'patient');
        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed : " . $conn->connect_error);
        } else {
            $sql="select * from userloginpage where mobile=$mobile and password='$oldpassword';";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            if($count>0){
                $stmt = $conn->prepare("update userloginpage set password=? where mobile=? and password=?;");
                $stmt->bind_param("sis", $password, $mobile, $oldpassword);
                $execval = $stmt->execute();
                $stmt->close();
                header("location: Signin.php");
            }
            else{
                $flag=2;
            }
            
            $conn->close();
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
    <title>Change Password</title>
    <link rel="stylesheet" href="../Cssfile/signup.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <?php
            if ($flag==1) {
                echo "Password Should Match";
            }
            elseif($flag==2){
                echo "enter correct password";
            }
        ?>
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