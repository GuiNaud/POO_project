<?php

class Alliance extends AbsEvent{

    const GOLD = 1500;
    const WOOD = 1000;
    const STONE = 1000;
    const FOOD = 1000;
    const ARMY = 100;
    const PROSPERITY = 8;

    public function __construct(AbsTown $town) {
        $this->setName('Alliance');
        $this->setMessage('Une tribu voisine craint votre rayonnement, et souhaite s\'allier avec vous.');
        $this->setPicture('../layout/img/alliance.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }
}