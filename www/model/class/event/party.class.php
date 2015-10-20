<?php

class Party extends AbsEvent {

    const GOLD = -250;
    const FOOD = -250;
    const PROSPERITY = 7;

    public function __construct(AbsTown $town) {
        $this->setName('F&ecircte du village');
        $this->setMessage('Les troubadours investissent '.$town->getName().'. La f&ecircte bat son plein.');
        $this->setPicture('../layout/img/party.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setFood(self::FOOD);
        $town->setProsperity(self::PROSPERITY);
    }
}