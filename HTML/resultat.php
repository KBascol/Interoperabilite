<?php include "include/header.php"; ?>

        <!-- Header -->
        <header>
            <div class="container" style="padding-top:115px; padding-bottom:20px;">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="embed-responsive embed-responsive-16by9 col-lg-12">
                            <iframe id="map" class="embed-responsive-item" src="./map.html"></iframe>
                        </div>
                        <div class="intro-text">
                            <span class="name">Find Your Way</span>
                            <hr class="star-light">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Section -->

        <section>
            <div class="container">
                <div class=""><h2 class="text-center">Je dirais plutôt</h2><br></div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-8 col-lg-offset-2 text-center">

                            <div class="col-sm-6 col-md-4">
                              <div class="thumbnail">
                                <img src="img/cinema.jpg" alt="cinema" class="img-circle">
                                <div class="caption">
                                  <h3>Cinéma</h3>
                                  <p><a href="./resultat2.php?q=movie_theater&lat=<?= $_GET['lat'] ?>&lng=<?= $_GET['lng'] ?>&rad=<?= $_GET['rad'] ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6 col-md-4">
                          <div class="thumbnail">
                            <img src="img/restaurant.jpg" alt="restaurant" class="img-circle">
                            <div class="caption">
                              <h3>Réstaurant</h3>
                              <p><a href="./resultat2.php?q=restaurant&lat=<?= $_GET['lat'] ?>&lng=<?= $_GET['lng'] ?>&rad=<?= $_GET['rad'] ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="img/bar.jpg" alt="bar" class="img-circle">
                        <div class="caption">
                          <h3>Bar</h3>
                          <p><a href="./resultat2.php?q=bar&lat=<?= $_GET['lat'] ?>&lng=<?= $_GET['lng'] ?>&rad=<?= $_GET['rad'] ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                      </div>
                  </div>
              </div>

              <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="img/library.jpg" alt="library" class="img-circle">
                    <div class="caption">
                      <h3>Librairie</h3>
                      <p><a href="./resultat2.php?q=library&lat=<?= $_GET['lat'] ?>&lng=<?= $_GET['lng'] ?>&rad=<?= $_GET['rad'] ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                  </div>
              </div>
          </div>
      </section>   
    
    <script>
        var query = {};
        
        location.search.substr(1).split("&").forEach(function(item) {query[item.split("=")[0]] = item.split("=")[1]})
        
        var infopos = "./map.html?lat="+ query['lat'] + "&lng="+ query['lng'] + "&rad=" + query['rad'];
        document.getElementById("map").src = infopos;
  </script>

<?php include "include/footer.php"; ?>