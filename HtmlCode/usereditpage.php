<?php
session_start();
if(isset($_COOKIE['username'])){
  $_SESSION['usermobile']=$_COOKIE['username'];
}
?>
<!doctype html> 
<html lang="en"> 
  <head> 
     
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../CssFile/admineditpage.css"> 
    <title>User Portal</title> 
  </head> 
  <body> 
  <a href="home.php" style="text-decoration: none;">
    <h1 style="text-align: center;color: rgb(17, 1, 233); text-decoration: underline; background-color: rgb(8, 255, 8); padding:5px"> WELCOME TO BSMARTS MEDICAL HOSPITAL </h1></a> 
   
      <div class="row pt-5" > 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">Patient Details</h5> 
        <p class="card-text">To See Your Profile, Click on the Bellow 'Show Details' Button. </p> 
        <a href="patientdetails.php" class="btn btn-primary">Show Details</a> 
      </div> 
    </div> 
  </div> 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">Get Appointment</h5> 
        <p class="card-text">To Get Appointment, Click on the Bellow 'Get Appointment' Button.</p> 
        <a href="gateappointment.php" class="btn btn-primary">Get Appointment</a> 
      </div> 
    </div> 
  </div> 
</div> 
<br> 
<div class="row"> 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">See Appointment</h5> 
        <p class="card-text">To See Your Appointment, Click on the Bellow 'Show Appointment' Button.</p> 
        <a href="userappoinmentshow.php" class="btn btn-primary">Show Appointment</a> 
      </div> 
    </div> 
  </div> 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">Change Your Password</h5> 
        <p class="card-text">To Change Password, Click on the Bellow 'Change Password' Button.</p> 
        <a href="cangepassword.php" class="btn btn-primary">Change Password</a> 
      </div> 
    </div> 
  </div> 
</div> 

<div class="row pt-4"> 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">Log Out From Dashboard</h5> 
        <p class="card-text">To Log Out From Dashboard, Click on the Bellow 'Log Out' Button.</p> 
        <a href="logout.php" class="btn btn-primary">Log Out</a> 
      </div> 
    </div> 
  </div> 
  <div class="col-sm-6"> 
    <div class="card p-3"> 
      <div class="card-body"> 
        <h5 class="card-title">Delete Your Profile</h5> 
        <p class="card-text">To Delete Your Profile, Click on the Bellow 'Delete Profile' Button.</p> 
        <a href="deleteuserprofile.php" class="btn btn-primary">Delete Profile</a> 
      </div> 
    </div> 
  </div> 
</div> 
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
 
     
  </body> 
</html>