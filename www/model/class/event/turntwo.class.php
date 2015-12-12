<?php


class TurnTwo extends AbsEvent{

    const GOLD = 1000;
    const WOOD = 500;
    const STONE = 500;
    const FOOD = 500;
    const ARMY = 100;
    const PROSPERITY = 10;

    public function __construct(AbsTown $town) {
        $this->setName('Commerce en &eacuteveil');
        $this->setMessage('La vie s\'organise, et les villageois commencent &agrave vendre leurs produits aux voyageurs de passage.');
        $this->setPicture('../layout/img/turntwo.png');
    }

    public function action(AbsTown $town) {
        $town->setTurn(2);
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }
}