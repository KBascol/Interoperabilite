<?php
    include "include/header.php";
?>


        <!-- Header -->
        <header>
          <div class="container" style="padding-top:115px; padding-bottom:0px;">
            <div class="row">
              <div class="col-lg-12">
                <div class="intro-text">
                  <span class="name">
                  <?php
                    echo preg_replace("/\_/"," ",$_GET['nom']);
                  ?>
                  </span>
                  <hr class="star-light">
                  <p>votre avis nous améliore</p>
                  <?php include('./include/vote.php'); ?>
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
                    include ("./include/resultat_cine.php");
                } else if($_GET["q"] == "library"){
                    include ("./include/resultat_livre.php");
                } else if($_GET["q"] == "restaurant") {
                    include ("./include/resultat_resto.php");
                } else {
                    include ("./include/resultat_bar.php");
                }
            ?>
          </section>   

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

<?php include "include/footer.php"; ?>