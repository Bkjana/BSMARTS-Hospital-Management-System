<?php
$result = "";
$value = "";
$avalue = "";
$conn = new mysqli('localhost:3307', 'root', '', 'patient');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
}
$sql = "select * from doctorpage;";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../CssFile/doctorpage.css"> -->
  <title>Doctorts Details Page</title>
</head>

<body>
  <a href="home.php" style="text-align: center;  text-decoration: none;">
    <h2 class="title" style="color: purple;">WELCOME TO ENVIRONMENT</h2>
    <h1 class="title" style="color: rgba(14, 31, 124, 0.74);">BSMARTS MEDICAL HOSPITAL</h1>
  </a>
  <p>
  <h1 style="color: rgb(153, 0, 255)">Our Available Doctor Are :</h1>
  </p>
  <main>
    <?php
    if ($result != "") {
      while ($row = mysqli_fetch_array($result)) {
    ?>
        <p>
        <div style="display: flex; background-color: rgb(117, 162, 221);">
          <div>
            <img src="<?php echo $row['img']; ?>" alt="doctor image" style="width:100px; border: 2px solid rgb(235, 15, 15);">
          </div>
          <div style="padding-left: 10%;">
            <h1><?php echo $row['doctor_name']; ?></h1>
            <div style="font-size:20px; font-weight:500"><?php echo $row['specialist']; ?>, Visit Day: <?php echo $row['week']; ?>, Time:  <?php echo $row['time']; ?></div>
          </div>
        </div>
        </p>

    <?php
      }
    }
    ?>
  </main>
</body>

</html>