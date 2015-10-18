<?php

class War extends AbsEvent{

    const GOLD = -1000;
    const WOOD = -400;
    const STONE = -400;
    const FOOD = -400;
    const ARMY = -500;
    const PROSPERITY = -10;

    public function __construct(Town $town) {
        $this->setName('Guerre');
        $this->setMessage('Une tribue voisine vous d&eacuteclare la guerre. Vous pouvez soit l\'affronter ou n&eacutegocier la paix.');
        $this->setPicture('../layout/img/war.png');
    }

    public function actionWar(Town $town, $choice) {
        if(!$choice) {
            $town->setWood(self::WOOD);
            $town->setStone(self::STONE);
            $town->setFood(self::FOOD);
            $town->setArmy(self::ARMY);
            $town->setProsperity(self::PROSPERITY);
        } else {
            $town->setGold(self::GOLD);
            $town->setProsperity(self::PROSPERITY);
        }

    }

}