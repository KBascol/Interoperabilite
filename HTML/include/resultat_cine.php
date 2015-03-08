<?php
	
	$pageFilmAffiche = file_get_contents("http://www.allocine.fr/seance/salle_gen_csalle=P0231.html");
	
	preg_match_all("/<\!--\s*picturezone\s*-->\n<div[^*<\/]*<\/div>\n<[^>]*>\n<[^>]*>\n<h2>\n<[^>]*>([^<]*)<\/a>/", $pageFilmAffiche, $titre,PREG_SET_ORDER);
	preg_match_all("/<\!--\s*\/notationbar\s*-->\n<p>\n([^<]*)<\/p>/", $pageFilmAffiche, $description, PREG_SET_ORDER);
	preg_match_all("/<\!--\s*class=\"titlebar\"\s*-->\n<p>\n(.*)\n\(([^\)]*)\)\n[^<]*<b>([^<]*)<\/b>/",$pageFilmAffiche, $information, PREG_SET_ORDER);
	preg_match_all("/<p>\nDe\s<a\shref=\'\/personne\/fichepersonne_gen_cpersonne=[^>]*>([^<]*)<\/a>/",$pageFilmAffiche, $realisateur, PREG_SET_ORDER);
	preg_match_all("/<a\shref=\"\/film\/fichefilm_gen_cfilm=[^>]*><img\ssrc=\'([^\']*)\'[^>]*><\/a>/", $pageFilmAffiche, $image, PREG_SET_ORDER);

	preg_match_all("/<div\sclass=\"showtimescore js_pane_wrapper\"><div\sclass=\"pane\" rel=\"0\">\n<p>\n<span[^<]*<\/span>,\n<span[^<]*<\/span>\n<\/p>\n<div[^<]*<ul>(.*)<\/ul>/", $pageFilmAffiche, $ligneSeance, PREG_SET_ORDER);

	
	$size = sizeof($titre);

	for($i = 0; $i< $size; $i++) {
?>
    <!-- un row qui contient les information d'un livre -->
    <div class="row">
      <div class="media col-lg-10 col-lg-offset-1">
        <div class="media-left">
            <img class="media-object" src="<?php echo $image[$i][1]; ?>" alt="<?php echo $titre[$i][1]; ?>" style="height: 160px; width:120px;">
        </div>
        <div class="media-body" style="font-size:13px;">
          <h4 class="media-heading"><?php echo $titre[$i][1]; ?></h4>
          <b>Réalisateur : </b>span><?php echo $realisateur[$i][1];?></span><br>
          <b>Genre : </b><span><?php echo $information[$i][1]; ?></span><br>
          <b>Durée : </b><span><?php echo $information[$i][2]; ?></span>
          <b>Date de sorti : </b><span><?php echo $information[$i][3]; ?></span><br>
          <b>Description : </b><span><?php if(isset($description[$i][1])){ echo $description[$i][1]; } else { echo "Pas de description disponible"; } ?></span><br>
          <b>Seances du <?php echo date('d/m/Y'); ?> : </b>
          	<span>
          		<?php 
          			if(isset($ligneSeance[$i][0])) {
						preg_match_all("/<em[^>]*>(\d{2}\:\d{2})<\/em>/", $ligneSeance[$i][0], $seances,PREG_SET_ORDER);
	          			$sizeSeances=sizeof($seances);
	          			if($sizeSeances==0) {
	          				echo 'Prochainement';
	          			} else {
	          				for($j=0; $j < $sizeSeances; $j++) {
								echo $seances[$j][1];
								if($j < $sizeSeances-1) {
									echo ', ';
								} else {
									echo '.';
								}
							}	
	          			}
          			}else {
          				echo 'Prochainement';
          			}
          			
				?>
          	</span><br>
        </div>
      </div>
    </div>
    <!--/row-->
    
    <br><br>
<?php } ?>
