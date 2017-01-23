<?php
session_start();
 if (isset($_SESSION["id"])){
    header("Location: homepage.php?uid=".$_SESSION["id"]);
 }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
  </head>

  <body>
    <!--Video-->
    <!--<video class="hidden-xs" src="meetingwfriends.mp4" height="auto" autoplay preload="auto" loop>
  </video>-->
    <!--Navigation-->
    <?php
include "includes/header.php";
?>
      <div class="container-fluid">
        <div class="row row_index">
          <div class="col-md-2 hidden-sm">
          </div>
          <div class="col-md-6 col-sm-12" id='text_index'>
            <h1>Welcome to <span class='text-primary'>ChitChat <i class='fa fa-users'></i><?php if (isset($_SESSION["first"])){echo ", ".$_SESSION["first"];}?></h1></span>
            <h2>Connect with your friends - and other fascinating people. Be a part of our community and you will be just as happy as the people in the video, we are definitely not a cult! Get in-the-moment updates on the things that interest you. And watch events unfold, in real time, from every angle.</h2>
          </div>
          <div class="col-md-4 hidden-sm">
          </div>
        </div>
        <div class="carousel slide text-center" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <h4>"This website is the best. I am so happy now I am a member!"<br><span style="font-style:normal;">Baracco Bama, Ex-President</span></h4>
            </div>
            <div class="item">
              <h4>"One word... WOW!! So much better than twitter or facebook or twitter and facebook combined!"<br><span style="font-style:normal;">Mark Zuckerberg, CEO, ChitChat</span></h4>
            </div>
            <div class="item">
              <h4>"Could I be any more happy with this website?"<br><span style="font-style:normal;">Justin Bieber, member of F.A.G</span></h4>
            </div>
          </div>

          <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <?php
include "includes/footer.php";
?>
  </body>

  </html>