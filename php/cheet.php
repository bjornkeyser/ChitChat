<?php
session_start();
parse_str($_SERVER['QUERY_STRING']);
include 'connect.php';
$query_users = "SELECT * FROM users WHERE id = '$uid'";
$result_users = mysqli_query($connection, $query_users);
$obj_users = mysqli_fetch_object($result_users);

$query_following = "SELECT COUNT(follower_id) AS following FROM follow WHERE follower_id = ".$uid;
$result_following = mysqli_query($connection, $query_following);
$obj_following = mysqli_fetch_object($result_following);

$query_followers = "SELECT COUNT(following_id) AS followers FROM follow WHERE following_id =".$uid;
$result_followers = mysqli_query($connection, $query_followers);
$obj_followers = mysqli_fetch_object($result_followers);

$query_following_users = "SELECT * FROM users JOIN follow ON users.id = following_id WHERE follower_id =".$uid;
$result_following_users = mysqli_query($connection, $query_following_users);
$obj_following_users = mysqli_fetch_object($result_following_users);

$query_followers_users = "SELECT * FROM users JOIN follow ON users.id = follower_id WHERE following_id =".$uid;
$result_followers_users = mysqli_query($connection, $query_followers_users);
$obj_followers_users = mysqli_fetch_object($result_followers_users);

function postCheet($connection, $obj_users){
  if (isset($_POST["cheetsubmit"])){
    include "connect.php";
    $notsafe = mysqli_real_escape_string($connection, $_POST["cheet"]);
		//$cheet = htmlspecialchars(addslashes($notsafe));
		$cheet = addslashes(htmlspecialchars($notsafe));
    $date = date("Y-m-d H:i:s");
    $uid = $obj_users->id;
    $query_postcheet = "INSERT INTO cheets (uid, date, cheet) VALUES ('".$_SESSION['id']."', '$date', '$cheet')";
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
$query_cheets = "select *, cheets.cid as cheetid from cheets left join tags on cheets.cid = tags.cid join users on users.id = cheets.uid where uid= ".$obj_users->id." or tags.tag = '".$obj_users->uname."' order by cheets.date desc";
$result_cheets = mysqli_query($connection, $query_cheets);

function getCheets($connection, $obj_users, $result_cheets, $actual_link){
  include "connect.php";
  parse_str($_SERVER['QUERY_STRING']);
  while ($obj_cheets = mysqli_fetch_object($result_cheets)){
		$string = stripslashes(str_replace("\r\n","<br />",(nl2br($obj_cheets->cheet))));
		$arr = explode(" ", $string);
    echo "<div class='media text-left'>
    <div class='media-left'>
      <img src='"."../uploads/".$obj_cheets->img."' class='media-object' style='width:45px'>
    </div>
    <div class='media-body'>
      <h6 class='media-heading' style='font-size:110%;'><a href='http://chitchatonline.esy.es/profile.php?uid=$obj_cheets->id'>@".$obj_cheets->uname."</a><small><i> $obj_cheets->date</i></small></h4>
      <p style='font-size:120%'>";
		for ($i=0;$i<count($arr);$i++){
			if (substr($arr[$i],0,1)==="#"){
					$arr[$i] = "<a href='http://chitchatonline.esy.es/php/search.php?htag=".substr($arr[$i], 1)."&uid=".$_SESSION['id']."'>".$arr[$i]."</a>"; 
				}
			if (substr($arr[$i],0,1)==="@"){
					$arr[$i] = "<a href='http://chitchatonline.esy.es/php/search.php?tag=".substr($arr[$i], 1)."&uid=".$_SESSION['id']."'>".$arr[$i]."</a>"; 
				}
		}
$string = implode(" ",$arr);
echo $string."</p >";
			echo "
      <form style='display: inline' action='php/like.php' method='POST'>
				".$obj_cheets->likes."
				<input type='hidden' value='".$obj_cheets->cheetid."' name ='cid'>
				<input type='hidden' value='".$actual_link."' name ='link'>
				<button name='likebtn' type='submit' class='btn' style='border:none'><i class='fa fa-thumbs-o-up'></i></button>
			</form>
      <form style='display: inline' action='php/dislike.php' method='POST'>
				".$obj_cheets->dislikes."
				<input type='hidden' value='".$obj_cheets->cheetid."' name ='cid'>
				<input type='hidden' value='".$actual_link."' name ='link'>
				<button name='dislikebtn' type='submit' class='btn' style='border:none'><i class='fa fa-thumbs-o-down'></i></button>
			</form>
      <a href='#' id='comment'>Comment</a>
     </div>";
      if ($_SESSION['id']===$obj_cheets->uid){
      echo "<div class='media-right'>
      <a href='' data-toggle='modal' data-target='#editModal'>Edit</a>
      <form action ='php/deletechit.php' method='POST'>
        <input type='hidden' value='".$obj_cheets->cheetid."' name ='cid'></input>
        <button class='btn btn-info' name='deletechit' type='submit'>Delete</button>
      </form>
       <div id='editModal' class='modal fade' role='dialog'>
       <div class='modal-dialog'>

          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal'>&times;</button>
              <h4 class='modal-title'>Edit chit</h4>
            </div>
            <div class='modal-body'>
              <form action='php/editchit.php' method='POST'>
              <input type='text' name='newContent'></input>
              <input type='hidden' value='".$obj_cheets->cheetid."' name='cid'></input>
              <button type='submit' class='btn btn-info'>Edit</button>
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
</div>
      </div>";
      }
		}
      echo "</div></div>";
  }
function popularUsers($connection, $actual_link){
  include 'connect.php';
  $query_popular = "SELECT COUNT( following_id ) AS followers, following_id, users.* FROM follow JOIN users ON following_id = users.id GROUP BY following_id ORDER BY followers DESC LIMIT 5";
  $result_popular = mysqli_query($connection, $query_popular);
  while ($obj_popular = mysqli_fetch_object($result_popular)){ ?>
  									<div class="list-group-item">
  									<div class="media-left media-middle">
											<a href="#">
												<img class="media-object" src="uploads/<?php echo $obj_popular->img; ?>" style='width:65px'>
    									</a>
  									</div>
										<div class="media-body">
											<h6 class="media-heading"><a href='http://chitchatonline.esy.es/profile.php?uid=<?php echo $obj_popular->id ?>'><?php echo $obj_popular->uname; ?></a></h6>
<?php
  if ($_SESSION['id']!==$obj_popular->id && checkFollowing($obj_popular->id, $connection)!==true){ ?>
                  <form id='followform' action='php/follow.php' method='POST'>
                    <input type='hidden' value='<?php echo $obj_popular->id; ?>' name ='id'>
                    <input type='hidden' value='<?= $actual_link ?>' name ='link'>
                    <button class='btn btn-info' name='follow' type='submit' id='followbtn'>Follow</button>
                  </form>
                </div>
								</div>
              <?php  } else if ($_SESSION['id']===$obj_popular->id){echo "</div></div>";} else { ?>
                          <form action='php/unfollow.php' method='POST'>
                            <input type='hidden' value='<?php echo $obj_popular->id; ?>' name='id'>
														<input type='hidden' value='<?= $actual_link ?>' name ='link'>
                            <button class='btn btn-default' type='submit'>Unfollow</button>
                            </form>
                            </div>
														</div> 
 <?php } } 
} 
function trendingTopic($connection){
	include 'connect.php';
	echo"Last few days";
	//$query_trending = "SELECT COUNT(hashtag) AS count, hashtag FROM hashtags JOIN cheets ON cheets.cid = hashtags.cid WHERE date >= curdate() - INTERVAL DAYOFWEEK(curdate())+1 DAY
//AND date <= curdate() GROUP BY hashtag ORDER BY count DESC LIMIT 5";
	$query_trending = "SELECT COUNT(hashtag) AS count, hashtag FROM hashtags JOIN cheets ON cheets.cid = hashtags.cid GROUP BY hashtag ORDER BY count DESC LIMIT 5";
	$result_trending = mysqli_query($connection, $query_trending);
	while ($obj_trending = mysqli_fetch_object($result_trending)){ ?>
		<a href='http://chitchatonline.esy.es/php/search.php?htag=<?php echo $obj_trending->hashtag; ?>&uid=<?php echo $_SESSION['id'] ?>&tt=1'>
			<li class='list-group-item'>#<?php echo mb_strimwidth("$obj_trending->hashtag", 0, 18, "..."); ?><span class='badge'><?php echo $obj_trending->count; ?></span>
			</li>
		</a>
	<?php }
}
function checkFollowing($followingid, $connection){
  $query_checkfollow = "SELECT * FROM follow WHERE follower_id = ".$_SESSION['id']." and following_id = ".$followingid;
  $result_checkfollow = mysqli_query($connection, $query_checkfollow);
  if (mysqli_num_rows($result_checkfollow) > 0){
    return true;
  } else{
    return false;
  }
}
function likeChit($connection, $cid){
  if (isset($_POST['likebtn'])){
  $query_like = "UPDATE cheets SET likes = 1 WHERE cid = $cid";
  $result_likes = mysqli_query($connection, $query_like);
  echo "succes";
    }
}
function dislikeChit($connection, $cid){
  if (isset($_POST['dislikebtn'])){
  $query_dislike = "INSERT INTO cheets (dislikes) VALUES (1) WHERE cid = $cid";
  $result_dislike = mysqli_query($connection, $query_dislike);
  echo "succes";
  }
}
?>
