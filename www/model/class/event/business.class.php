<?php

class Business extends AbsEvent{

    const GOLD = 1000;
    const WOOD = 500;
    const STONE = 500;
    const FOOD = 500;
    const PROSPERITY = 5;

    public function __construct(AbsTown $town) {
        $this->setName('Balance commerciale positive');
        $this->setMessage('Les investissements pass&eacutes commencent &agrave rapporter des inter&ecircts juteux.');
        $this->setPicture('../layout/img/business.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setProsperity(self::PROSPERITY);
    }

}