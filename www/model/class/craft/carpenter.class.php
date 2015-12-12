<?php

class Carpenter extends AbsCraft {

	const GOLD = 400;
    const STONE = 300;
    const WOOD = 300;
    const POP = 50;
    const BYTURNGOLD = 250;
    const BYTURNWOOD = -125;

	public function __construct(AbsTown $town, $flag = null) {
        parent::__construct($town);
        $this->setId(14);
        $this->setName('Charpentier');
        $this->setPicture('../layout/img/carpenter.png');
        $this->setLevel(1);
        if(!$flag) {
            $town->setGold(- (self::GOLD));
            $town->setStone(- (self::STONE));
            $town->setWood(- (self::WOOD));
            $town->setPopulation(self::POP);
            $town->setPopulationMax(self::POP);
            $town->setProsperity(1);
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
        $town->setGold(self::BYTURNGOLD * $this->getLevel() * $this->getDamageLevel()/100);
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