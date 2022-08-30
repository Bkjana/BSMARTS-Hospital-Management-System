<?php
session_start();
$flage=0;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$mobile = $_SESSION['usermobile'];
if(isset($_COOKIE['AdminMail'])){
    $mobile=$_COOKIE['AdminMail'];
}
$password=$_SESSION['userpassword'];
$oldpassword = $_POST['password'];
$conn = new mysqli('localhost:3307','root','','patient');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ".$conn->connect_error);
}

else{
    if($password==$oldpassword){
        $stmt = $conn->prepare("delete from userloginpage where mobile = ?;");
        $stmt->bind_param("i",$mobile);
        $execval = $stmt->execute();
        echo "Successfully Deleted..";
        $stmt->close();
        setcookie("username","",time()-1);
        header("location:home.php");
    }
    else{
        $flage=1;
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
    <title>Delete Profile</title> 
    <link rel="stylesheet" href="../CssFile/deletedoctor.css"> 
</head> 
<body> 
    <div> <h1 style="text-align: center; color: blueviolet;"><a href="home.php" style="text-decoration: none;">BSMARTS MDICAL HOSPITAL</a></h1></div> 
    <?php
        if($flage==1){
            echo "Password Donot Match";
        }
    ?>
     <fieldset id="mid"> 
            <legend style="text-align: center; border-radius: 10px;">User Profile Delete From</legend> 
            <form action="" method="post"> 
                <h1 style="text-align: center;">Delete Profile</h1> 
                <h3 style="text-align: center;">Please Enter Password Confirm That You Want To Delete Your Profile</h3> 
               <p><input type="password" name="password" id="name" placeholder="Enter Your Password" required></p>   
                 <p style="margin-right: 40%;"><input type="submit" name="submit" id="submit" value="Click Here To Delete Your Account"></p>
                </div> 
     </form> 
</body> 
</html>