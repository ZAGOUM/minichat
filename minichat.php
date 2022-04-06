<!DOCTYPE html>
<html>
<head>
    <script language="php" src="fonctions.php"></script>
    <link rel="stylesheet" href="style.css"/>
    <title>minichat</title>
</head>
<body>
<form method="POST" action="minichat_post.php">
    <p>
        <label for="pseudo" > Pseudo</label>: 
        <input type="text" name="pseudo" id="pseudo" value="Z@gor" 
        placeholder="Ex:zagor" size="30" maxlength="30"  /><br /><br />
        <textarea name="message" id="message" 
         cols="40" rows="4">Votre message ici...</textarea><br /><br />
        <input type="submit" value="Envoyer"/>
        <input type="reset"  value="Annuler"/><br/>
<?php
    //connexion à la base de donnée
    try{
        $bdd=new PDO("mysql:host=localhost;dbname=minichatbd;
        charset=utf8","root","",
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
    //récupération des 10 derniers messages
    $reponse=$bdd->query('SELECT pseudo,messages,
    DATE_FORMAT(dateInsert,"%d/%m/%Y %Hh%imin%ss") AS datei FROM minichat
    ORDER BY id DESC LIMIT 0,10');
    echo'
    <table>
        <tr>
            <td class="titre">PSEUDO</td>
            <td class="titre">MESSAGE</td>
            <td class="titre">DATE_INSERTION</td>
        </tr>';
    // Affichage de chaque message(toutes les données sont 
    // protégées par htmlspecialchars)
    while($donnees=$reponse->fetch())
    {
        echo'<tr>
            <td>'. htmlspecialchars($donnees['pseudo']).'</td>
            <td>'. htmlspecialchars($donnees['messages']).'</td>
            <td>'. $donnees['datei'].'</td>
        </tr>';
    }
    $reponse->closeCursor();
    $reponse=$bdd->query('SELECT DAYNAME(dateInsert) as dt FROM minichat where id=5');
    echo $reponse->fetch()['dt'];
    echo $bdd->query('SELECT NOW() as dr')->fetch()['dr'];
?>
</body>
</html>