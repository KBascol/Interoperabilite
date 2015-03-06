<?php

$param = http_build_query(
   array(
    'alcool' => '1',
    'recherche' => 'Rechercher'
   )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $param
    )
);

$result = file_get_contents('http://www.recettes-cocktails.fr/recettes-cocktails/search.php', false, stream_context_create($opts));
$replace = trim(preg_replace('/\t+|\n|<\/?span[^>]*>/', '', $result));

preg_match_all('/<section[^>]*><img src=\"([^\"]*)\"(?:[^>]*>){3,3}([^<]*)(?:[^>]*>){3,3}([^<]*)(?:[^>]*>){2,2}[^:]*:([^<]*).*?<\/section>/', $replace, $out, PREG_PATTERN_ORDER);

$arraysize = sizeof($out);

for ( $j = 1; $j < $arraysize; $j++ ) {
    echo '<div class="row">
            <div class="media col-lg-10 col-lg-offset-1">
                <div class="media-left">
                    <img class="media-object" src="'.$out[1][$j].'" alt="..." style="height: 237px; width:160px;">
                </div>
                <div class="media-body" style="font-size:13px;">
                    <h4 class="media-heading">'.$out[2][$j].'</h4>
                    <span>'.$out[3][$j].'</span>
                    <b>Ingrédients : </b>'.$out[4][$j].'
                </div>
            </div>
        </div>';
}
?>