<script>
$(document).ready(function(){
  $("#icon-nav").click(function(){
    $(".nav").toggleClass("responsive");
  }); 
});
</script>
<div class='container'>
  <ul class='nav navbar-fixed-top'>
    <li>
      <a href='../index.php'><i class='fa fa-users'></i> Home</a>
    </li>
    <li>
      <a href='php/about.php'><i class='fa fa-info-circle'></i> About</a>
    </li>
<?php
session_start();
if (isset($_SESSION["first"])){?>
    <li>
      <a href='../php/logout.php'><i class='fa fa-sign-out'></i> Logout</a>
    </li>
    <form class='navbar-form navbar-right' action='../php/checkTag.php' method='POST'>
      <div class='form-group'>
        <input type='search' name='searchinput' class='form-control' placeholder='Search users or hashtags'>
      </div>
        <button type='submit' class='btn btn-default'><i class='fa fa-search'></i> Search</button>
    </form>
    <!--<ul class='nav navbar-nav navbar-right'>-->
      <li>
        <a href='http://chitchatonline.esy.es/profile.php?uid=<?=$_SESSION["id"]?>'><i class='fa fa-user-circle-o'></i> <?= $_SESSION["first"] ?></a>
      </li>
      <li id='icon-nav'>
        <a href="javascript:void(0);" onclick="navCollapse()">&#9776;</a>
      </li>
    <!--</ul>-->
<?php }
 else {?>
  <ul class='nav navbar-nav navbar-right'>
    <li><a href='../php/signup_page.php'><i class='fa fa-user'></i> Sign Up</a></li>
    <li id='icon-nav'>
      <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
    </li>
  </ul>
  <form class='navbar-form navbar-right' action='../php/login.php' method='POST'>
    <div class='form-group'>
      <?= $error ?>
      <input type='text' name='uname' class='form-control' placeholder='Username'>
      <input type='password' name='pwd' class='form-control' placeholder='Password'>
    </div>
    <button type='submit' class='btn btn-default'><a href='#'><i class='fa fa-sign-in'></i> Login</a></button>
  </form>
 <?php }
echo "</ul>";
  ?>