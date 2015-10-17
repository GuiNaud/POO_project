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

	public function __construct(Town $town) {
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
        $town->setFood(self::BYTURNFOOD * $this->getLevel());
        $town->setArmy(self::BYTURNARMY * $this->getLevel());
        $town->setStone(self::BYTURNSTONE * $this->getLevel());
        $town->setWood(self::BYTURNWOOD * $this->getLevel());
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>