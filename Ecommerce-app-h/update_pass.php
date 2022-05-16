<?php

include "db.php";

if($_GET["key"] && $_GET["reset"])
{
  $email=$_GET["key"];
  $pass=$_GET["reset"];
  $select=mysqli_query($con, "select email,password from user_info where email='$email' and password='$pass'");
  if(mysqli_num_rows($select)==1)
  {
    ?>

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

    <link rel="stylesheet" type="text/css" href="styles.css">

    <form method="post" action="submit_new.php" class="form-signin">
      <div class="input-group" style="width:800px; margin:0 auto;">
        <h2 class="form-signin-heading">Enter new Password</h2>
        <input class="form-control" type="hidden" name="email" value="<?php echo $email;?>">
        <input class="form-control" type="password" name='password' placeholder="New Password">
        <!--<input class="form-control" type="submit" name="submit_password">-->
        <br/><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_password">Submit Password</button>
      </div>
    </form>
    
    <?php
  }
}
?>