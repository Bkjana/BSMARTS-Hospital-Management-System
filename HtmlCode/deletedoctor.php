<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Doctor_Name = $_POST['assdoc'];
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("delete from doctorpage where doctor_name = ?;");

        $stmt->bind_param("s", $Doctor_Name);
        $execval = $stmt->execute();
        echo "Successfully Deleted..";
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
    <title>Delete Doctor</title>
    <link rel="stylesheet" href="../CssFile/deletedoctor.css">
</head>

<body>
    <div>
        <h1 style="text-align: center; color: blueviolet;"><a href="home.php" style="text-decoration: none;">BSMARTS MDICAL HOSPITAL</a></h1>
    </div>
    <fieldset id="mid">
        <legend style="text-align: center; border-radius: 10px;">Doctor Delete From</legend>
        <form action="" method="post">
            <h1 style="text-align: center;">Delete Doctor</h1>
            <h3 style="text-align: center;">Please Fill Out The From Below To Add Doctor</h3>
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
                        <?php echo $row['doctor_name']; ?><input type="radio" name="assdoc" id="assdoc" value='<?php echo $row['doctor_name']; ?>' required>
                    </p>
            <?php
                }
            }
            ?>
            <input type="submit" name="submit" id="submit">
            <button id="reset">Reset</button>
            </div>
        </form>
</body>

</html>