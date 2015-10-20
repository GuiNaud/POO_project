<?php

class Drought extends AbsEvent {

    const GOLD = -300;
    const FOOD = -1000;
    const PROSPERITY = -5;

    public function __construct(AbsTown $town) {
        $this->setName('S&eacutecheresse');
        $this->setMessage('L\'eau se fait rare, et les r&eacutecolltes s’\'en ressentent');
        $this->setPicture('../layout/img/drought.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setFood(self::FOOD);
        $town->setProsperity(self::PROSPERITY);
    }
}