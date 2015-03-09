<?php

function rad($x) {
    return $x * pi() / 180;
}
    
    if ( isset($_GET['q']) && isset($_GET['lng']) && isset($_GET['lat']) && isset($_GET['rad']) ) {
        $q = $_GET['q'];
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
        $rad = $_GET['rad'];
        
        include('./identifiant.php');        
        $link = mysqli_connect($bdd_nom_serveur, $bdd_user, $bdd_mdp, $bdd) 
                    or die("Impossible de se connecter : " . mysql_error());
        
        $lieu = mysqli_query($link, "SELECT * FROM Lieu WHERE type_lieu LIKE '".$_GET['q']."'");
        
        $R = 6378137; // circonférence moyenne de la terre 
        
        if($q == "movie_theater"){
            $img = "img/cinema.jpg";
        }
        else if($q == "bar"){
            $img = "img/bar.jpg";
        }
        else if($q == "restaurant"){
            $img = "img/restaurant.jpg";
        }
        else {
            $img = "img/library.jpg";
        }
        
        
        while ( $row = mysqli_fetch_assoc($lieu) ) {
            $dLat = rad($lat - $row['lat_lieu']);
            $dLng = rad($lng - $row['lng_lieu']);

            $a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(rad($row['lat_lieu'])) * Math.cos(rad($lat)) *
            Math.sin(dLong / 2) * Math.sin(dLong / 2);
            $c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            $distance = $R * $c;
            if ( $distance < $rad ) {
                echo '<div class="row">
                      <div class="media col-lg-10 col-lg-offset-1">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="'.$img.'" alt="..." style="height: 60px;">
                          </a>
                        </div>
                        <div class="media-body">
                          <h3 class="media-heading"><a href="resultat3.php?q='.$q.'&nom='.$row['nom_lieu'].'&adr='.$row['adresse_lieu'].'">'.$row['nom_lieu'].'</a></h3>
                          <p>Distance: '.$distance.' mètres</p>
                          <p>Adresse:'.$row['adresse_lieu'].'</p>
                        </div>
                      </div>
                    </div><br><br>';
            }
        }
    }
?>