<?php

class Smithy extends AbsArmy {

	const GOLD = 400;
    const STONE = 300;
    const WOOD = 150;
    const POP = 50;
    const BYTURNFOOD = -100;
	const BYTURNARMY = 100;
    const BYTURNSTONE = -200;
	const BYTURNWOOD = -100;

	public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(10);
        $this->setName('Forge');
        $this->setPicture('../layout/img/smithy.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
        $town->setProsperity(1);
    }

    public function upgrade(Town $town, $level) {
        parent::upgrade($town, $level);
        $this->setLevel($level);
        $town->setGold(- (self::GOLD * $level)/10);
        $town->setStone(- (self::STONE * $level)/10);
        $town->setWood(- (self::WOOD * $level)/10);
        $town->setProsperity(1);
    }

    public function action(Town $town) {
        $town->setFood(self::BYTURNFOOD * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setArmy(self::BYTURNARMY * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setStone(self::BYTURNSTONE * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>