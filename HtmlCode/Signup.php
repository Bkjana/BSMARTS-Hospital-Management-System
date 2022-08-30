<?php
$password_err = "" ; $userpresent = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    // $password =password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (trim($_POST['password']) !=  trim($_POST['pass'])) {
        $password_err = "Passwords Should Match";
    } else {

        $password = $_POST['password'];
        $conn = new mysqli('localhost:3307', 'root', '', 'patient');
        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed : " . $conn->connect_error);
        } else {
            $check = mysqli_query($conn, "select * from userloginpage where mobile=$mobile");
            $checkrows = mysqli_num_rows($check);
            if ($checkrows > 0) {
                $userpresent = "This Mobile Number is Already Registered";
            } else {
                $stmt = $conn->prepare("insert into userloginpage (name, email, mobile, password) values(?,?,?,?);");
                $stmt->bind_param("ssis", $name, $email, $mobile, $password);
                $execval = $stmt->execute();
                header("location: Signin.php");
                $stmt->close();
                $conn->close();
            }
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
    <title>Signup Page</title>
    <link rel="stylesheet" href="../Cssfile/signup.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">

            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <h4 style="color: red;">
            <?php
            if ($password_err != "") {
                echo $password_err;
            }
            if ($userpresent != "") {
                echo $userpresent;
            }
            ?>
        </h4>
        <fieldset>
            <legend>SignUp</legend>
            <form id="Form" action="" method="post">
                <div id="mid">
                    <p class="info">Full Name: <input type="name" name="name" id="name" placeholder="Enter Full Name" required></p>
                    <p class="info">Email: <input type="email" name="email" id="email" placeholder="Enter Email" required></p>
                    <p class="info">Mobile No: <input type="value" name="mobile" id="mobile" placeholder="Enter Mobile Number" required></p>
                    <p class="info">Password: <input type="password" name="password" id="password" placeholder="Create Password" required></p>
                    <p>Re-Enter Password: <input type="password" name="pass" id="password" placeholder="Re-Enter Password" required></p>
                </div>
                <input type="submit" id="submit" />
            </form>

        </fieldset>
        <span>
            <p id="Already">
                <center>Already Signed up? <span id="Login"><a href="Signin.php">Sign in</a></span></center>
            </p>

        </span>

    </header>
</body>

</html>