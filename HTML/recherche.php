<?php
// Création d'une ressource cURL
$ch = curl_init();
 
// Définition de l'URL et autres options appropriées
curl_setopt($ch, CURLOPT_URL, "http://www.google.fr/search?q=allocine+rue+praire+saint+etienne");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
// Récupération de l'URL et passage au navigateur
$ret=curl_exec($ch);
// Fermeture de la ressource cURL et libération des ressources systèmes
curl_close($ch);
 
preg_match("#http://www.allocine\.fr/seance/[^&]*#",$ret,$res);//on match une url d'image
echo '<a href='.$res[0].'>test</a>';
print_r($res);
 
?>