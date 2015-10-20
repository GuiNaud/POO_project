<?php

class Stable extends AbsArmy {

	const GOLD = 400;
    const STONE = 200;
    const WOOD = 200;
    const POP = 100;
    const BYTURNFOOD = -300;
	const BYTURNARMY = 200;
    const BYTURNSTONE = -50;
    const BYTURNWOOD = -100;

	public function __construct(AbsTown $town) {
        parent::__construct($town);
        $this->setId(12);
        $this->setName('Etable');
        $this->setPicture('../layout/img/stable.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
        $town->setProsperity(2);
    }

    public function upgrade(AbsTown $town, $level) {
        parent::upgrade($town, $level);
        $this->setLevel($level);
        $town->setGold(- (self::GOLD * $level)/10);
        $town->setStone(- (self::STONE * $level)/10);
        $town->setWood(- (self::WOOD * $level)/10);
        $town->setProsperity(1);
    }

    public function action(AbsTown $town) {
        $town->setFood(self::BYTURNFOOD * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setArmy(self::BYTURNARMY * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setStone(self::BYTURNSTONE * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(AbsTown $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>