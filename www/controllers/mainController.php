<?php
function __autoload($className) {
    $className = strtolower($className);
    if(preg_match('/int/', $className, $matches)) {
        $className = str_replace($matches, '', $className);
        require_once('../model/interface/'.$className.'.interface.php');
    } else if(preg_match('/abs/', $className, $matches)) {
        $className = str_replace($matches, '', $className);
        require_once('../model/abstract/'.$className.'.abstract.php');
    } else {
        if(preg_match('/(celtic)|(gallic)|(roman)|(viking)/', $className, $matches)) {
            require_once('../model/class/town/'.$className.'.class.php');
        } else if(preg_match('/(academy)|(barrack)|(smithy)|(stable)/', $className, $matches)) {
            require_once('../model/class/army/'.$className.'.class.php');
        } else if(preg_match('/(castle)|(church)|(cityhall)|(house)/', $className, $matches)) {
            require_once('../model/class/civil/'.$className.'.class.php');
        } else if(preg_match('/(butchery)|(carpenter)|(market)|(tanner)/', $className, $matches)) {
            require_once('../model/class/craft/'.$className.'.class.php');
        } else if(preg_match('/(butchery)|(carpenter)|(market)|(tanner)/', $className, $matches)) {
            require_once('../model/class/craft/'.$className.'.class.php');
        } else if(preg_match('/(field)|(goldmine)|(lumbermill)|(stonepit)/', $className, $matches)) {
            require_once('../model/class/ressource/'.$className.'.class.php');
        } else if(preg_match('/(save)/', $className, $matches)) {
            require_once('../model/class/save/'.$className.'.class.php');
        }else {
            require_once('../model/class/event/'.$className.'.class.php');
        }
    }
}

/*$bat = new Save();
$query = $bat->select("SELECT * from town WHERE nom ='test4' AND password='blou'");
$result = $query->fetch();
print_r($result);*/
if($_POST["step"])
    require_once('form.php');