<?php
$result = "";
$xp = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $Room_Number = $_POST['Room_Number'];
        $name = $_POST['name'];
        $sql = "select * from bedstatuspage";
        if ($Room_Number != null && $name != null) {
            $sql = "select * from bedstatuspage where Room_Number='$Room_Number' and Patient_name like '$name%';";
        } elseif ($name != null) {
            $sql = "select * from bedstatuspage where Patient_name like '$name%';";
        } elseif ($Room_Number != null) {
            $sql = "select * from bedstatuspage where Room_Number='$Room_Number';";
        }
        $result = $conn->query($sql);
        // $row = ;
        $xp = 0;
    }
    // $conn->close();    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bed Status</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 50px;
        }

        h4 {
            text-align: center;
        }

        body {
            background-image: url("../Image/bed.webp");
        }

        body a {
            text-decoration: none;
            text-align: center;
        }

        #t {
            font-size: 30px;
            color: purple;
        }

        #t1 {
            font-size: 40px;
            color: rgba(14, 31, 124, 0.74);
        }

        table {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            text-align: center;
            /* margin: 10px; */
        }

        #rn {
            margin-left: auto;
            margin-right: auto;
            padding-left: 40%;
            padding-top: 5%;
        }

        #x {
            padding-left: 10%;
        }

        th,
        td {
            padding-left: 50px;
        }

        th {
            background-color: aqua;
        }
    </style>
</head>

<body>
    <a href="home.php">
        <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
        <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
    </a>

    <h4>Room Number Available:
        <?php
        $conn1 = new mysqli('localhost:3307', 'root', '', 'patient');
        if ($conn1->connect_error) {
            echo "$conn1->connect_error";
            die("Connection Failed : " . $conn1->connect_error);
        }
        $ss = "select * from bedstatuspage;";
        $res = $conn1->query($ss);
        while ($ro = mysqli_fetch_array($res)) {
            echo $ro['Room_Number'] . ", ";
        }
        ?>
    </h4>
    <h4>Occupied Room Number:
        <?php
        $conn1 = new mysqli('localhost:3307', 'root', '', 'patient');
        if ($conn1->connect_error) {
            echo "$conn1->connect_error";
            die("Connection Failed : " . $conn1->connect_error);
        }
        $ss = "select * from bedstatuspage where Occupied_or_Vacant='Occupied';";
        $res = $conn1->query($ss);
        while ($ro = mysqli_fetch_array($res)) {
            echo $ro['Room_Number'] . ", ";
        }
        ?>
    </h4>
    <h4>Vacant Room Number:
        <?php
        $conn1 = new mysqli('localhost:3307', 'root', '', 'patient');
        if ($conn1->connect_error) {
            echo "$conn1->connect_error";
            die("Connection Failed : " . $conn1->connect_error);
        }
        $ss = "select * from bedstatuspage where Occupied_or_Vacant='Vacant';";
        $res = $conn1->query($ss);
        while ($ro = mysqli_fetch_array($res)) {
            echo $ro['Room_Number'] . ", ";
        }
        ?>
    </h4>
    <form action="" method="post" id="rn">
        <p>
            Enter Room No: &nbsp;
            <input type="number" name="Room_Number" placeholder="Enter Room Number">
        </p>
        <p>
            Enter patient Name:&nbsp;
            <input type="text" name="name" placeholder="Enter Patient Name">
        </p>
        <p id="x"><input type="submit"></p>

    </form>
    <section>
        <h1>Room Details</h1>
        <!-- TABLE CONSTRUCTION-->
        <table border="2px">
            <tr>
                <th>Room Number</th>
                <th>Occupied</th>
                <th>Patient Name</th>
                <th>Admit Date</th>
                <th>Release Date</th>
            </tr>

            <?php
            if ($result != "") {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['Room_Number']; ?> </td>
                        <td><?php echo $row['Occupied_or_Vacant']; ?> </td>
                        <td><?php echo $row['Patient_Name']; ?> </td>
                        <td><?php echo $row['Date_of_Admit']; ?> </td>
                        <td><?php echo $row['Date_of_Release']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
    </section>
</body>

</html>