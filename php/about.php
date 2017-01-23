<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Chitchatabout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../css/style.css">
</head>
<script>
$(document).ready(function(){
  $(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});
});
</script>
<style>
  .jumbotron {
    background-color: #5e9bff;
    color: #ffffff;
    padding: 100px 25px;
  }
  
  .container-fluid {
    padding: 60px 50px;
  }
  
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  
  .logo-small {
    color: #5e9bff;
    font-size: 50px;
  }
  
  .logo {
    color: #5e9bff;
    font-size: 200px;
  }
  
  .carousel-control.right,
  .carousel-control.left {
    background-image: none;
    color: #5e9bff;
  }
  
  .carousel-indicators li {
    border-color: #5e9bff;
  }
  
  .carousel-indicators li.active {
    background-color: #5e9bff;
  }
  
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  
  .item span {
    font-style: normal;
  }
  
  .panel {
    border: 1px solid #5e9bff;
    border-radius: 0;
    transition: box-shadow 0.5s;
  }
  
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
  }
  
  .panel-footer .btn:hover {
    border: 1px solid #5e9bff;
    background-color: #fff !important;
    color: #5e9bff;
  }
  
  .panel-heading {
    color: #fff !important;
    background-color: #5e9bff !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  
  .panel-footer {
    background-color: #fff !important;
  }
  
  .panel-footer h3 {
    font-size: 32px;
  }
  
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #5e9bff;
    color: #fff;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
}

/* Go from 0% to 100% opacity (see-through) and specify the percentage from when to slide in the element along the Y-axis */
@keyframes slide {
    0% {
        opacity: 0;
        transform: translateY(70%);
    }
    100% {
        opacity: 1;
        transform: translateY(0%);
    }
}
@-webkit-keyframes slide {
    0% {
        opacity: 0;
        -webkit-transform: translateY(70%);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0%);
    }
}
</style>
</style>

<body>
  <?php
  include "../includes/header.php";
?>
    <div class='container-fluid text-center slide' style='margin-top:5vh;'>
      <div class="jumbotron">
        <h1>ChitChat</h1>
        <p>We specialize in blablabla</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8">
          <h2>About Company Page</h2>
          <h4>Lorem ipsum..</h4>
          <p>Lorem ipsum..</p>
          <button class="btn btn-default btn-lg">Get in Touch</button>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-signal logo"></span>
        </div>
      </div>
    </div>

    <div class="container-fluid bg-grey">
      <div class="row">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-globe logo"></span>
        </div>
        <div class="col-sm-8">
          <h2>Our Values</h2>
          <h4><strong>MISSION:</strong> Our mission lorem ipsum..</h4>
          <p><strong>VISION:</strong> Our vision Lorem ipsum..</p>
        </div>
      </div>
    </div>
    <div class="container-fluid text-center">
      <h2>SERVICES</h2>
      <h4>What we offer</h4>
      <br>
      <div class="row">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-off logo-small"></span>
          <h4>POWER</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-heart logo-small"></span>
          <h4>LOVE</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-lock logo-small"></span>
          <h4>JOB DONE</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-leaf logo-small"></span>
          <h4>GREEN</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-certificate logo-small"></span>
          <h4>CERTIFIED</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-wrench logo-small"></span>
          <h4>HARD WORK</h4>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>
      </div>
    </div>
    <h2 class='text-center'>What our customers say</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
        </div>
        <div class="item">
          <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
        </div>
        <div class="item">
          <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container-fluid">
      <div class="text-center">
        <h2>Pricing</h2>
        <h4>Choose a payment plan that works for you</h4>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Basic</h1>
            </div>
            <div class="panel-body">
              <p><strong>20</strong> Lorem</p>
              <p><strong>15</strong> Ipsum</p>
              <p><strong>5</strong> Dolor</p>
              <p><strong>2</strong> Sit</p>
              <p><strong>Endless</strong> Amet</p>
            </div>
            <div class="panel-footer">
              <h3>$19</h3>
              <h4>per month</h4>
              <button class="btn btn-lg">Sign Up</button>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Pro</h1>
            </div>
            <div class="panel-body">
              <p><strong>50</strong> Lorem</p>
              <p><strong>25</strong> Ipsum</p>
              <p><strong>10</strong> Dolor</p>
              <p><strong>5</strong> Sit</p>
              <p><strong>Endless</strong> Amet</p>
            </div>
            <div class="panel-footer">
              <h3>$29</h3>
              <h4>per month</h4>
              <button class="btn btn-lg">Sign Up</button>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Premium</h1>
            </div>
            <div class="panel-body">
              <p><strong>100</strong> Lorem</p>
              <p><strong>50</strong> Ipsum</p>
              <p><strong>25</strong> Dolor</p>
              <p><strong>10</strong> Sit</p>
              <p><strong>Endless</strong> Amet</p>
            </div>
            <div class="panel-footer">
              <h3>$49</h3>
              <h4>per month</h4>
              <button class="btn btn-lg">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  include "../includes/footer.php";
?>
      <div class='container-fluid'>
        <div class='text-center'>
          <h2>Team</h2>
          <h4>Meet our incredible team</h4>
        </div>
        <div class='row'>
          <div class='col-sm-6'>
            <h4>Direction</h4>
            <div class='row'>
              <div class='col-sm-6'>
                <a href='#'>Bjorn Keyser</a><br> CEO <br>
                <a href='#'>Bjorn Keyser</a><br> COO <br>
                <a href='#'>Bjorn Keyser</a><br> CFO <br>
              </div>
              <div class='col-sm-6'>
                <a href='#'>Bjorn Keyser</a><br> CTO <br>
                <a href='#'>Bjorn Keyser</a><br> CMO <br>
                <a href='#'>Bjorn Keyser</a><br> CAO <br>
              </div>
            </div>
          </div>
          <div class='col-sm-6'>
            <ul>
              <li>Bjorn Keyser: CEO, ChitChat</li>
              <li>B. Keyser: Executive Chairman</li>
              <li>Mr. Keyser: Marketing, ChitChat</li>
              <li>Bjorn K. : Founder, ChitChat</li>
              <li>Dr. Bjorn Keyser: Chief Executive Officer, ChitChat</li>
              <li>Bjorn Keyser: Chairman and Co-Founder, ChitChat</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container-fluid bg-grey">
        <h2 class="text-center">CONTACT</h2>
        <div class="row">
          <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Arnhem, NL</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 12345678</p>
            <p><span class="glyphicon glyphicon-envelope"></span> bjornkeyser@shemail.com</p>
          </div>
          <div class="col-sm-7">
            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
              </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
              <div class="col-sm-12 form-group">
                <button class="btn btn-default pull-right" type="submit">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Set height and width with CSS -->
      <div id="googleMap" style="height:400px;width:100%;"></div>

      <!-- Add Google Maps -->
      <script src="http://maps.googleapis.com/maps/api/js"></script>
      <script>
        var myCenter = new google.maps.LatLng(41.878114, -87.629798);

        function initialize() {
          var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: true,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };

          var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

          var marker = new google.maps.Marker({
            position: myCenter,
          });

          marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
      </script>
      <?php
  include '../includes/footer.php';
?>

</body>

</html>