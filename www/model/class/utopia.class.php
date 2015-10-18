<?php

class Utopia extends AbsEvent {

    const GOLD = 2000;
    const WOOD = 1500;
    const STONE = 1500;
    const FOOD = 1500;
    const ARMY = 500;
    const PROSPERITY = 10;

    public function __construct(Town $town) {
        $this->setName('Utopie');
        $this->setMessage('Tous les voyants sont au vert. Votre population nage dans le bonheur et l\'opulence.');
        $this->setPicture('../layout/img/utopia.png');
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