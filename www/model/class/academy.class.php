<?php

class Academy extends AbsArmy {

	const GOLD = 500;
    const STONE = 200;
    const WOOD = 200;
    const POP = 100;
    const BYTURNFOOD = -100;
	const BYTURNARMY = 300;

	public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(11);
        $this->setName('Academie');
        $this->setPicture('../layout/img/academy.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
        $town->setProsperity(1);
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
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>