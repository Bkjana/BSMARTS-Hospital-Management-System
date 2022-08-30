<?php
$result = "";
$conn = new mysqli('localhost:3307', 'root', '', 'patient');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $sql = "select * from appointmentpage;";
    $result = $conn->query($sql);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $date = $_POST['date'];
        $dname = $_POST['dname'];
        if ($date != '' and $dname != '')
            $sql = "select * from appointmentpage where doa='$date' and assdoc like '$dname%';";
        elseif ($date != '')
            $sql = "select * from appointmentpage where doa='$date';";
        elseif ($dname != '')
            $sql = "select * from appointmentpage where assdoc like '$dname%';";
        $result = $conn->query($sql);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Appointment</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 50px;
        }

        body {
            background-image: url("../Image/apoin.jpg");

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
            padding-left: 35%;
            padding-top: 3%;
        }

        #x {
            padding-left: 20%;
        }

        th,
        td {
            text-align: center;
            padding-left: 50px;
        }

        th {
            background-color: aqua;
        }

        #fr {
            text-align: center;
        }
    </style>
</head>

<body>
    <a href="home.php">
        <h2 class="title" id="t">WELCOME TO ENVIRONMENT</h2>
        <h1 class="title" id="t1">BSMARTS MEDICAL HOSPITAL</h1>
    </a>
    <section>
        <h1>Appointment Details</h1>
        <form action="" method="POST" id="fr">
            <p>
                Enter Date In Which Date You Want To Show Appointment :
                <input type="date" name="date">
            </p>
            <p>
                Enter Doctor Name In Whose Doctor's Appointment Want To See:
                <select name="dname" id="week" style="width: 10%;">
                    <option value="">...Select...</option>
                    <?php
                    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
                    if ($conn->connect_error) {
                        echo "$conn->connect_error";
                        die("Connection Failed : " . $conn->connect_error);
                    }
                    $sql123 = "select * from doctorpage;";
                    $result123 = $conn->query($sql123);
                    while ($row = mysqli_fetch_array($result123)) {

                    ?>
                        <option value='<?php echo $row['doctor_name']; ?>'><?php echo $row['doctor_name']; ?></option>
                    <?php

                    }
                    ?>
                </select>
            </p>
            <p>
                <input type="submit" name="" id="">
            </p>
        </form>
        <table border="2px">
            <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Appointment Date</th>
                <th>Doctor</th>
            </tr>
            <?php
            if ($result != "") {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['SLNo']; ?> </td>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['age']; ?> </td>
                        <td><?php echo $row['mobile']; ?> </td>
                        <td><?php echo $row['gender']; ?> </td>
                        <td><?php echo $row['doa']; ?> </td>
                        <td><?php echo $row['assdoc']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </section>
</body>

</html>