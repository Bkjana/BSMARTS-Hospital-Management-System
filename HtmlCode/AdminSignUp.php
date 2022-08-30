<?php
$flag=0;
$name="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];  
    $email = $_POST['email'];  
    $mobile = $_POST['mobile'];
    $to_email = "brajaxyz2020@gmail.com";
    $subject = "Sing Up Request As Admin";
    $body = "Hi, new admin singn up request is created please add admin if his/her this details are valid Name: $name , Email: $email , Mobile: $mobile";
    $headers = "From: noreply@gmail.com";
    
    if (mail($to_email, $subject, $body, $headers)) {
        $to_email="rajaksuman670@gmail.com";
        mail($to_email, $subject, $body, $headers);
        $flag=1;
    } else {
        $flag=2;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup Page</title>
    <link rel="stylesheet" href="../Cssfile/signup.css">
</head>

<body>
    <header>
        <a href="home.php" style="text-decoration: none;">

            <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <h2 style="text-align: center; color:blueviolet">
            <?php
                if($flag==1){
                    echo "Email successfully sent to Super Admin...\n";
                    echo "If Your Account Is Created You will Get A Mail. Please Check Your Gmail Spam box after some days";
                }
                elseif($flag==2)
                    echo "Email cannot be sent. Please try again later.";
            ?>
        </h2>
        <fieldset>
            <legend>Admin SignUp</legend>
            <form id="Form" action="" method="post">
                <div id="mid">
                    <p class="info">Full Name: <input type="name" name="name" placeholder="Enter Full Name" required></p>
                    <p class="info">Email: <input type="email" name="email" placeholder="Enter Email" required></p>
                    <p class="info">Mobile No: <input type="value" name="mobile" placeholder="Enter Mobile Number" required></p>
                    
                </div>
                <input type="submit" id="submit" style="text-align: center;" />
            </form>

        </fieldset>
        <span>
            <p id="Already">
                <center>Already Signup? <span id="Login"><a href="AdminSignin.php">Sign in</a></span></center>
            </p>

        </span>

    </header>
</body>

</html>