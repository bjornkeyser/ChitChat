<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Chitchathomepage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <!--Video-->
  <video class="hidden-xs" src="https://fpdl.vimeocdn.com/vimeo-prod-skyfire-std-us/01/2237/7/186188011/615251856.mp4?token=584c548c_0x6e9b56b843b72577175dabd61510f76d14678e24" height="auto" autoplay preload="auto" loop>
  </video>
  <!--Navigation-->
  <?php
include "../includes/header.php";
?>
    <div class="container-fluid">
      <div class="row row_signup">
        <div class="col-xs-2">
        </div>
        <div class="col-xs-6">
          <form action='signup.php' method='POST'>
            <h1>New to ChitChat? Sign up</h1>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
              <input type="text" class="form-control" name="first" placeholder="First name">
              <input type="text" class="form-control" name="last" placeholder="Last name">
              <input type="text" class="form-control" name="uname" placeholder="Username">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <input pattern=".{5,50}" required title="5 to 50 characters" type="password" class="form-control" name="pwd" placeholder="Password">
              <input pattern=".{5,50}" required title="5 to 50 characters" type="password" class="form-control" name="pwdconf" placeholder="Password confirmation">
            </div>
              <button class='btn btn-info' type='submit'>Sign up</button>
            </div>
            <div class="col-xs-4">
            </div>
          </form>
        </div>
        <?php
include "../includes/footer.php";
?>
</body>

</html>