<?php

	$str_hostname = "localhost";
	$str_username = "root";
	$str_password = "";
  $str_dbname = "bgc_db";

	$obj_con = mysqli_connect($str_hostname,$str_username,$str_password,$str_dbname);

	if(!$obj_con){
		header("error.php");
		exit();
	}

	mysqli_query($obj_con,"SET NAMES UTF8");

	//$str_sql = "SELECT tv_id,tv_name,tvb_name,tv_pic,tv_price,tvs_name FROM (tb_tv INNER JOIN tb_tvbrand ON tv_brand=tvb_id) INNER JOIN tb_tvsale ON tv_sale=tvs_id";

	$str_sql = "SELECT game_id,game_name,num_players,play_time,game_category,game_weight,game_preview,game_desc FROM games_tb ORDER BY `game_name` ASC";

	//$str_sql = "SELECT FROM players ORDER BY player_id DESC"
	$obj_rs = mysqli_query($obj_con,$str_sql);

	
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel='icon' href='img/favicon.ico' type='image/x-icon'/>

  <title>MUIC Co-Working Space</title>

  <!-- Font Awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <link href="css/gallery.css" rel="stylesheet">
  <link href="css/upevent.css" rel="stylesheet">
  <link href="css/btt.css" rel="stylesheet">

  <style>
    html {
    scroll-behavior: smooth;
    }
  </style>

</head>

<body>

  <div style="width:100%; height: 5px; background-color : black;"></div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div style="margin:auto;">
    <h1 style="text-align: center;font-size: 50px;"><a href="index.html" style="color:black;">Board Game Service <br></a></h1>
      <p style="color:black;font-size:15px;text-align: center;">In cooperation with MUIC Library, Student Affairs and
        Board Game Club</p>
    </div>
  </nav>

  <!-- Navigation -->
  <div style="width:100%; height: 5px; background-color : black;"></div>

  <!-- Page Content -->
  <div class="container">

    <!-- Home Section -->
    <section id="home">
    <header class="jumbotron my-4">
      <h2 style="text-align: center;">Rules and Regulations</h2>
      <p style="font-weight: bold;">1. ONLY 1 board game is allowed to check out under 1 student/staff ID card. <br><span style="color: red;"> Staff must keep
        the student/staff ID card until the game is returned.</span></p>
      <p style="font-weight: bold;">2. The set of game that has been already checked out must be returned
        before check out the new
        one.</p>
      <p style="font-weight: bold;">3. Board game must be returned to the Co-Working Space in the same day
        of checking out.</p>
      <p style="font-weight: bold;">4. User who return the game over due date will be fined 100 baht/day.
      </p>
      <p style="font-weight: bold;">5. Lost or damage, user must be responsible for the actual cost with
        300 baht for library process
        fee.</p>
    </header>
    </section>
    <!-- End of Home Section -->

    <!-- TAG 

    <div style="width: auto; height: 30px; align-content: center; margin: 10px 0px;border: 1px solid grey">
      <div style="margin: 0px 5px;">
        <span class="badge badge-danger"><i class="fas fa-fire" aria-hidden="true"></i> HOT </span>
        <span class="badge badge-success"><i class="fas fa-bell" aria-hidden="true"></i> NEW </span>  
        <span class="badge badge-primary"><i class="fas fa-bookmark" aria-hidden="true"></i> MUST TRY </span> 
        <span class="badge badge-secondary"> ??? </span> 
        <span class="badge badge-warning"> ??? </span>
        <span class="badge badge-info"> ??? </span>
        <span class="badge badge-light"> ??? </span>
        <span class="badge badge-dark"> ??? </span>

      </div>
    </div>

    -->

    <!-- Page Features -->

    <!-- Games Section -->
    <section id="games">
    <div style="width: auto; height: 50px; align-content: center; margin: 20px 0px">
      <h1 style="font-size: 40px; color: black; text-align: center;"> <b> Board Games We Have</b></h1>
    </div>
    <br>
    <br>

    <div class="row text-center">
      
    <?php while ($row = mysqli_fetch_array($obj_rs)) { ?>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 on-hover on-hover">
          <img class="card-img-top" src="img/<?= $row['game_preview']?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?= $row['game_name']?></h4>
            <p class="card-text">
              <i class="fas fa-users"></i> : <?= $row['num_players']?> Players 
              <br>
              <i class="far fa-clock"></i> : <?= $row['play_time']?> Minutes
              <br>
              <i class="fas fa-asterisk"></i> : <?= $row['game_category']?>
              <br>
              <i class="fas fa-balance-scale"></i> : <?= $row['game_weight']?>
            </p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#aeonsend">Find Out More !</button>
            <!-- Modal -->
            <!--  
            <div class="modal fade" id="aeonsend" tabindex="-1" role="dialog" aria-labelledby="aeonendTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="aeonsend"><?= $row['game_name']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p> <?= $row['game_desc']?> </p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"> Close </span>
                  </div>
                </div>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    
    <!-- /.row -->

  </div>
  <!-- /.container -->


  </section>
  <!-- End of Games Section -->


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"><h2 style="text-align: center; font-size: 20px; font-family: 'Open+Sans', sans-serif;"> Copyright © 2020 <a style="text-decoration: none; color: black;" href="http://parattapon.com"> <i class="fa fa-spin fa-cog" aria-hidden="true"></i><b> Parattapon Dandsinphan (Ryuu) 6080169 </b> <i class="fa fa-spin fa-cog" aria-hidden="true"></i> </a></h2></p>
      <!-- <p class="m-0 text-center" style="font-color: black;"> <b> Last Updated : 4<sup>th</sup> January 2020 </b></p> -->
      <p class="m-0 text-center" style="color: black;"> <b> Last Modified on <span id="lastmod"></span></b></p>


    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script>
  document.getElementById("lastmod").innerHTML = document.lastModified;
  </script>

  <!-- Modal -->
  <div class="modal fade" id="announcementpopup" tabindex="-1" role="dialog" aria-labelledby="announcementpopupTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="announcementpopup">Upcoming Events</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="blog-home2">
                  <div class="container">
                    <!-- Row  -->
                    <div class="row justify-content-center">
                      <!-- Column -->
                      <div class="col-md-8 text-center">
                      </div>
                      <!-- Column -->
                      <!-- Column -->
                    </div>
                    <div class="row mt-4">
                      <!-- Column -->
                      <div class="col-md-4 on-hover">
                        <div class="card border-0 mb-4">
                          <a href="#"><img class="card-img-top" src="img/event_weekly.png" alt="wrappixel kit"></a>
                          <h5 class="font-weight-medium mt-3"> Weekly Session </h5>
                          <p class="mt-3">Tuesday & Wednesday</p>
                          <p class="mt-3">Time :  14:00 - 18:00 </p> <br>
                          <p class="mt-3">Venue : Aditayathorn Building, Ground Floor  <br> (In front of 7-11)</p>
                        </div>
                      </div>
                      <!-- Column -->
                      <div class="col-md-4 on-hover">
                        <div class="card border-0 mb-4">
                          <a href="#"><img class="card-img-top" src="img/event_splendor.png" alt="wrappixel kit"></a>
                          <div
                            class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
                            JAN<span class="d-block">30</span></div>
                          <h5 class="font-weight-medium mt-3"> Gem of Splendor Tournament</h5>
                          <p class="mt-3">Time : 16:00 - 18:00</p> <br>
                          <p class="mt-3">Venue : Aditayathorn Bldg., G Floor, Near 7-11 </p>
                          <p class="mt-3" style="font-weight: bold;color: red;">EVENT ENDED</p>
                        </div>
                      </div>
                      <!-- Column -->
                      <div class="col-md-4 on-hover">
                        <div class="card border-0 mb-4">
                          <a href="#"><img class="card-img-top" src="img/event_werewolf-night.png" alt="wrappixel kit"></a>
                          <div class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">MM<span class="d-block">DD</span></div>
                          <h5 class="font-weight-medium mt-3">Werewolf Night</a></h5> <br>
                          <p class="mt-3">Time : TBA </p> <br>
                          <p class="mt-3">Venue : TBA </p>
                          <a href="#" class="text-decoration-none linking text-themecolor mt-2">Register</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: auto;">
                  <span> Close </span>
                </button>
              </div>
          </div>
      </div>
    </div>
  <!-- End Modal -->


<!-- Back to Top -->
  <button onclick="topFunction()" id="btt" title="Go to top" style="border: 2px solid black">
    <i class="fas fa-arrow-up"></i> <br>
    Back to Top
  </button>  

  <script>
        //Get the button:
    backtotop = document.getElementById("btt");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backtotop.style.display = "block";
      } else {
        backtotop.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    } 
  </script>

  <script>
    $(document).ready(function(){
    $(this).scrollTop(0);
    });
  </script>

  <script>
    $(window).on('load', function () {
    $('#announcementpopup').modal('show');
    });
  </script>

</body>

</html>
