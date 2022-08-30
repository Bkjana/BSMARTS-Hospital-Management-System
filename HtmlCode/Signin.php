<?php
session_start();
if(isset($_COOKIE['username'])){
    header("location: usereditpage.php");
}
$_SESSION['usermobile']=null;
$_SESSION['userpassword']=null;
$count=0;
$_SESSION['ucbox']=null;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$conn = new mysqli('localhost:3307','root','','patient');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ".$conn->connect_error);
}

else{
        $mobile = $_POST['mobile'];  
        $password = $_POST['password']; 
        $sql = "select *from userloginpage where mobile = '$mobile' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $count = mysqli_num_rows($result);  
        if($count==0){
            $count=2;
        }
        // $conn->close();    
    }
    if(isset($_POST['cbox'])){
        setcookie("username",$mobile,time()+3*24*3600);
    }
    $_SESSION['usermobile']=$mobile;
    $_SESSION['userpassword']=$password;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Page</title>
    <link rel="stylesheet" href="../CssFile/signin.css">
</head>
<body>
    <header>
        <a href="home.php" style="text-decoration: none;">
             <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
            <h1 class="title">BSMARTS MEDICAL HOSPITAL</h1>
        </a>
        <?php
        if($count == 1){  
        
            header("location: usereditpage.php")  ;
        }  
        else if($count==2){  
            ?>
           <h1 style="text-align:center; color:red; text-decoration:underline;"> Login failed. Invalid username or password.</h1>
           <?php 
            } 
            ?>
        <fieldset>
            <legend>SignIn</legend>
        <form id="Form" action="" method="post">
            
                <p class="mobile">Mobile: <input type="number" name="mobile" id="mobile" placeholder="Enter Register mobile" required></p>
                 <p class="info">Password: <input type="password" name="password" placeholder ="Enter Password" required></p>
            </div>
             
            <span>
                <p id="last"><input type="checkbox" name="cbox" value="yes" id="">Remember Me<span id="FogotPassword">&nbsp;&nbsp; <a href="forget.php" target="_blank" style="text-decoration: none;"> Forgot Password?</a></span></p>
                
            </span>
            <p id="butt"><input type="submit" id="bu"></p>
        </form>
      
    </fieldset>
  
    <p><center>Don't have an Account?&nbsp;&nbsp; <a href="SignUp.php" target="_blank">SignUp</a> </center></p>
    </header>
</body>
</html>