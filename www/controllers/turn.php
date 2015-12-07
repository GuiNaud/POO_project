<?php
function createBuilding($number, $town, $flag = null) {
    switch($number) {
        case 1 :
            $bat = $flag ? new CityHall($town, $flag) : new CityHall($town);
            break;
        case 2 :
            $bat = $flag ? new Castle($town, $flag) : new Castle($town);
            break;
        case 3 :
            $bat = $flag ? new House($town, $flag) : new House($town);
            break;
        case 4 :
            $bat = $flag ? new Church($town, $flag) : new Church($town);
            break;
        case 5 :
            $bat = $flag ? new GoldMine($town, $flag) : new GoldMine($town);
            break;
        case 6 :
            $bat = $flag ? new LumberMill($town, $flag) : new LumberMill($town);
            break;
        case 7 :
            $bat = $flag ? new StonePit($town, $flag) : new StonePit($town);
            break;
        case 8 :
            $bat = $flag ? new Field($town, $flag) : new Field($town);
            break;
        case 9 :
            $bat = $flag ? new Barrack($town, $flag) : new Barrack($town);
            break;
        case 10 :
            $bat = $flag ? new Smithy($town, $flag) : new Smithy($town);
            break;
        case 11 :
            $bat = $flag ? new Academy($town, $flag) : new Academy($town);
            break;
        case 12 :
            $bat = $flag ? new Stable($town, $flag) : new Stable($town);
            break;
        case 13 :
            $bat = $flag ? new Market($town, $flag) : new Market($town);
            break;
        case 14 :
            $bat = $flag ? new Carpenter($town, $flag) : new Carpenter($town);
            break;
        case 15 :
            $bat = $flag ? new Butchery($town, $flag) : new Butchery($town);
            break;
        case 16 :
            $bat = $flag ? new Tanner($town, $flag) : new Tanner($town);
            break;
    }
    return $bat;
}

function randomizeEvent($town) {
    $prosperity = $town->getProsperity();
    switch($town->getTurn()) {
        case 1 :
            $town->setTurn(2);
            $event = new TurnTwo($town);
            break;
        case 2 :
            $town->setTurn(3);
            $event = new TurnThree($town);
            break;
        case 3 :
            $town->setTurn($town->getTurn() + 1);
            $random = rand(0, 100);
            switch ($random) {
                case $random >= 0 && $random <= 10 :
                    $event = new Anarchy($town);
                    break;
                case $random >= 11 && $random <= 20 :
                    $event = new Invasion($town);
                    break;
                case $random >= 21 && $random <= 25 :
                    $event = new Desertion($town);
                    break;
                case $random >= 26 && $random <= 30 :
                    $event = new Fire($town);
                    break;
                case $random >= 31 && $random <= 35 :
                    $event = new Drought($town);
                    break;
                case $random >= 36 && $random <= 40 :
                    $event = new Vintage($town);
                    break;
                case $random >= 41 && $random <= 50 :
                    $event = new Party($town);
                    break;
                case $random >= 51 && $random <= 60 :
                    if($prosperity > 50) {
                        $event = new War($town);
                    } else randomizeEvent($town);
                    break;
                case $random >= 61 && $random <= 70 :
                    if($prosperity > 55) {
                        $event = new Migration($town);
                    } else randomizeEvent($town);

                    break;
                case $random >= 71 && $random <= 80 :
                    if($prosperity > 65) {
                        $event = new Business($town);
                    } else randomizeEvent($town);
                    break;
                case $random >= 81 && $random <= 90 :
                    if($prosperity > 75) {
                        $event = new Alliance($town);
                    } else randomizeEvent($town);
                    break;
                case $random >= 91 && $random <= 100 :
                    if($prosperity > 85) {
                        $event = new Utopia($town);
                    } else randomizeEvent($town);
                    break;
            }

    }
    return $event;
}
if($_POST["nom"] && $_POST["race"]) {
    $nom = $_POST["nom"];
    $race = $_POST["race"];

    //on crée une classe town en fonctions des informatiosn en cours
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
    $game = json_decode($_POST["game"]);
    $town->setTurn($game["turn"]);
    $town->setZone($game["zone"]);
    $town->setPopulation($game["pop"]);
    $town->setPopulationMax($game["popmax"]);
    $town->setPopulationActive($game["popactive"]);
    $town->setWood($game["wood"]);
    $town->setGold($game["gold"]);
    $town->setStone($game["stone"]);
    $town->setFood($game["food"]);
    $town->setArmy($game["army"]);
    $town->setProsperity($game["prosp"]);

    /* on recupére le tableau actions ou se trouvent les info sur chaque nouveau batiment créé
     * on crée chaque objet correspondant à ce batiment
     * pour vérifier que le batiment n'a pas été créé, on vérifie que son occurence est absente du tableau zone de game
     * si il y est présent, on crée l'objet avec un flag = 1, qui permettra de ne pas utiliser de ressources pour sa création
     * seul les couts par tour seront déduits
     * pour vérifier que le batiment n'est pas été détruit, on vérifie son dernier numéro
    */
    $action = json_decode($_POST["action"]);
    foreach($action as $batToBuild) {
        $batExplode = explode(":", $batToBuild);
        if($batExplode[3] != 0) {
            if(in_array($batToBuild, $game["zone"])) $newBat = createBuilding($batExplode[0], $town, 1);
            else $newBat = createBuilding($batExplode[0], $town, 0);
            if($batExplode[1] > 1) $newBat->upgrade($town, $batExplode[1]);
            $newBat->action($town);
        } else {
            $batToDestroy = createBuilding($batExplode[0], $town, 1);
            $batToDestroy->destroy($town);
            unset($action[$batToBuild]);
        }
    }
    unset($game["zone"]);
    $town->setZone($action);

    $newEvent = randomizeEvent($town);
    $newEvent->action($town);


    $newTown = new Save();
    $query = $newTown->update('UPDATE town SET level = "'.$result["game"]["level"].'", turn = "'.$result["game"]["turn"].'",
        zone = "'.$result["game"]["zone"].'", pop = "'.$result["game"]["pop"].'", popmax = "'.$result["game"]["popmax"].'",
        popactive = "'.$result["game"]["popactive"].'", wood = "'.$result["game"]["wood"].'", stone = "'.$result["game"]["stone"].'",
        gold = "'.$result["game"]["gold"].'", food = "'.$result["game"]["food"].'", army = "'.$result["game"]["army"].'",
        prosp = "'.$result["game"]["prosp"].'" WHERE nom = "'.$nom.'"');
    if(!$query) {
        $result = array();
        $result["error"] = 2;
    } else {
        if($town->getProsperity() == 100) {
            $result["final"] = "Victoire !";
        } else {
            $result["event"] = array(
                "nom" => $event->getName(),
                "message" => $event->getMessage(),
                "picture" => $event->getPicture()
            );

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
        }
    }
}else {
    $result["error"] = 1;
}