<?php

$ch = curl_init();
 
// Définition de l'URL et autres options appropriées
curl_setopt($ch, CURLOPT_URL, "http://www.google.fr/search?q=allocine+".$_GET['adr']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
// Récupération de l'URL et passage au navigateur
$ret=curl_exec($ch);
// Fermeture de la ressource cURL et libération des ressources systèmes
curl_close($ch);

preg_match("#http://www.allocine\.fr/seance/[^&]*#",$ret,$res);

if(isset($res[0])){
    $pageFilmAffiche = file_get_contents($res[0]);

    preg_match_all("/<\!--\s*picturezone\s*-->\n<div[^*<\/]*<\/div>\n<[^>]*>\n<[^>]*>\n<h2>\n<[^>]*>([^<]*)<\/a>/", $pageFilmAffiche, $titre,PREG_SET_ORDER);
    preg_match_all("/<\!--\s*\/notationbar\s*-->\n<p>\n([^<]*)<\/p>/", $pageFilmAffiche, $description, PREG_SET_ORDER);
    preg_match_all("/<\!--\s*class=\"titlebar\"\s*-->\n<p>\n(.*)\n\(([^\)]*)\)\n[^<]*<b>([^<]*)<\/b>/",$pageFilmAffiche, $information, PREG_SET_ORDER);
    preg_match_all("/<p>\nDe\s<a\shref=\'\/personne\/fichepersonne_gen_cpersonne=[^>]*>([^<]*)<\/a>/",$pageFilmAffiche, $realisateur, PREG_SET_ORDER);
    preg_match_all("/<a\shref=\"\/film\/fichefilm_gen_cfilm=[^>]*><img\ssrc=\'([^\']*)\'[^>]*><\/a>/", $pageFilmAffiche, $image, PREG_SET_ORDER);
    $size = sizeof($titre);

    for($i = 0; $i< $size; $i++) {
?>
    <!-- un row qui contient les information d'un ciné -->
    <div class="row">
      <div class="media col-lg-10 col-lg-offset-1">
        <div class="media-left">
            <img class="media-object" src="<?php echo $image[$i][1]; ?>" alt="..." style="height: 237px; width:160px;">
        </div>
        <div class="media-body" style="font-size:13px;">
          <h4 class="media-heading"><?php echo $titre[$i][1]; ?></h4>
          <span><?php echo $description[$i][1]; ?></span><br>
          <b>Date de sortie : </b><span><?php echo $information[$i][3];?> (<?php echo $information[$i][2]; ?>)</span><br>
          <b>Réalisé par : </b><span><?php echo $realisateur[$i][1]; ?></span><br>
          <b>Genre : </b><span><?php echo $information[$i][2]; ?></span><br>
          <b>Nationalité : </b><span><?php echo "Inconue"; ?></span><br>
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
    }
}
else {
?>
    <div class="row">
        <h4  class="media-heading">Séances introuvables.<h4>
    </div>
<?php
}
?>