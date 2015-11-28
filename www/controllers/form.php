<?php
if($_POST["nom"] && $_POST["password"] && $_POST["race"]) {//si race est envoyé => nouvelle partie
    $newGame = new Save();
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $race = $_POST["race"];
    //faire classe town et ensuite l'insert bdd
    $query = $newGame->insert('INSERT INTO town (nom, password, race) VALUES ("'.$nom.'", "'.$password.'", "'.$race.'")');
    //envoyer en json les parametres de la classe et pas le retour bdd, mais conditionné l'envoi si l'insert a été correctement fait
    $result = $query->fetch();
} else if($_POST["nom"] && $_POST["password"]){//si pas de race => chargement de partie
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $newGame = new Save();
    $query = $newGame->select('SELECT * from town WHERE nom ="'.$nom.'" AND password = "'.$password.'"');
    $result = $query->fetch();
    //créer la classe town pour l'envoyer en json ensuite
} else {
        $result["error"] = 1;
}

//si il y un resultat en bdd on recupère aussi le contenu de la table building : on envoie caractéristique de town et la table building