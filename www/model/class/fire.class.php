<?php

class Fire extends AbsEvent{

    public function __construct(Town $town) {
        $this->setName('Incendie à l\'H&ocirctel de ville');
        $this->setMessage('L\'H&ocirctel de ville est en flamme.');
        $this->setPicture('../layout/img/fire.png');
    }

    public function actionFire(CityHall $cityHall, Town $town){
        $damage = floor(rand(1, 100));
        $cityHall->damage($town, $damage);
    }
}