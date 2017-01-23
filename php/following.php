<?php
session_start();
include 'connect.php';
//include 'cheet.php';
parse_str($_SERVER['QUERY_STRING']);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$query_following_users2 = "SELECT * FROM users JOIN follow ON users.id = following_id WHERE follower_id =".$uid;
$result_following_users2 = mysqli_query($connection, $query_following_users2);

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Chitchathomepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </head>

  <body>
    <!--Navigation-->
    <?php
include "../includes/header.php";
    ?>
      <div class='container text-center' style='margin-top:5vh;'>
        <div class='row'>
          <div class='col-xs-3'>
          </div>
          <div class='col-xs-6'>
            <?php 
            while ($obj_following_users2=mysqli_fetch_object($result_following_users2)){ ?>
              <div class='list-group-item'>
                <div class='media-left media-middle'>
											<a href="#">
												<img class="media-object" src="../uploads/<?php echo $obj_following_users2->img; ?>" style='width:65px'>
    									</a>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><a href='http://chitchatonline.esy.es/profile.php?uid=<?php echo $obj_following_users2->id ?>'><?php echo $obj_following_users2->uname; ?></a></h6>
              </div> 
              </div> 
            <?php } ?>
          </div>
      <div class='col-xs-3'>
      </div>