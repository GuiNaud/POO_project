<?php

class House extends AbsCivil {

    const GOLD = 300;
    const STONE = 100;
    const WOOD = 200;
    const POP = 400;
    const BYTURNFOOD = -300;
    const BYTURNWOOD = -50;

    public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(3);
        $this->setName('Maison');
        $this->setPicture('../layout/img/maison.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
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
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-2);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}