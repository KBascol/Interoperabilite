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


</section>   

<?php include "include/footer.php"; ?>
