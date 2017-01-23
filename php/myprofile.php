<?php
session_start();
include '../includes/header.php';?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <title>Chitchathomepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <div class="container text-center" style='margin-top:5vh'>
      <div class="row">
        <div class="col-sm-3 hidden-sm"></div>
        <div class="col-sm-6 well">
          <div class="well">
            <a href="changesettings.php" class='text-right'>Change settings</a>
          </div>
          <div clas="well">
            <img src="" alt="Avatar"><br>
            <?php echo $_SESSION["first"]." ".$_SESSION["last"];
                  echo "<p style='color:grey; font-size:70%;'>@".$_SESSION["user"]." is een faggot</p>";
            ?>
          </div>
          <div class="well">
            <p><strong>Bio: </strong><?php  ?></p>
            <p><strong>E-mail: </strong><?php echo $_SESSION['email']; ?></p>
            <p><strong>First name: </strong><?php echo $_SESSION['first']; ?></p>
            <p><strong>Last name: </strong><?php echo $_SESSION['last']; ?></p>
            <p><strong>Username: </strong><?php echo $_SESSION['user']; ?></p>
            <p><strong>Password: </strong><?php echo $_SESSION['pwd']; ?></p>
          </div>
        </div>
       <div class="col-sm-3 hidden-sm"></div>
      </div>
    </div>
  </body>
</html>