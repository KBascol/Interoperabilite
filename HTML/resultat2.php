<?php include "include/header.php"; ?>


<!-- Header -->
<header>
  <div class="container" style="padding-top:115px; padding-bottom:0px;">
    <div class="row">
      <div class="col-lg-12">
        <div class="intro-text">
          <span class="name">
            <?php
            $type = $_GET['q'];
            if($type[0] == 'm'){
              echo "Cinémas";
            } else if($type[0] == 'b'){
              echo "Bars";
            } else if($type[0] == 'l'){
              echo "Bibliothèques";
            } else if($type[0] == 'r'){
              echo "Restaurants";
            } else {
              echo "Erreur";
            }
            ?>
          </span>
          <hr class="star-light">
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Section -->

<section>
  <?php 
  include("json.php");
  ?>
  <!--/row--> 

  <div class="row">
    <div class="col-lg-12 text-center">
      <h3><a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">Ajouter un lieu</a></h3>
    </div>
  </div>

  

</section>   

<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="modal-body">
            <h2>Ajoutez un lieu</h2>
            <hr class="star-primary">
            <br>
            <div id="result" style="color: green" class="label-success"></div>
            <br>
            <div class="row">
              <div class="col-lg-12 text-center v-center" style="margin-top: 0px;">
                <div class="col-lg-12 v-center" style="background-color:#2c3e50; padding-bottom:30px; border-radius:10px;">
                  <h3 style="color:#fff;">Quel est le nom du lieu ?</h3>
                  <br>
                  <form class="col-lg-12" action="#" method="">
                    <div class="input-group col-lg-10" style="text-align:center;margin:0 auto;">
                      <input class="form-control input-lg" name="" placeholder="Nom du lieu" type="text">
                      <span class="input-group-btn"><input class="btn btn-lg btn-primary" value="Ajouter le lieu" type="submit" style="background-color:#18bc9c;border-color:#18bc9c"></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "include/footer.php"; ?>


<script>
    var res = document.getElementById('result');
    var nom_lieu = document.getElementById('nom');
    var query = {};
    var params;

    function refresh() {
        window.location.reload(true);
    }

    location.search.substr(1).split("&").forEach(function(item) {query[item.split("=")[0]] = item.split("=")[1]});
    var add = document.getElementById('add');
    add.addEventListener('click', function(e){
        e.preventDefault();
        params = "lat="+query['lat']+"&lng="+query['lng']+"&nom="+nom_lieu.value+"&type="+query['q'];
        var xhr = new XMLHttpRequest();

        xhr.open('GET', './ajout_lieu.php?'+params, true);  

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Si on a effectué la requête, l'utilisateur ne peut plus voter donc on efface les votes
                res.innerHTML = xhr.responseText;
                setTimeout(refresh, 500);
            }
        };

        xhr.send();
    },
    false);

</script>

