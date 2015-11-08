<?php

function __autoload($className) {
    $className = strtolower($className);
    if(preg_match('/int/', $className, $matches)) {
        $className = str_replace($matches, '', $className);
        require_once('model/interface/'.$className.'.interface.php');
    } else if(preg_match('/abs/', $className, $matches)) {
        $className = str_replace($matches, '', $className);
        require_once('model/abstract/'.$className.'.abstract.php');
    } else {
        if(preg_match('/(celtic)|(gallic)|(roman)|(viking)/', $className, $matches)) {
            require_once('model/class/town/'.$className.'.class.php');
        } else if(preg_match('/(academy)|(barrack)|(smithy)|(stable)/', $className, $matches)) {
            require_once('model/class/army/'.$className.'.class.php');
        } else if(preg_match('/(castle)|(church)|(cityhall)|(house)/', $className, $matches)) {
            require_once('model/class/civil/'.$className.'.class.php');
        } else if(preg_match('/(butchery)|(carpenter)|(market)|(tanner)/', $className, $matches)) {
            require_once('model/class/craft/'.$className.'.class.php');
        } else if(preg_match('/(butchery)|(carpenter)|(market)|(tanner)/', $className, $matches)) {
            require_once('model/class/craft/'.$className.'.class.php');
        } else if(preg_match('/(field)|(goldmine)|(lumbermill)|(stonepit)/', $className, $matches)) {
            require_once('model/class/ressource/'.$className.'.class.php');
        } else {
            require_once('model/class/event/'.$className.'.class.php');
        }
    }
}

$town = new CelticTown('Brest');
echo $town.'<br>';

$event = new TurnOne($town);
$event->action($town);
echo $event.'<br>';

echo 'Or : '.$town->getGold().'<br>Minerais : '.$town->getStone().'<br>Bois : '.$town->getWood().'<br>Population : '
    .$town->getPopulation().'<br>Population Max : '.$town->getPopulationMax().'<br>Population Active : '.$town->getPopulationActive().'<br><br>';

$house = new House($town);
echo $house.'<br>';

echo 'Or : '.$town->getGold().'<br>Minerais : '.$town->getStone().'<br>Bois : '.$town->getWood().'<br>Population : '
    .$town->getPopulation().'<br>Population Max : '.$town->getPopulationMax().'<br>Population Active : '.$town->getPopulationActive().'<br><br>';

$goldmine = new GoldMine($town);
echo $goldmine.'<br>';

echo 'Or : '.$town->getGold().'<br>Minerais : '.$town->getStone().'<br>Bois : '.$town->getWood().'<br>Population : '
    .$town->getPopulation().'<br>Population Max : '.$town->getPopulationMax().'<br>Population Active : '.$town->getPopulationActive().'<br><br>';

$event2 = new TurnTwo($town);
$event2->action($town);
echo $event2.'<br>';

echo 'Or : '.$town->getGold().'<br>Minerais : '.$town->getStone().'<br>Bois : '.$town->getWood().'<br>Population : '
    .$town->getPopulation().'<br>Population Max : '.$town->getPopulationMax().'<br>Population Active : '.$town->getPopulationActive().'<br><br>';

?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
</head>
<body>

    <div class="getTown">TABLE TOWN</div>

    <div class="getBuilding">TABLE BUILDING</div>

    <div class="content">content</div>


    <script src="http://localhost:8888/POO_project/www/bower_components/jquery/dist/jquery.js"></script>
    <script src="http://localhost:8888/POO_project/www/layout/js/ajax.js"></script>

</body>
</html>

