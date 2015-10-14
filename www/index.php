<?php

function __autoload($className) {
    require_once('class/'.$className.'class.php');
}