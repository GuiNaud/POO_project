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
        } else if(preg_match('/(save)/', $className, $matches)) {
            require_once('model/class/save/'.$className.'.class.php');
        }else {
            require_once('model/class/event/'.$className.'.class.php');
        }
    }
}

$town = new Save();
$query = $town->insert("INSERT INTO town (nom, password, race) VALUES ('test4', 'blou', 4)");

print $query;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Utopia</title>
</head>
<body>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="controllers/ajax/ajax.js"></script>

</body>
</html>


