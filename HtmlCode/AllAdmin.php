<?php
$result = "";
$conn = new mysqli('localhost:3307', 'root', '', 'patient');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $sql = "select * from adminsigninpage;";
    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
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
            padding-left: 32%;
            padding-top: 3%;
        }

        #x {
            padding-left: 23%;
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
        <h1>All Admin List</h1>
        <table border="2px">
            <tr>
                <th>SL No</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php
            if ($result != "") {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['SLNo']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['password']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
    </section>
</body>

</html>