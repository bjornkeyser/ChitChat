<?php
session_start();
include 'php/connect.php';

include 'php/cheet.php';

parse_str($_SERVER['QUERY_STRING']);
/*echo "url uname=".$uname."<br />";
echo "sessie user =".$_SESSION["user"]."<br />";
echo "sessie email=".$_SESSION["email"]."<br />";
echo "sessie wachtwoord=".$_SESSION["pwd"]."<br />";
echo "sessie id=".$_SESSION["id"]."<br />";
echo "sessie img=".$_SESSION["img"]."<br />";*/
$query = "SELECT * FROM users WHERE uname = '$uname'";
$result = mysqli_query($connection, $query, MYSQLI_ASSOC);

if (!$obj = mysqli_fetch_object($result))
	{
	header("Location :404.php");
	}

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
include "includes/header.php";

?>
			<!--Container-->
			<div class='container-fluid text-center' style='margin-top:5vh;'>
				<h1>
<?php if ($uname === $_SESSION['user'])
	{
	echo "Hi there, ";
	} ?>
				<?=$obj->first?> <?=$obj->last?></h1>
				<p style='color:grey'>@
					<?=$obj->uname?>
						<div class='row'>
							<div class='col-sm-3 well'>
								<div class='well'>
									<h5><?=$obj->first?> <?=$obj->last?></h5>
									<p><a href='php/myprofile.php'>Profile</a></p>
									<img src='<?=$obj->img?>' class='img-circle' height='65' width='65' alt='Avatar'>
									<p>
										<?=$obj->email?>
									</p>
									<p>
										<?=$obj->uname?>
									</p>
								</div>
								<div class='well'>
									<p><a href='#'>Interests</a></p>
									<p>
										<span class='label label-default'>News</span>
										<span class='label label-primary'>W3Schools</span>
										<span class='label label-success'>Labels</span>
										<span class='label label-info'>Football</span>
										<span class='label label-warning'>Gaming</span>
										<span class='label label-danger'>Friends</span>
									</p>
								</div>
								<div class='alert alert-success fade in'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
									<p><strong>Ey!</strong></p>
									People are looking at your profile. Find out who.
								</div>
								<p><a href='#'>Link</a></p>
								<p><a href='#'>Link</a></p>
								<p><a href='#'>Link</a></p>
							</div>
							<div class='col-sm-7'>

								<div class='row'>
									<div class='col-sm-12'>
										<div class='panel panel-default text-left'>
											<div class='panel-body'>
												<div class='form-group'>
													<form action='<?=postCheet($connection, $obj_users)?>' method='POST'>
														<textarea class='form-control' rows='3' name='cheet' placeholder='How are you?' required></textarea>
														<?php
if ($posted == 1){?>
															<div class='alert alert-success alert-dismissable'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
																<strong>Success!</strong> You posted chit.
															</div>
															<?php } ?>
															<button class='btn btn-info' type='submit' name='cheetsubmit'>Post chit</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div><?=getCheets($connection, $obj_users, $result_cheets)?>
							</div>
							<div class='col-sm-2'>
								<div class='list-group'>
									<a href='#' class='list-group-item'>Cras justo odio</a>
									<a href='#' class='list-group-item'>Dapibus ac facilisis in</a>
									<a href='#' class='list-group-item'>Morbi leo risus</a>
									<a href='#' class='list-group-item'>Porta ac consectetur ac</a>
									<a href='#' class='list-group-item'>Vestibulum at eros</a>
								</div>
							</div>
							<!--Footer-->
							<?php
include "includes/footer.php";

?>
	</body>

	</html>