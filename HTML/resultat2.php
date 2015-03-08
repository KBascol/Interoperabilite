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
  include "json.html";
  ?>
  <!--/row--> 

  <div class="row">
    <div class="col-lg-12 text-center">
      <h3><a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">Ajouter un lieu</a></h3>
    </div>
  </div>

  

</section>   

<?php include "include/footer.php"; ?>

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
            <br><br><br>
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

