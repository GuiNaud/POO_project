<?php

class Barrack extends AbsArmy {

	const GOLD = 600;
    const STONE = 200;
    const WOOD = 400;
    const POP = 200;
    const BYTURNFOOD = -200;
	const BYTURNARMY = 200;
	const BYTURNWOOD = -50;

	public function __construct(AbsTown $town, $flag = null) {
        parent::__construct($town);
        $this->setId(9);
        $this->setName('Caserne');
        $this->setPicture('../layout/img/barrack.png');
        $this->setLevel(1);
        if(!$flag) {
            $town->setGold(- (self::GOLD));
            $town->setStone(- (self::STONE));
            $town->setWood(- (self::WOOD));
            $town->setPopulation(self::POP);
            $town->setPopulationMax(self::POP);
            $town->setProsperity(2);
        }
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
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(AbsTown $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-2);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>