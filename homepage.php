<?php
session_start();
parse_str($_SERVER['QUERY_STRING']);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include 'php/connect.php';
include 'php/cheet.php';
if (!isset($_SESSION['id'])){
  header("Location: ../index.php");
}
$query_getchits = "SELECT * FROM cheets JOIN follow ON cheets.uid = follow.following_id JOIN users on cheets.uid = users.id WHERE follower_id = ".$_SESSION['id']." ORDER BY cheets.date DESC";
$result_getchits = mysqli_query($connection, $query_getchits);
$query_countfollowing = "SELECT COUNT(following_id) AS count, follower_id FROM follow WHERE follower_id = ".$_SESSION['id']." GROUP BY follower_id ";
$result_countfollowing = mysqli_query($connection, $query_countfollowing);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Chitchathomepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </head>

  <body>
		<script>
		
function checkInput(input){
		var val = input.value.length;
		
		$("#remaining").text(parseInt($("#cheet").attr("maxlength")) - val + " characters remaining");
	}
		</script>
    <?php
include "includes/header.php";
    ?>
      <div class='container text-center' style='margin-top:5vh;'>
						<h1 class='text-center'>Message board</h1>
        <div class='row'>
          <div class='col-xs-3'>
            <div class='well tt'>
              <ul class="list-group">
                <h4>Trending Topic</h4>
              <?= trendingTopic($connection)?>
              </ul>
            </div>
          </div>
          <div class='col-xs-6'>
            <?php
if (mysqli_num_rows($result_countfollowing) === 0) { ?>
  								<h1>You are not following anyone</h1>
										<div class='panel panel-default text-left'>
											<div class='panel-body'>
												<div class='form-group'>
													<form action='<?=postCheet($connection, $obj_users)?>' method='POST'>
														<textarea class='form-control' rows='3' name='cheet' placeholder='How are you?' required></textarea>
														<?php
if ($posted == 1){?>
															<div class='alert alert-success alert-dismissable fade in'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
																<strong>Success!</strong> You posted chit.
															</div>
															<?php } ?>
															<button class='btn btn-info' type='submit' name='cheetsubmit'>Post chit</button>
													</form>
												</div>
											</div>
										</div>
<?php }
else { ?>
										<div class='panel panel-default text-left'>
											<div class='panel-body'>
												<div class='form-group'>
													<form action='<?=postCheet($connection, $obj_users)?>' method='POST'>
														<textarea maxlength='200' class='form-control' id='cheet' oninput='checkInput(this)' rows='3' name='cheet' placeholder='How are you?' required></textarea>
														<?php
if ($posted == 1){?>
															<div class='alert alert-success alert-dismissable fade in'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
																<strong>Success!</strong> You posted chit.
															</div>
															<?php } ?>
															<button class='btn btn-info' type='submit' name='cheetsubmit'>Post chit</button>
															<span id='remaining'>200 characters remaining</span>
													</form>
												</div>
											</div>
										</div>				
<?php
while ($obj_getchits = mysqli_fetch_object($result_getchits)){ 
						$string = $obj_getchits->cheet;
						$arr = explode(" ", $string);
						?>
               <div class='media text-left'>
               <div class='media-left'>
                  <img src='../uploads/<?=$obj_getchits->img?>' class='media-object' style='width:45px'>
                </div>
                <div class='media-body'>
                  <a href='http://chitchatonline.esy.es/profile.php?uid=<?php echo $obj_getchits->id ?>'><h6 class='media-heading' style='font-size:110%;'>@<?=$obj_getchits->uname?></a><small><i> <?=$obj_getchits->date?></i></small></h4>
                  <p style='font-size:120%' id='editableChit'><?php 		
							for ($i=0;$i<count($arr);$i++){
								if (substr($arr[$i],0,1)==="#"){
										$arr[$i] = "<a href='http://chitchatonline.esy.es/php/search.php?htag=".substr($arr[$i], 1)."&uid=".$_SESSION['id']."'>".$arr[$i]."</a>"; 
									}
								if (substr($arr[$i],0,1)==="@"){
										$arr[$i] = "<a href='http://chitchatonline.esy.es/php/search.php?tag=".substr($arr[$i], 1)."&uid=".$_SESSION['id']."'>".$arr[$i]."</a>"; 
									}
							}
							$string = implode(" ",$arr);
							echo nl2br($string);?>
									
									<form style='display: inline' action='php/like.php' method='POST'>
										<?=$obj_getchits->likes?>
										<input type='hidden' value='<?=$obj_getchits->cid?>' name ='cid'>
										<input type='hidden' value='<?=$obj_getchits->likes?>' name ='likes'>
										<input type='hidden' value='<?=$actual_link?>' name ='link'>
										<button name='likebtn' type='submit' class='btn' style='border:none'><i class='fa fa-thumbs-o-up'></i></button>
									</form>
									<form style='display: inline' action='php/dislike.php' method='POST'>
										<?=$obj_getchits->dislikes?>
										<input type='hidden' value='<?=$obj_getchits->cid?>' name ='cid'>
										<input type='hidden' value='<?=$obj_getchits->dislikes?>' name ='dislikes'>
										<input type='hidden' value='<?=$actual_link?>' name ='link'>
										<button name='dislikebtn' type='submit' class='btn' style='border:none'><i class='fa fa-thumbs-o-down'></i></button>
									</form>
                </div>
            </div>
                 <?php } 
                 }?>
        </div>
      <div class='col-xs-3'>
        				<div class='list-group'>
									<h4>Popular users</h4>
									<?=popularUsers($connection, $actual_link)?>
								</div>
      </div>
      </div>
				<?php include 'includes/footer.php'; ?>


