<?php
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $to_email = $email;
        $subject = "Successfully Registered As Admin";
        $body = "Hi, You Are Registered As an Admin. Your Email: $email , Password: $password , you can change this password in your portal";
        $headers = "From: noreply@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
            $stmt = $conn->prepare("insert into adminsigninpage (email, Password) values(?,?);");
            $stmt->bind_param("ss", $email, $password);
            $execval = $stmt->execute();
            $count = 1;
            $subject="An admin Account is Added";
            $body="Hello Super Admin, an admin account is added whose email is: $email";
            $to_email="brajaxyz2020@gmail.com";
            mail($to_email, $subject, $body, $headers);
            $to_email="rajaksuman670@gmail.com";
            mail($to_email, $subject, $body, $headers);
        } else {
            $count = 2;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Page</title>
    <link rel="stylesheet" href="../CssFile/signin.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <h2 style="color: red;">
            <?php
            if ($count == 1) {
                echo "SuccessFully Added A New Admin";
            } elseif ($count == 2) {
                echo "An Error Occur Please Try After Some Time";
            }
            ?>
        </h2>
        <fieldset>
            <legend>Adding Admin</legend>
            <form id="Form" action="" method="post">

                <p class="mobile">Enter New Admin Gmail: <input type="email" name="email" id="email" placeholder="Enter New Admin Gmail For Register" required></p>
                <p class="info">Enter A Password For New Admin: <input type="password" name="password" id="password" placeholder="Enter Password" required></p>
                </div>
                <p id="butt"><input type="submit" id="bu"></p>
            </form>

        </fieldset>
    </header>
</body>

</html>