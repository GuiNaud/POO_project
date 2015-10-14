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
        require_once('model/class/'.$className.'.class.php');
    }
}


