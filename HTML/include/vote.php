<?php
// Si on a bien deux paramètres
if ( isset($_GET['nom']) ) {
    $bdd_nom_serveur = 'localhost';
    $bdd_user = 'root';
    $bdd_mdp = 'root';
    $bdd = 'Interrop';
    
    $link = mysqli_connect($bdd_nom_serveur, $bdd_user, $bdd_mdp, $bdd) 
                or die("Impossible de se connecter : " . mysql_error());
      
    $id = -1;
    $voteOrNot = 0;
    $ip = $_SERVER["REMOTE_ADDR"];
    $nom = $_GET['nom'];
    $ret = mysqli_query("SELECT id_vote, total_vote FROM Vote WHERE nom_lieu LIKE '".$nom."'");
    
    /* Check if the query is in the database */
    if ( $ret ) {  
        $row = mysqli_fetch_assoc($ret);
        $id = $row['id_vote'];

        $voteOrNot = mysql_result(mysqli_query("SELECT COUNT(*) FROM VoteIp WHERE id='".$id."' AND ip LIKE '".$ip."'"), 0);

        if ( $voteOrNot == 0 ) { /* If the guy never vote, show vote section and total of vote */
            echo '<p><a id="voteplus" href="./include/vote.php?nom='.$nom.'&vote=p" style="padding-right:5px;"> <span class="glyphicon glyphicon-thumbs-up"  aria-hidden="true" style="font-size: 4em; color:#fff;">  </span></a><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript"> '.$row['total_vote'].' </span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span><a id="votemoins" href="./include/vote.php?nom='.$nom.'&vote=m"  style="padding-left:5px;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 4em; color:#ec4151"> </span> </a> </p>';
        } else { /* If the guy already have vote, print total number of vote */
            echo '<p><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript">'.$row['total_vote'].'</span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span></p>';
        }
    } else { 
        echo '<p><a id="voteplus" href="./include/vote.php?nom='.$nom.'&vote=p" style="padding-right:5px;"> <span class="glyphicon glyphicon-thumbs-up"  aria-hidden="true" style="font-size: 4em; color:#fff;">  </span></a><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript"> 0 </span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span><a id="votemoins" href="./include/vote.php?nom='.$nom.'&vote=m"  style="padding-left:5px;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 4em; color:#ec4151"> </span> </a> </p>';
    }
    
    if( isset($_GET['vote']) && $voteOrNot != 1 ) {
      
        if ( $_GET['vote'] == "p" ) {
            $vote = 1;
        } else {
            $vote = -1;
        }

        if ( $id == -1 ) {
            mysqli_query("INSERT INTO Vote(nom_lieu, total_vote) VALUES('".$nom."', '".$vote."')");
            $id = mysqli_insert_id();
        } else {
            if ( $voteOrNot == 0 ) {
                mysqli_query("UPDATE Vote SET total_vote = total_vote + ".$vote." WHERE nom_lieu LIKE '".$nom."'");                 
            }
        }

        mysqli_query("INSERT INTO VoteIp(id, ip) VALUES('".$id."', '".$ip."')");
    }
    
    mysqli_close($link);
}
?>