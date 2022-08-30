<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$Room_Number = $_POST['Room_Number'];
$Occupied_or_Vacant = $_POST['Occupied_or_Vacant'];
$Patient_Name = $_POST['Patient_Name'];
$Date_of_Admit = $_POST['Date_of_Admit'];
$Date_of_Release = $_POST['Date_of_Release'];

$conn = new mysqli('localhost:3307','root','','patient');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ".$conn->connect_error);
}

else{
    $sql="select * from bedstatuspage where Room_Number='$Room_Number';";
    $result =$conn->query($sql);  
    $count = mysqli_num_rows($result);
    if($count>=1){
        $stmt = $conn->prepare("update bedstatuspage set Occupied_or_Vacant= ?, Patient_Name = ?, Date_of_Admit = ?, Date_of_Release = ? where Room_Number=?;");
        $stmt->bind_param("ssssi", $Occupied_or_Vacant, $Patient_Name, $Date_of_Admit, $Date_of_Release,$Room_Number);
        $execval = $stmt->execute();
        echo "Bed Details Updated Successfully...";
    }
    else{
        $stmt = $conn->prepare("insert into bedstatuspage (Room_Number, Occupied_or_Vacant, Patient_Name, Date_of_Admit, Date_of_Release) values(?,?,?,?,?);");
        $stmt->bind_param("issss",$Room_Number, $Occupied_or_Vacant, $Patient_Name, $Date_of_Admit, $Date_of_Release);
        $execval = $stmt->execute();
        echo "Bed Added Successfully...";
    }
    $stmt->close();
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
    <title>Bed Management</title> 
    <link rel="stylesheet" href="../CssFile/bedmanage.css"> 
</head> 
<body> 
    <div> <h1 style="text-align: center; color: blueviolet;"><a href="home.php" style="text-decoration: none;">BSMARTS MDICAL HOSPITAL</a></h1></div> 
     <fieldset id="mid"> 
            <legend style="text-align: center; border-radius: 10px;">Bed Management Form</legend> 
            <form action="" method="post"> 
                <h1 style="text-align: center;"></h1> 
                <h3 style="text-align: center;">Please Fill Out The From Below To Manage Bed Matrix</h3> 
               <p><input type="number" name="Room_Number" id="name" placeholder="Enter Room No" required></p> 
                  <!-- <p><input type="text" name="Occupied_or_Vacant" id="status" placeholder="Room Status"></p>  -->
                   
                  <p> 
                      Status: <select name="Occupied_or_Vacant" id="status" style="width: 50%;"> 
                          <option value="#">...Select...</option> 
                          <option value="Occupied">Occupied</option> 
                          <option value="Vacant">Vacant</option> 
                      </select> 
                  </p>
                      <p><input type="text" name="Patient_Name" id="status" placeholder="Patient Name"></p>
                  <p>Admit Date:<input type="date" name="Date_of_Admit" id="date"></p> 
                  <p>Release Date: <input type="date" name="Date_of_Release" id="date1"></p> 
                    <input type="submit" name="submit" id="submit"> 
                    <button id="reset">Reset</button> 
                </div> 
                </form> 
</body> 
</html>