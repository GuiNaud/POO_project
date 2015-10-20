<?php

class Fire extends AbsEvent{

    public function __construct(AbsTown $town) {
        $this->setName('Incendie à l\'H&ocirctel de ville');
        $this->setMessage('L\'H&ocirctel de ville est en flamme.');
        $this->setPicture('../layout/img/fire.png');
    }

    public function actionFire(CityHall $cityHall, AbsTown $town){
        $damage = floor(rand(1, 100));
        $cityHall->damage($town, $damage);
    }
}