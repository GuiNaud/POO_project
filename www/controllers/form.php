<?php
if($_POST["nom"] && $_POST["password"] && $_POST["race"]) {
    $newGame = new Save();
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $race = $_POST["race"];
    $query = $newGame->insert("INSERT INTO town (nom, password, race) VALUES ($nom, $password, $race)");
    return json_encode($query);
} else if($_POST["nom"] && $_POST["password"]){
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $newGame = new Save();
    $query = $newGame->select('SELECT * from town WHERE nom ="'.$nom.'" AND password = "'.$password.'"');
    $result[] = $query->fetch();
    return json_encode($result);
}   else
       echo 'erreur';