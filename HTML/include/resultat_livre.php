<?php
$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=20&PageIndex=1&ssi=6&sso=2");

preg_match_all("/<img\s*src=\"([^\"]*)\"\s*alt=\"[^\"]*\"\s*class=\"mrg_r\"/", $pageLivre, $images,PREG_SET_ORDER);
preg_match_all("/<span\s*class=\"lienInverse\s*title\">[^<]*<a\s*href=\"[^\"]*\"\s*class=\"fontbigger\">([^<]*)<\/a>/", $pageLivre, $titres,PREG_SET_ORDER);
preg_match_all("/<span\s*class=\"participants[^\"]*\"><a[^>]*>([^<]*)<\/a>(, <a[^>]*>([^<]*)<\/a>)*/", $pageLivre, $auteurs,PREG_SET_ORDER);

$size = sizeof($images);

for($i = 0; $i< $size; $i++) {
?>
    <!-- un row qui contient les information d'un livre -->
    <div class="row" style="margin-top: 15px;">
      <div class="media col-lg-10 col-lg-offset-1">
        <div class="media-left">
            <img class="media-object" src="<?php echo $images[$i][1]; ?>" alt="<?php echo $titres[$i][1]; ?>" style="height: 90px; width:100px;">
        </div>
        <div class="media-body" style="font-size:13px;">
          <h4 class="media-heading"><?php echo $titres[$i][1]; ?></h4>
          <b>Description : </b><span><?php if(isset($description[$i][2])){ echo descr($description[$i][2]); } else { echo "Pas de description disponible"; } ?></span><br>
          <b>Auteur(s) : </b>
          <span><?php 
                $autSize = sizeof($auteurs[$i])-1;
                for($j=1; $j<$autSize; $j+=2) {
                    echo $auteurs[$i][$j].', ';
                }
                echo $auteurs[$i][$autSize];
            ?></span>
          
        </div>
      </div>
    </div>
    <!--/row-->
    
    <br><br>
<?php
}
?>