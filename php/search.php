<?php
session_start();
include 'connect.php';
include 'cheet.php';
parse_str($_SERVER['QUERY_STRING']);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$query_users = "SELECT * FROM users WHERE id = '$uid'";
//$result_users = mysqli_query($connection, $query_users);
//$obj_users = mysqli_fetch_object($result_users);
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
          <div class='col-xs-7'>
            <?php
if (isset($htag)){
  echo "<h1>Results in chits containing #".$htag."</h1>";
  include 'connect.php';
  $query_htag = "";
  if (isset($tt)){
    $query_htag = "SELECT * FROM cheets JOIN hashtags ON cheets.cid = hashtags.cid JOIN users ON cheets.uid = users.id WHERE hashtags.hashtag = '$htag' GROUP BY cheet, uid";
  } else {
  $query_htag = "SELECT * FROM cheets JOIN hashtags ON cheets.cid = hashtags.cid JOIN users ON cheets.uid = users.id WHERE hashtags.hashtag = '$htag'";
  }
  $result_htag = mysqli_query($connection, $query_htag);
  while ($obj_htag = mysqli_fetch_object($result_htag)){ ?>
              <div class='media text-left'>
                <div class='media-left'>
                  <img src='../uploads/<?=$obj_htag->img?>' class='media-object' style='width:45px'>
                </div>
                <div class='media-body'>
                  <a href='http://chitchatonline.esy.es/profile.php?uid=<?=$obj_htag->id?>'><h6 class='media-heading' style='font-size:110%;'>@<?=$obj_htag->uname?></a><small><i><?=$obj_htag->date?></i></small></h6>
                  <p style='font-size:120%' id='editableChit'><?php echo nl2br($obj_htag->cheet)?></p>
                  <a href='likeChit()'><i class='fa fa-thumbs-o-up'></i>Like</a>
                  <a href='dislikeChit()'><i class='fa fa-thumbs-o-down'></i>Dislike</a>
                  <a href='comment()'>Comment</a>
                </div>
  <?php  
  if ($_SESSION['id']===$obj_htag->uid){ ?>
      <div class='media-right'>
      <a href='' data-toggle='modal' data-target='#editModal' id='editChit'>Edit</a>
      <form action ='#' method='POST'>
        <button class='btn btn-info' name='deletechit' type='submit'>Delete</button>
      </form>
      </div>
<?php  } ?>
<?php } ?>
<?php } ?>
<?php
if (isset($tag)){
  echo "<h1>Users with \"".$tag."\" in their (user)name</h1>";
  include 'connect.php';
  $query_tag = "SELECT * FROM users WHERE uname LIKE '%$tag%' OR first LIKE '%$tag%' OR last LIKE '%$tag%'";
  $result_tag = mysqli_query($connection, $query_tag);
  while ($obj_tag = mysqli_fetch_object($result_tag)){ ?>
    <div class='media text-left'>
      <div class='media-left media-middle'>
        <img src='../uploads/<?=$obj_tag->img?>' class='media-object' style='height:80px'>
      </div>
    <div class='media-body'>
      <a href='http://chitchatonline.esy.es/profile.php?uid=<?php echo $obj_tag->id ?>'><h4 class='media-heading' style='font-size:110%;'>@<?=$obj_tag->uname?></h4></a>
      <h6 class='media-heading' style='font-size:110%;'><?php echo $obj_tag->first." ".$obj_tag->last?></h6>
                  <?php  
  if ($_SESSION['id']!==$obj_tag->id && checkFollowing($obj_tag->id, $connection)!==true){ ?>
                  <form id='followform' action='follow.php' method='POST'>
                    <input type='hidden' value='<?php echo $obj_tag->id; ?>' name ='id'>
                    <input type='hidden' value='<?= $actual_link ?>' name ='link'>
                    <button class='btn btn-info' name='follow' type='submit' id='followbtn'>Follow</button>
                  </form>
                </div>
              <?php  } else if ($_SESSION['id']===$obj_tag->id){echo "</div>";} else { ?>
                          <form action='unfollow.php' method='POST'>
                            <input type='hidden' value='<?php echo $obj_tag->id; ?>' name='id'>
                            <input type='hidden' value='<?= $actual_link ?>' name ='link'>
                            <button class='btn btn-default' type='submit'>Unfollow</button>
                            </form>
                            </div> 
                      <?php } ?>
        <?php } ?>
        <?php } ?>
 
<?php if(isset($search)){
  echo "<h1>Chits containing \"".$search."\" </h1>";
  include 'connect.php';
  $query_search_chits = "SELECT * FROM cheets JOIN users ON cheets.uid = users.id WHERE cheet LIKE '%$search%' OR users.uname = '%$search%'";
  $result_search_chits = mysqli_query($connection, $query_search_chits);
    while ($obj_search_chits = mysqli_fetch_object($result_search_chits)){ ?>
             <div class='media text-left'>
               <div class='media-left'>
                  <img src='../uploads/<?=$obj_search_chits->img?>' class='media-object' style='width:45px'>
                </div>
                <div class='media-body'>
                  <a href='http://chitchatonline.esy.es/profile.php?uid=<?php echo $obj_search_chits->id ?>'><h6 class='media-heading' style='font-size:110%;'>@<?=$obj_search_chits->uname?><small><i><?=$obj_search_chits->date?></i></small></h4></a>
                  <p style='font-size:120%' id='editableChit'><?php echo nl2br($obj_search_chits->cheet)?></p>
                  <a href='likeChit()'><i class='fa fa-thumbs-o-up'></i>Like</a>
                  <a href='dislikeChit()'><i class='fa fa-thumbs-o-down'></i>Dislike</a>
                  <a href='comment()'>Comment</a>
                </div>
  <?php  
  if ($_SESSION['id']===$obj_search_chits->uid){ ?>
      <div class='media-right'>
      <a href='' data-toggle='modal' data-target='#editModal' id='editChit'>Edit</a>
      <form action ='#' method='POST'>
        <button class='btn btn-info' name='deletechit' type='submit'>Delete</button>
      </form>
      </div>
  
<?php } ?> 
<?php } ?> 
<?php } ?> 
        </div>
       </div>
      </div>

      <div class='col-xs-2'>
      </div>
      </div>

      <!--
if (isset($htag)){
  $query_htag = "SELECT * FROM cheets JOIN hashtags ON cheets.cid = hashtags.cid";# WHERE hashtags.hashtag = '$htag'";
  $result_htag = mysqli_query($connection, $query_htag);
  $obj_htag = mysqli_fetch_object($result_htag);
  while ($obj_htag){
    echo $obj_htag->cheet;
  }
}
if (isset($tag)){
  $query_tag = "SELECT * FROM users WHERE uname = '$tag'";
  $result_tag = mysqli_query($connection, $query_tag);
  $obj_tag=mysqli_fetch_object($result_tag);
  while ($obj_tag){
    echo $obj_tag->uname.$obj_tag->first.$obj_tag->last;
  }
}
else {
  $query = "SELECT * FROM cheets WHERE cheet LIKE '%test%'";
  $result = mysqli_query($connection, $query);
  $obj = mysqli_fetch_object($result);
  while ($obj){
    echo $obj->cheet;
  }
}*/
?>