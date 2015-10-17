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

	public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(13);
        $this->setName('Marché');
        $this->setPicture('../layout/img/market.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
        $town->setProsperity(2);
    }

    public function __toString() {
        return 'Nom : '.$this->getName().', id : '.$this->getId().', level : '.$this->getLevel().'<br/>';
    }

    public function upgrade(Town $town, $level) {
        parent::upgrade($town, $level);
        $this->setLevel($level);
        $town->setGold(- (self::GOLD * $level)/10);
        $town->setStone(- (self::STONE * $level)/10);
        $town->setWood(- (self::WOOD * $level)/10);
        $town->setProsperity(1);
    }

    public function damage(Town $town, $damageLevel) {
        parent::damage($town, $damageLevel);
        $town->setGold(- (self::GOLD * $damageLevel)/10);
        $town->setStone(- (self::STONE * $damageLevel)/10);
        $town->setWood(- (self::WOOD * $damageLevel)/10);
        $town->setPopulation(- (self::POP * $damageLevel)/10);
        $town->setPopulationMax(- (self::POP * $damageLevel)/10);
    }

    public function action(Town $town) {
        $town->setGold(self::BYTURNGOLD * $this->getLevel());
        $town->setFood(self::BYTURNFOOD * $this->getLevel());
        $town->setStone(self::BYTURNSTONE * $this->getLevel());
        $town->setWood(self::BYTURNWOOD * $this->getLevel());
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-2);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>