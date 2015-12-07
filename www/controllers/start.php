<?php
if($_POST["nom"] && $_POST["password"] && $_POST["race"]) {//si race est envoyé => nouvelle partie
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $race = $_POST["race"];

    switch ($race) {
        case 1:
            $town = new CelticTown($nom);
            break;
        case 2:
            $town = new GallicTown($nom);
            break;
        case 3:
            $town = new RomanTown($nom);
            break;
        case 4:
            $town = new VikingTown($nom);
            break;
    }
    $event = new TurnOne($town);
    $event->action($town);
    $result["event"] = array(
        "nom" => $event->getName(),
        "message" => $event->getMessage(),
        "picture" => $event->getPicture()
    );
    $town->processByTurn();
    $result["game"] = array (
        "nom" => $town->getName(),
        "race" => $race,
        "level" => $town->getLevel(),
        "turn" => $town->getTurn(),
        "zone" => $town->getZone(),
        "pop" => $town->getPopulation(),
        "popmax" => $town->getPopulationMax(),
        "popactive" => $town->getPopulationActive(),
        "wood" => $town->getWood(),
        "stone" => $town->getStone(),
        "gold" => $town->getGold(),
        "food" => $town->getFood(),
        "army" => $town->getArmy(),
        "prosp" => $town->getProsperity()
    );
    $newTown = new Save();
    $query = $newTown->insert('INSERT INTO town VALUES("'.$result["game"]["nom"].'", "'.$password.'", "'.$race.'",
        "'.$result["game"]["level"].'", "'.$result["game"]["turn"].'", "'.implode($result["game"]["zone"]).';'.'",
        "'.$result["game"]["pop"].'", "'.$result["game"]["popmax"].'", "'.$result["game"]["popactive"].'",
        "'.$result["game"]["wood"].'", "'.$result["game"]["stone"].'", "'.$result["game"]["gold"].'",
        "'.$result["game"]["food"].'", "'.$result["game"]["army"].'", "'.$result["game"]["prosp"].'")');
    if(!$query) {
        $result = array();
        $result["error"] = 2;
    }
} else if($_POST["nom"] && $_POST["password"]){//si pas de race => chargement de partie
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $newGame = new Save();
    $query = $newGame->select('SELECT nom, race, level, turn, zone, pop, popmax, popactive, wood, stone, gold, food, army, prosp from town WHERE nom ="'.$nom.'" AND password = "'.$password.'"');
    $result["game"] = $query->fetch(PDO::FETCH_ASSOC);
    $result["game"]["zone"] = explode(';', $result["game"]["zone"]);
} else {
    $result["error"] = 1;
}
