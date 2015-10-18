<?php

class TurnThree extends AbsEvent {

    const GOLD = 500;
    const WOOD = 200;
    const STONE = 200;
    const FOOD = 200;
    const ARMY = 50;
    const PROSPERITY = 5;

    public function __construct(Town $town) {
        $this->setName('Entraînement Militaire');
        $this->setMessage('L\'agitation des alentours inquiètent vos citoyens, les forçant à se défendre.');
        $this->setPicture('../layout/img/turnthree.png');
    }

    public function action(Town $town) {
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }

}