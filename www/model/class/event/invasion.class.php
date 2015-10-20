<?php

class Invasion extends AbsEvent{

    const GOLD = -1000;
    const WOOD = -500;
    const STONE = -500;
    const FOOD = -500;
    const ARMY = -150;
    const PROSPERITY = -8;

    public function __construct(AbsTown $town) {
        $this->setName('Invasion');
        $this->setMessage('Une tribue voisine organise un raid et pille votre ville');
        $this->setPicture('../layout/img/invasion.png');
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