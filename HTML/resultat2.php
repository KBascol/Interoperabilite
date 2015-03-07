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

                $page = file_get_contents("http://localhost/Interoperabilite/HTML/json.html?".$getdata, false, $context);
				echo $page;
            ?>
            <!--/row-->
          </section>   

<?php include "include/footer.php"; ?>
