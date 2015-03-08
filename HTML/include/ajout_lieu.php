<?php
    if ( isset($_GET['lng']) && isset($_GET['lat']) && isset($_GET['type']) && isset($_GET['adresse']) && isset($_GET['nom']) ) {
        $lng = $_GET['lng'];
        $lat = $_GET['lat'];
        $type = $_GET['type'];
        $adresse = $_GET['adresse'];
        $nom = $_GET['nom'];
        
        include('./identifiant.php');
        $link = mysqli_connect($bdd_nom_serveur, $bdd_user, $bdd_mdp, $bdd) 
                or die("Impossible de se connecter : " . mysql_error());
                
        $check = mysqli_query($link, "SELECT COUNT(*) As Total FROM Lieu WHERE nom_lieu LIKE '".$nom."'");
        $row = mysqli_fetch_assoc($check);
        
        if ( !$row['Total'] ) {        
            mysqli_query($link, "INSERT INTO Lieu(lng_lieu, lat_lieu, nom_lieu, adresse_lieu, type_lieu) VALUES ('".$lng."', '".$lat."','".$nom."', '".$adresse."', '".$type."')");
            echo "Lieu bien ajouté.";
        } else {
            echo "Le lieu existe déjà.";
        }
    }