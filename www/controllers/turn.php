<?php
$result = array();
/*function qui créer un batiment suivant sa classe
 * */
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
/*function de generation d'evenement random
 * */
function randomizeEvent($town, $game) {
    $prosperity = $game->prosp;
    switch($game->turn) {
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
                case $random >= 21 && $random <= 30 :
                    $event = new Desertion($town);
                    break;
                case $random >= 31 && $random <= 40 :
                    $event = new Fire($town);
                    break;
                case $random >= 41 && $random <= 50 :
                    $event = new Drought($town);
                    break;
                case $random >= 51 && $random <= 60 :
                    $event = new Vintage($town);
                    break;
                case $random >= 61 && $random <= 70 :
                    $event = new Party($town);
                    break;
                case $random >= 76 && $random <= 80 :
                    if($prosperity > 65) {
                        $event = new War($town);
                    } new Invasion($town);
                    break;
                case $random >= 81 && $random <= 85 :
                    if($prosperity > 70) {
                        $event = new Migration($town);
                    }
                    break;
                case $random >= 86 && $random <= 90 :
                    if($prosperity > 75) {
                        $event = new Business($town);
                    } else new Vintage($town);
                    break;
                case $random >= 91 && $random <= 95 :
                    if($prosperity > 85) {
                        $event = new Alliance($town);
                    } else new Party($town);
                    break;
                case $random >= 96 && $random <= 100 :
                    if($prosperity > 90) {
                        $event = new Utopia($town);
                    } else new Vintage($town);
                    break;
                default :
                    $event = new Nothing($town);
                    break;

            }

    }
    return $event;
}
// on dejsonne la data envoyé, et on stocke le tableau data["game"] dans l'objet $game
$data = $_REQUEST;
$game = json_decode($data["game"]);
$action = $data["action"];

if($game->nom && $game->race) {
    $nom = $game->nom;
    $race = $game->race;

    //on crée une classe town en fonctions des informatiosn de la partie
    switch ($race) {
        case 1:
            $town = new CelticTown(
                $nom,
                $game->level,
                $game->turn,
                $game->zone,
                $game->pop,
                $game->popmax,
                $game->popactive
            );
            break;
        case 2:
            $town = new GallicTown(
                $nom,
                $game->level,
                $game->turn,
                $game->zone,
                $game->pop,
                $game->popmax,
                $game->popactive
            );
            break;
        case 3:
            $town = new RomanTown(
                $nom,
                $game->level,
                $game->turn,
                $game->zone,
                $game->pop,
                $game->popmax,
                $game->popactive
            );
            break;
        case 4:
            $town = new VikingTown(
                $nom,
                $game->level,
                $game->turn,
                $game->zone,
                $game->pop,
                $game->popmax,
                $game->popactive
            );
            break;
    }
    $town->setWood($game->wood);
    $town->setStone($game->stone);
    $town->setGold($game->gold);
    $town->setFood($game->food);
    $town->setArmy($game->army);
    $town->setProsperity($game->prosp);


    /* on recupére le tableau actions ou se trouvent les info sur chaque nouveau batiment créé
     * on crée chaque objet correspondant à ce batiment
     * pour vérifier que le batiment n'a pas été créé, on vérifie que son occurence est absente du tableau zone de game
     * si il y est présent, on crée l'objet avec un flag = 1, qui permettra de ne pas utiliser de ressources pour sa création
     * seul les couts par tour seront déduits
     * pour vérifier que le batiment n'est pas été détruit, on vérifie son dernier numéro
    */
    if($action) {
        foreach($action as $batToBuild) {
            $batExplode = explode(":", $batToBuild);
            if($batExplode[3] != 0) {
                $zoneArray = explode(";", $game->zone);
                if(in_array($batToBuild, $zoneArray)) {
                    $newBat = createBuilding($batExplode[0], $town, 1);
                }
                else {
                    $newBat = createBuilding($batExplode[0], $town, 0);
                }
                if($batExplode[1] > 1) $newBat->upgrade($town, $batExplode[1]);
                $newBat->action($town);
            } else {
                $batToDestroy = createBuilding($batExplode[0], $town, 1);
                $batToDestroy->destroy($town);
                unset($action[$batToBuild]);
            }
        }
    }

    //on reset l'objet $game
    unset($game->zone);
    $town->setZone($action);

    //on appelle un nouvel evenement
    $newEvent = randomizeEvent($town, $game);
    if($newEvent) {
        $newEvent->action($town);
    }

    //on crée un objet Save pour update la partie en bdd
    $newTown = new Save();
    $query = $newTown->update('UPDATE town SET level = "'.$town->getLevel().'", turn = "'.$town->getTurn().'",
        zone = "'.implode(';', $town->getZone()).'", pop = "'.$town->getPopulation().'", popmax = "'.$town->getPopulationMax().'",
        popactive = "'.$town->getPopulationActive().'", wood = "'.$town->getWood().'", stone = "'.$town->getStone().'",
        gold = "'.$town->getGold().'", food = "'.$town->getFood().'", army = "'.$town->getFood().'",
        prosp = "'.$town->getProsperity().'" WHERE nom = "'.$nom.'"');
    if(!$query) { // si l'update abort
        $result["error"] = 2;
    } else {
        if($town->getProsperity() == 100) { //si la propserité est à 100 : partie gagnée
            $result["final"] = "Victoire !";
        } else { //sinon on crée le tableau $result comprenant les tableaux $event si event il y a , et le tableau $game, contenant le sinfos de la partie
            if($newEvent) {
                $result["event"] = array(
                    "nom" => $newEvent->getName(),
                    "message" => $newEvent->getMessage(),
                    "picture" => $newEvent->getPicture()
                );
            }
            $result["game"] = array (
                "nom" => $town->getName(),
                "race" => $race,
                "level" => $town->getLevel(),
                "turn" => $town->getTurn(),
                "zone" => implode(';', $town->getZone()),
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
}else { // si la partie n'existe pas en bdd
    $result["error"] = 1;
}