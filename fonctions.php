<?php
    function affichage(){
        echo'<p><strong>'.htmlspecialchars($donnees['pseudo']).
        '</strong> :'.htmlspecialchars($donnees['messages']).
        '</p>';
}
?>