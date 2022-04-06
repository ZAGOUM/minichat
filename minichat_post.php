<?php
    if(isset($_POST['message']) AND isset($_POST['pseudo']))
    {
        //connexion à la base de donnée
    try{
        $bdd=new PDO("mysql:host=localhost;dbname=minichatbd;
        charset=utf8","root","",
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
    //insertion du message à laide d'une requete préparée
    $req1=$bdd->query('SELECT NOW() AS temps');
    $donnees=$req1->fetch();
    $req=$bdd->prepare('INSERT INTO minichat(pseudo,messages,dateInsert)
                    VALUES(?,?,?)');
    $req->execute(array($_POST['pseudo'],$_POST['message'],$donnees['temps']));    
    //redirection du visiteur vers la page du minichat
    header('Location:minichat.php');

    }
    else{
        echo'Veuillez remplir tous les champs';
    }
    ?>