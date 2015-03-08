<?php
// Si on a bien deux paramètres
if ( isset($_GET['nom']) ) {
    include('./identifiant.php');
    
    $link = mysqli_connect($bdd_nom_serveur, $bdd_user, $bdd_mdp, $bdd) 
                or die("Impossible de se connecter : " . mysql_error());
      
    $id = -1;
    $voteOrNot = 0;
    $ip = $_SERVER["REMOTE_ADDR"];
    $nom = $_GET['nom'];
    $ret = mysqli_query($link, "SELECT COUNT(*) As Voted, id_vote, total_vote FROM Vote WHERE nom_lieu LIKE '".$nom."'");
    $row = mysqli_fetch_assoc($ret);
    /* Check if the query is in the database */
    if ( $row['Voted'] ) {  
        
        $id = $row['id_vote'];
        $voteQuery = mysqli_query($link, "SELECT COUNT(*) As total FROM VoteIp WHERE id='".$id."' AND ip LIKE '".$ip."'");
        $seekData =  mysqli_data_seek ( $voteQuery , 0 );

        $voteOrNot = mysqli_fetch_assoc($voteQuery);

        if ( $voteOrNot["total"] == 0 ) { /* If the guy never vote, show vote section and total of vote */
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
            mysqli_query($link, "INSERT INTO Vote(nom_lieu, total_vote) VALUES('".$nom."', '".$vote."')");
            $id = mysqli_insert_id($link);
        } else {
            if ( $voteOrNot["total"] == 0 ) {
                mysqli_query($link, "UPDATE Vote SET total_vote = total_vote + ".$vote." WHERE nom_lieu LIKE '".$nom."'");                 
            }
        }

        mysqli_query($link, "INSERT INTO VoteIp(id, ip) VALUES('".$id."', '".$ip."')");
    }
    
    mysqli_close($link);
}
?>