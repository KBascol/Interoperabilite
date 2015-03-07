<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Find Your Way</title>

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/freelancer.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/family=Montserrat400700.css" rel="stylesheet" type="text/css">
  <link href="css/family=Lato400700400italic700italic.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../index.html">Find Your Way</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                  <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                  <a href="">Périmètre</a>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
        <!-- Navigation end -->

        <!-- Header -->
        <header>
          <div class="container" style="padding-top:115px; padding-bottom:0px;">
            <div class="row">
              <div class="col-lg-12">
                <div class="intro-text">
                  <span class="name">Cinéma Alhambra</span>
                  <hr class="star-light">
                  <p>votre avis nous améliore</p>
                  <?php include('vote.php'); ?>
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- Section -->

        <section>
          <div class="container">

			<?php 
				if($_GET["q"] == "movie_theater"){
			?>
            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                    <img class="media-object" src="img/50n.jpg" alt="..." style="height: 237px; width:160px;">
                </div>
                <div class="media-body" style="font-size:13px;">
                  <h4 class="media-heading">Cinquante Nuances de Grey</h4>
                  <span>L'histoire d'une romance passionnelle, et sexuelle, entre un jeune homme riche amateur de femmes, et une étudiante vierge de 22 ans.</span><br>
                  <b>Date de sortie : </b><span>11 février 2015 (2h5min)</span><br>
                  <b>Réalisé par : </b><span>Sam Taylor-Johnson</span><br>
                  <b>Genre : </b><span>Erotique , Drame , Romance</span><br>
                  <b>Nationalité : </b><span>Américain</span><br>
                  <b>Horaires et séances : </b><br>
                  <ul>
                    <li><b>Vendredi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Samedi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Dimanche : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span></li>
                    <li><b>Lundi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Mardi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>
			<?php
				} else if($_GET["q"] == "library"){
					include ("recherche.php");

					for($i = 0; $i< $size; $i++) {
			?>

            <!-- un row qui contient les information d'un livre -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                    <img class="media-object" src="<?php echo $images[$i][1]; ?>" alt="<?php echo $titres[$i][1]; ?>" style="height: 90px; width:100px;">
                </div>
                <div class="media-body" style="font-size:13px;">
                  <h4 class="media-heading"><?php echo $titres[$i][1]; ?></h4>
				  <b>Description : </b><span><?php if(isset($description[$i][2])){ echo descr($description[$i][2]); } else { echo "Pas de description disponible"; } ?></span><br>
                  <b>Auteur(s) : </b>
				  <span><?php 
						$autSize = sizeof($auteurs[$i])-1;
						for($j=1; $j<$autSize; $j+=2) {
							echo $auteurs[$i][$j].', ';
						}
						echo $auteurs[$i][$autSize];
					?></span>
                  
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>
			<?php
					}
				} else if($_GET["q"] == "restaurant"){
			?>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                    <img class="media-object" src="img/50n.jpg" alt="..." style="height: 237px; width:160px;">
                </div>
                <div class="media-body" style="font-size:13px;">
                  <h4 class="media-heading">Cinquante Nuances de Grey</h4>
                  <span>L'histoire d'une romance passionnelle, et sexuelle, entre un jeune homme riche amateur de femmes, et une étudiante vierge de 22 ans.</span><br>
                  <b>Date de sortie : </b><span>11 février 2015 (2h5min)</span><br>
                  <b>Réalisé par : </b><span>Sam Taylor-Johnson</span><br>
                  <b>Genre : </b><span>Erotique , Drame , Romance</span><br>
                  <b>Nationalité : </b><span>Américain</span><br>
                  <b>Horaires et séances : </b><br>
                  <ul>
                    <li><b>Vendredi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Samedi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Dimanche : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span></li>
                    <li><b>Lundi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Mardi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>
			<?php
				} else {
			?>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                    <img class="media-object" src="img/50n.jpg" alt="..." style="height: 237px; width:160px;">
                </div>
                <div class="media-body" style="font-size:13px;">
                  <h4 class="media-heading">Cinquante Nuances de Grey</h4>
                  <span>L'histoire d'une romance passionnelle, et sexuelle, entre un jeune homme riche amateur de femmes, et une étudiante vierge de 22 ans.</span><br>
                  <b>Date de sortie : </b><span>11 février 2015 (2h5min)</span><br>
                  <b>Réalisé par : </b><span>Sam Taylor-Johnson</span><br>
                  <b>Genre : </b><span>Erotique , Drame , Romance</span><br>
                  <b>Nationalité : </b><span>Américain</span><br>
                  <b>Horaires et séances : </b><br>
                  <ul>
                    <li><b>Vendredi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Samedi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Dimanche : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span></li>
                    <li><b>Lundi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                    <li><b>Mardi : </b> <span class="label label-success">13:50</span> <span class="label label-success">16:30</span> <span class="label label-success">19:10</span> <span class="label label-success">21:45</span> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/row-->
			
			<?php
				}
			?>
          </section>   


          <!-- Footer -->
          <footer class="text-center">
            <div class="footer-below">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    Copyright &copy; BKNK
                  </div>
                </div>
              </div>
            </div>
          </footer>
          <!-- jQuery -->
          <script src="js/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="js/bootstrap.min.js"></script>

          <!-- Plugin JavaScript -->
          <script src="js/jquery.easing.min.js"></script>
          <script src="js/classie.js"></script>
          <script src="js/cbpAnimatedHeader.js"></script>

          <!-- Contact Form JavaScript -->
          <script src="js/jqBootstrapValidation.js"></script>
          <script src="js/contact_me.js"></script>

          <!-- Custom Theme JavaScript -->
          <script src="js/freelancer.js"></script>
          <script>
            (function(){
                var vm = document.getElementById('votemoins');
                var like = document.getElementById('like_javascript');
                var vp = document.getElementById('voteplus');

                // Si on clique sur votemoins
                vm.addEventListener('click', function(e){
                    // On annule le chargement de la page
                    e.preventDefault();

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', vm);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Si on a effectué la requête, l'utilisateur ne peut plus voter donc on efface les votes
                            vp.parentElement.removeChild(vp);
                            vm.parentElement.removeChild(vm);
                            // On incrémente le compteur
                            like.innerHTML = parseInt(like.innerHTML) - 1;
                        }
                    };

                    xhr.send(null);
                },
                false);

                // Si on clique sur votemoins
                vp.addEventListener('click', function(e){
                    e.preventDefault();
                    content.innerHTML = '';
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', vp);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Si on a effectué la requête, l'utilisateur ne peut plus voter donc on efface les votes
                            vp.parentElement.removeChild(vp);
                            vm.parentElement.removeChild(vm);
                            // On incrémente le compteur
                            like.innerHTML = parseInt(like.innerHTML) + 1;

                        }
                    };

                    xhr.send(null);
                },
                false);

            })();
          </script>
        </body>

        </html>
