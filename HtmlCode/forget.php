<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$conn = new mysqli('localhost:3307','root','','patient');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ".$conn->connect_error);
}

else{
       $name = $_POST['name'];   
        $mobile = $_POST['mobile'];  
        $sql = "select *from userloginpage where name = '$name' and mobile = '$mobile'";  
        $result = mysqli_query($conn, $sql);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
            $sql = "select password from userloginpage where name = '$name' and mobile = '$mobile'";  
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo "<h1><center>Your Password is: " . $row["password"]. "</h1></center>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid name or mobile.</h1>";  
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
    <title>Forget Password</title>
    <link rel="stylesheet" href="../CssFile/signin.css">
</head>
<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
             <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title">BSMKTS MEDICAL HOSPITAL</h1>
        </a>
        <p id="admin"><a href="../HtmlCode/AdminSignin.php">Admin Sign in</a></p>
        <fieldset>
            <legend>Forget Password</legend>
        <form id="Form" action="" method="post">
            
                <p class="info">Name: <input type="name" name="name" id="password"placeholder ="Enter Name" required></p>
                <p class="mobile">Mobile: <input type="number" name="mobile" id="mobile" placeholder="Enter Register mobile" required></p>
            </div>
            <p id="butt"><input type="submit" id="bu"></p>
        </form>
      
    </fieldset>
  
    <p><center>Got Your Password?&nbsp;&nbsp; <a href="Signin.php" >SignIn</a> </center></p>
    </header>
</body>
</html>