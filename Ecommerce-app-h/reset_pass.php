<?php
session_start();
include "db.php";
require('C:\xampp\htdocs\Ecommerce-app-h\PHPMailer-master\src\PHPMailerAutoload.php');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$sql = "SELECT * FROM `user_info` WHERE email = '$email'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Click link to change Password";
    $link="<a href='http://localhost/Ecommerce-app-h/update_pass.php?key=".$email."&reset=".$password."'>Click To Reset password</a>";
		$message = "Please use link to change your password " . $link;
    $headers = "From: ankur@gmail.com" . "\r\n" .
    "CC: gayatri@gmail.com" . "\r\n" .
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=iso-8859-1" . "\r\n";

    ini_set("SMTP", "myServer");
    ini_set("sendmail_from", "ankurs19986@gmail.com");

    if(mail($to, $subject, $message, $headers)){
			echo '<script>alert("Link to change our Password has been sent to your email id")</script>';
			echo "<script> window.location.assign('index.php'); </script>";
		}else{
			echo '<script>alert("Failed to Recover your password, try again")</script>';
		}

	}else{
		echo '<script>alert("User name does not exist in database")</script>';
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>TrustUs</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
				<span class="sr-only">navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">TrustUs</a>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
</div>
<br><br><br>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Reset Password</h2>
        <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" name="email" class="form-control" placeholder="Email" required>
		</div>
    <br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send link to change Password</button>
      </form>
</div>
</body>
</html>