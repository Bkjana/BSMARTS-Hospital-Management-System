<?php 
$execval="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$conn = new mysqli('localhost:3307','root','','patient');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ".$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into helppage (name, mobile, subject, message) values(?,?,?,?);");
    $stmt->bind_param("siss",$name, $mobile, $subject, $message);
    $execval = $stmt->execute();
    // echo "Your Message Was Sent, THANK YOU!!!";
    $stmt->close();
    // $conn->close();
}
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Help and Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../CssFile/style.css">

	</head>
	<body style="background-image: url(../Image/help.jpg);">
	<section class="ftco-section img bg-hero">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<?php
					if($execval!=""){
					?>
		<h2 class="heading-section" style="font-size: 20px; color: yellow;text-decoration:underline;padding-bottom: 20%">Your Message Was Sent Successfully...THANK YOU!!!</h2>
		<?php
					}
					?>
					<a href="home.php" style="text-align: center;  text-decoration: none;">
					<h1 class="heading-section" style="font-size: 35px;">BSMARTS MEDICAL HOSPITAL</h1>
				</a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5">
									<h3 class="mb-4">Contact us</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Address:</span> Habibpur Midnapore, Near Siddheswari Kali Mandir</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Phone:</span>+916297954915</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span>tanumoydas2002@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Website</span>bjsa.com</p>
					          </div>
				          </div>
			          </div>
							</div>
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Submit Your Feedback</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form action="" method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="number" class="form-control" name="mobile" id="email" placeholder="Mobile Number" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

