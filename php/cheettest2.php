<?php
session_start();
parse_str($_SERVER['QUERY_STRING']);
$query_users = "SELECT * FROM users WHERE id = '$uid'";
$result_users = mysqli_query($connection, $query_users);
$obj_users = mysqli_fetch_object($result_users);

function postCheet($connection, $obj_users){
  if (isset($_POST["cheetsubmit"])){
    include "connect.php";
    $cheet = mysqli_real_escape_string($connection, $_POST["cheet"]);
    $date = date("Y-m-d H:i:s");
    $uid = $obj_users->id;
    $query_postcheet = "INSERT INTO cheets (uid, date, cheet) VALUES ('$uid', '$date', '$cheet')";
    $result = mysqli_query($connection, $query_postcheet);    
    $query_cheettest = "SELECT * FROM cheets WHERE cheet = '$cheet' AND date = '$date'";
    $result_cheettest = mysqli_query($connection, $query_cheettest);
    $obj_cheettest = mysqli_fetch_object($result_cheettest);
    $exploded_cheet = explode (" ", $cheet);
      for ($i=0; $i<count($exploded_cheet);$i++){
        if(preg_match("/^#/", $exploded_cheet[$i])){
          $htag_content = substr($exploded_cheet[$i],1);
          $cid = $obj_cheettest->cid;
          $query_hashtag = "INSERT INTO hashtags (hashtag, cid) VALUES ('$htag_content', '$cid')";
          $result_hashtag = mysqli_query($connection, $query_hashtag);
        }
    }
      for ($i=0; $i<count($exploded_cheet);$i++){
        if(preg_match("/^@/", $exploded_cheet[$i])){
          $tag_content = substr($exploded_cheet[$i],1);
          $cid = $obj_cheettest->cid;
          $query_tag = "INSERT INTO tags (tag, cid) VALUES ('$tag_content', '$cid')";
          $result_tag = mysqli_query($connection, $query_tag);
        }
    }
    header("Location: ../profile.php?uid=".$_SESSION["id"]."&posted=1");
  }
}
$query_cheets = "SELECT * FROM cheets WHERE uid = '".$obj_users->id."' ORDER BY date DESC";
$result_cheets = mysqli_query($connection, $query_cheets);

function getCheets($connection, $obj_users, $result_cheets){
  include "connect.php";
  parse_str($_SERVER['QUERY_STRING']);
  while ($obj_cheets = mysqli_fetch_object($result_cheets)){
    $exploded_cheet = explode ($obj_cheets->cheet, " ");  
    for ($i=0; $i<count($exploded_cheet);$i++){
        if(preg_match("/^#/", $exploded_cheet[$i])){
          $linkhtag = "<a href='#'>".$exploded_cheet[$i]."</a>";
        }
    }
    echo "<div class='media text-left'>
    <div class='media-left'>
      <img src='".$obj_users->img."' class='media-object' style='width:45px'>
    </div>
    <div class='media-body'>
      <h6 class='media-heading' style='font-size:110%;'>@".$obj_users->uname." ".$obj_cheets->cid."<small><i> $obj_cheets->date</i></small></h4>
      <p style='font-size:120%'>".nl2br($obj_cheets->cheet)."</p>
      <a href='likeChit()'><i class='fa fa-thumbs-o-up'></i>Like</a>
      <a href='dislikeChit()'><i class='fa fa-thumbs-o-down'></i>Dislike</a>
      <a href='comment()'>Comment</a>
      </div>";
      if ($_SESSION['id']===$obj_cheets->uid){
      echo "<div class='media-right'>
      <a href='' data-toggle='modal' data-target='#editModal'>Edit</a>
      <form action ='#' method='POST'>
        <button name='deletechit' type='submit'>Delete</button>
      </form>
       <div id='editModal' class='modal fade' role='dialog'>
       <div class='modal-dialog'>

          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal'>&times;</button>
              <h4 class='modal-title'>Edit chit</h4>
            </div>
            <div class='modal-body'>
              <form action=''>
              <input type='text' value='".$obj_cheets->cid."' name='newContent'></input>
              <button type='submit' class='btn btn-info' data-dismiss='modal'>Edit</button>
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
      </div>";
      }
      echo "</div>";
  }
}
?>