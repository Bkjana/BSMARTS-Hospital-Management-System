<?php
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $email = $_POST['email'];
        // $password = $_POST['password'];
        $to_email = $email;
        $subject = "Delete From Admin";
        $body = "Hi, You Are Deleted As A Admin By A Super Admin";
        $headers = "From: mjana7652@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
            $stmt = $conn->prepare("delete from adminsigninpage where email=?;");
            $stmt->bind_param("s", $email);
            $execval = $stmt->execute();
            $count = 1;
            $subject="An admin Account is deleted";
            $body="hi super admin, an admin account is deleted whose email is: $email";
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
    <title>Admin Delete Page</title>
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
                echo "SuccessFully Deleted Admin";
            } elseif ($count == 2) {
                echo "An Error Occur Please Try After Some Time";
            }
            ?>
        </h2>
        <fieldset>
            <legend>Delete Admin</legend>
            <form id="Form" action="" method="post">

                <p class="mobile">Enter Delete Admin Gmail: 
                <select name="email" id="email" style="width: 25%;" required>
                    <option value="">...Select...</option>
                    <?php
                    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
                    if ($conn->connect_error) {
                        echo "$conn->connect_error";
                        die("Connection Failed : " . $conn->connect_error);
                    }
                    $sql123 = "select * from adminsigninpage;";
                    $result123 = $conn->query($sql123);
                    while ($row = mysqli_fetch_array($result123)) {

                    ?>
                        <option value='<?php echo $row['email']; ?>'><?php echo $row['email']; ?></option>
                    <?php

                    }
                    ?>
                </select>    
                </div>
                <p id="butt"><input type="submit" id="bu"></p>
            </form>

        </fieldset>
    </header>
</body>

</html>