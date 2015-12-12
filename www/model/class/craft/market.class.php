<?php

class Market extends AbsCraft {

	const GOLD = 100;
    const STONE = 600;
    const WOOD = 600;
    const POP = 150;
    const BYTURNGOLD = 700;
    const BYTURNFOOD = 400;
    const BYTURNSTONE = -150;
    const BYTURNWOOD = -150;

	public function __construct(AbsTown $town, $flag = null) {
        parent::__construct($town);
        $this->setId(13);
        $this->setName('Marché');
        $this->setPicture('../layout/img/market.png');
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
        $town->setGold(self::BYTURNGOLD * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setFood(self::BYTURNFOOD * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setStone(self::BYTURNSTONE * $this->getLevel() * $this->getDamageLevel()/100);
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