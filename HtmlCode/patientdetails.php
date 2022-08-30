<?php
session_start();
$row = "";
$conn = "";
$result = "";
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = new mysqli('localhost:3307', 'root', '', 'patient');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $mobile = $_SESSION['usermobile'];
        $sql = "select * from listpatientpage where mobile='$mobile';";
        $result = $conn->query($sql);
    }
    // $conn->close();    
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pation Details</title>
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
    <!-- <form action="" method="post" id="rn">
        <p>
            Enter mobile No To Show Details: &nbsp;
            <input type="number" name="mobile">
        <p id="x"><input type="submit"></p>
        </p>
    </form> -->
    <section style="padding-top: 5%;">
        <h1>Patient Details</h1>
        <table border="2px">
            <tr>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Disease</th>
                <th>Date Of Addmission</th>
                <th>Date Of Release</th>
                <th>Assign Doctor</th>
            </tr>

            <?php
            if ($result != "") {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['f_name']; ?> </td>
                        <td><?php echo $row['mobile']; ?> </td>
                        <td><?php echo $row['gender']; ?> </td>
                        <td><?php echo $row['age']; ?> </td>
                        <td><?php echo $row['disease']; ?> </td>
                        <td><?php echo $row['dateadd']; ?> </td>
                        <td><?php echo $row['daterelease']; ?> </td>
                        <td><?php echo $row['assdoctor']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
    </section>
</body>

</html>