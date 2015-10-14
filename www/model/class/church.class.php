<?php

class Church extends AbsCivil {

    const GOLD = 1000;
    const STONE = 800;
    const WOOD = 700;
    const POP = 50;
    const BYTURNFOOD = -300;
    const BYTURNWOOD = -50;


    public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(4);
        $this->setName('Château');
        $this->setPicture('../layout/img/castle.png');
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
        $town->setProsperity(2);
    }

    public function damage(Town $town, $damageLevel) {
        parent::damage($town, $damageLevel);
        $town->setGold(- (self::GOLD * $damageLevel)/10);
        $town->setStone(- (self::STONE * $damageLevel)/10);
        $town->setStone(- (self::WOOD * $damageLevel)/10);
        $town->setPopulation(- (self::POP * $damageLevel)/10);
        $town->setPopulationMax(- (self::POP * $damageLevel)/10);
        $town->setProsperity(-2);
    }

    public function action(Town $town) {
        $town->setFood(- (self::BYTURNFOOD * $this->getLevel()));
        $town->setWood(- (self::BYTURNWOOD * $this->getLevel()));
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-5);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}