<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $disease = $_POST['disease'];
    $dateadd = $_POST['dateadd'];
    $daterelease = $_POST['daterelease'];
    $assdoctor = $_POST['assdoctor'];
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $sta="select * from listpatientpage where name='$name' and f_name='$fname' and mobile=$mobile;";
        $result =$conn->query($sta);  
        $count = mysqli_num_rows($result);
        if($count>=1){
            $stmt=$conn->prepare("update listpatientpage set gender=?,age=?,disease=?,dateadd=?,daterelease=?,assdoctor=? where name=? and f_name=? and mobile=?;");
            $stmt->bind_param("sissssssi",$gender,$age,$disease,$dateadd,$daterelease,$assdoctor,$name,$fname,$mobile);
            $execuval=$stmt->execute();
            echo "Successfully Modified...";
            $stmt->close();
        }
        else{
            $stmt = $conn->prepare("insert into listpatientpage (name,f_name, mobile, gender, age, disease, dateadd, daterelease, assdoctor) values(?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("ssisissss", $name, $fname, $mobile, $gender, $age, $disease, $dateadd, $daterelease, $assdoctor);
            $execval = $stmt->execute();
            echo "Successfully Registered...";
            $stmt->close();
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
    <title>Patient Form</title>
    <link rel="stylesheet" href="../CssFile/patientform.css">
</head>

<body>
    <div>
        <a href="home.php" style="text-decoration: none;">
            <h1 style="text-align: center;color: rgb(17, 1, 233); text-decoration: underline; padding:5px"> WELCOME TO BSMARTS MEDICAL HOSPITAL </h1>
        </a>
        <fieldset id="mid">
            <legend>Patient Information</legend>
            <form action="" method="post">
                <p>Name:<input type="text" name="name" id="name" placeholder=" Enter Patient's Name" required></p>
                <p>Father Name:<input type="text" name="fname" id="name" placeholder=" Enter Patient's Father Name" required></p>
                <p>Mobile Number: <input type="mobile" name="mobile" id="mobile" placeholder="Enter Mobile Number" required></p>

                <p>Sex:&nbsp;Male<input type="radio" name="gender" id="gender" value="male" required>
                    Female<input type="radio" name="gender" id="gender" value="female" required>
                    Others<input type="radio" name="gender" id="gender" value="others" required></p>
                <p>Age: <input type="number" name="age" id="Age" placeholder="Enter Patient's Age" required></p>
                <p> Disease:<input type="text" name="disease" id="disease" placeholder="Name of Disease" required></p>
                <p>Date of Admission: <input type="date" name="dateadd" id="DOA" placeholder=""></p>
                <p>Date of Release: <input type="date" name="daterelease" id="DOR" placeholder=""></p>
                <p>Assigned Doctor:
                    <?php

                    $conn1 = new mysqli('localhost:3307', 'root', '', 'patient');
                    if ($conn1->connect_error) {
                        echo "$conn1->connect_error";
                        die("Connection Failed : " . $conn1->connect_error);
                    } else {
                        $sql = "select * from doctorpage;";
                        $result = $conn1->query($sql);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                <p>
                    <?php echo $row['doctor_name']; ?><input type="radio" name="assdoctor" id="assdoc" value='<?php echo $row['doctor_name']; ?>' required>
                </p>
        <?php
                        }
                    }
        ?>
        <div style="text-align: center;">
            <input type="submit" id="submit"  />
            <button id="reset">Reset</button>
        </div>
    </div>
    </form>


    </fieldset>
    </div>

</body>

</html>