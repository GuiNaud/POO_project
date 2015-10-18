<?php

class Anarchy extends AbsEvent {

    const GOLD = -750;
    const ARMY = -300;
    const PROSPERITY = -8;

    public function __construct(Town $town) {
        $this->setName('Anarchie');
        $this->setMessage('Des factions internes tentent de d&eacutestabiliser le pouvoir en place.');
        $this->setPicture('../layout/img/anarchy.png');
    }

    public function action(Town $town) {
        $town->setGold(self::GOLD);
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }
}