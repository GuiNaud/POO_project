<?php

class Tanner extends AbsCraft {

	const GOLD = 400;
    const STONE = 300;
    const WOOD = 300;
    const POP = 50;
    const BYTURNGOLD = 150;
    const BYTURNFOOD = -75;
    const BYTURNWOOD = -30;

	public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(16);
        $this->setName('Tanneur');
        $this->setPicture('../layout/img/tanner.png');
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
    }

    // public function damage(Town $town, $damageLevel) {
    //     parent::damage($town, $damageLevel);
    //     $town->setGold(- (self::GOLD * $damageLevel)/10);
    //     $town->setStone(- (self::STONE * $damageLevel)/10);
    //     $town->setWood(- (self::WOOD * $damageLevel)/10);
    //     $town->setPopulation(- (self::POP * $damageLevel)/10);
    //     $town->setPopulationMax(- (self::POP * $damageLevel)/10);

    // }

    public function damage(Town $town, $damageLevel) {
        parent::damage($town, $damageLevel);
        $this->setDamageLevel($damageLevel);
    }

    public function fix(Town $town){
        //damage level is back to 100
        parent::fix($town);
        $this->setDamageLevel(100);
    }

    public function action(Town $town) {
        $town->setGold(self::BYTURNGOLD * $this->getLevel() * ($this->getDamageLevel()/100));
        $town->setFood(self::BYTURNFOOD * $this->getLevel() * ($this->getDamageLevel()/100));
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * ($this->getDamageLevel()/100));
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}

?>