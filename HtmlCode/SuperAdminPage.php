<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../CssFile/admineditpage.css">
  <title>Super Admin Portal</title>
</head>

<body>
  <a href="home.php" style="text-decoration: none;">
    <h1 style="text-align: center;color: rgb(17, 1, 233); text-decoration: underline; background-color: rgb(8, 255, 8); padding:5px"> WELCOME TO BSMARTS MEDICAL HOSPITAL </h1>
  </a>
  <div class="row pt-5">
    <div class="col-sm-6">
      <div class="card p-3">
        <div class="card-body">
          <h5 class="card-title">Adding Admin</h5>
          <p class="card-text">To add a new Admin. Select 'Add Admin' using the Button. </p>
          <a href="AddAdmin.php" class="btn btn-primary">Add Admin</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card p-3">
        <div class="card-body">
          <h5 class="card-title">Delete Admin</h5>
          <p class="card-text">To Delete an Admin. Select 'Delete Admin' using the Button.</p>
          <a href="DeleteAdmin.php" class="btn btn-primary">Delete Admin</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card p-3">
        <div class="card-body">
          <h5 class="card-title">Change Password</h5>
          <p class="card-text">To Change Password, click on the 'Change Password' using the Button . </p>
          <a href="SuperChangePassword.php" class="btn btn-primary">Change Password</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card p-3">
        <div class="card-body">
          <h5 class="card-title">Show All Admins</h5>
          <p class="card-text">Click On 'List Of Admin' </p>
          <a href="AllAdmin.php" class="btn btn-primary">List Of Admin</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>