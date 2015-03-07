<?php
// Si on a bien deux paramètres
if ( isset($_GET['nom']) ) {
    $id = -1;
    $nom = $_GET['nom'];
    $ret = mysql_query("SELECT id, total FROM Vote WHERE nom = ".$nom);
    
    /* Check if the query is in the database */
    if ( $row = mysql_fetch_assoc($ret) ) {  
        $id = $row['id'];
        $voteOrNot = mysql_result(mysql_query("SELECT COUNT(*) FROM IpVote WHERE id='".$id."' AND ip = '".$ip."'"));
              
        if ( $voteOrNot == 0 ) { /* If the guy never vote, show vote section and total of vote */
            echo '<p><a id="voteplus" href="vote.php?id="'.$_GET['nom'].'"&vote=p" style="padding-right:5px;"> <span class="glyphicon glyphicon-thumbs-up"  aria-hidden="true" style="font-size: 4em; color:#fff;">  </span></a><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript"> '.$row['id'].' </span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span><a id="votemoins" href="vote.php?&vote=m"  style="padding-left:5px;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 4em; color:#ec4151"> </span> </a> </p>';
        } else { /* If the guy already have vote, print total number of vote */
            echo '<p><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript">'.$row['id'].'</span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span></p>';
        }
    } else { 
        echo '<p><a id="voteplus" href="vote.php?id="'.$_GET['nom'].'"&vote=p" style="padding-right:5px;"> <span class="glyphicon glyphicon-thumbs-up"  aria-hidden="true" style="font-size: 4em; color:#fff;">  </span></a><b><span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> <span id="like_javascript"> 0 </span> <span class="glyphicon glyphicon-heart" style="color:#ee0077"> </span> </b></span><a id="votemoins" href="vote.php?&vote=m"  style="padding-left:5px;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 4em; color:#ec4151"> </span> </a> </p>';
    }
    
    if( isset($_GET['vote']) && $voteOrNot != 1 ) {
        $bdd_nom_serveur = 'localhost';
        $bdd_user = 'root';
        $bdd_mdp = 'root';
        $bdd = 'Interrop';
        mysql_connect($bdd_nom_serveur, $bdd_user, $bdd_mdp) 
                    or die("Impossible de se connecter : " . mysql_error());
      
        mysql_select_db($bdd);
        $ip = $_SERVER["REMOTE_ADDR"];
          
        if ( $_GET['vote'] == "p" ) {
            $vote = 1;
        } else {
            $vote = -1;
        }

        if ( $id == -1 ) {
            mysql_query("INSERT INTO Vote ('nom', 'total') VALUES('".$nom."', '".$vote."')");
            $id = mysql_insert_id();
        } else {
            if ( $voteOrNot == 0 ) {
                mysql_query("UPDATE Vote SET like_article = like_article + ".$vote." WHERE nom = '".$nom."'");                 
            }
        }
        
        mysql_query("INSERT INTO VoteIp ('id', 'ip') VALUES('".$id"', '".$ip."'");
    }
}
?>

                  