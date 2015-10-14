<?php


abstract class Civil implements Building{

    public function __construct(Town $town) {
        $town->prosperity++;
    }

    public function __destruct(Town $town) {
        $town->prosperity--;
    }

    public function upgrade(Town $town, $level) {
        $town->prosperity++;
    }

    public function damage(Town $town, $damageLevel) {
        $town->prosperity--;
    }

    public function action(Town $town) {}

}