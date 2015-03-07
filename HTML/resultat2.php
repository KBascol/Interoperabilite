<?php include "include/header.php"; ?>


        <!-- Header -->
        <header>
          <div class="container" style="padding-top:115px; padding-bottom:0px;">
            <div class="row">
              <div class="col-lg-12">
                <div class="intro-text">
                  <span class="name">Cinéma</span>
                  <hr class="star-light">
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- Section -->

        <section>
          <div class="container">
            <?php 
                $getdata = http_build_query(
                    array(
                        'q' => $_GET['q'],
                        'lat' => $_GET['lat'],
                        'lng'=> $_GET['lng'],
                        'rad'=> $_GET['rad'],
                    )
                );
                
                $opts = array('http' =>
                    array(
                        'method'  => 'GET'
                    )
                );

                $context  = stream_context_create($opts);

                $page = file_get_contents("http://ujm.eu5.org/int/HTML/json.html?".$getdata, false, $context);
                
                $json = preg_replace('/[^@]*<div id=\"info\">([^<]*)<[^@]*/', '$1', $page);
                echo "JSON" . $json;
                // $obj = json_decode($json, true);
                // print_r($obj);
                // $obj['titre'];
            ?>
            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="resultat3.php?q=library">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="#">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="#">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="#">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="#">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->

            <br><br>

            <!-- un row qui contient les information d'un ciné -->
            <div class="row">
              <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/cinema.jpg" alt="..." style="height: 60px;">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="#">Alhambra ciné</a> <a href=""><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 1em;"> </span></a> <a href=""><span class="glyphicon glyphicon-thumbs-down"aria-hidden="true" style="font-size: 1em; color:#ec4151"></span></a></h3>
                  <p>Un cinéma pas comme les autre, au pire Nico tu peux supprimé cette partie ;) qsfkjjfd flkjs dflksdj flsdj</p>
                </div>
              </div>
            </div>
            <!--/row-->
          </section>   

<?php include "include/footer.php"; ?>
