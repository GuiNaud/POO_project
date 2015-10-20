<?php


class CityHall extends AbsCivil {

    const GOLD = 700;
    const STONE = 500;
    const WOOD = 400;
    const POP = 100;
    const BYTURNGOLD = -300;
    const BYTURNWOOD = -50;

    public function __construct(AbsTown $town) {
        parent::__construct($town);
        $this->setId(1);
        $this->setName('Hotel de ville');
        $this->setPicture('../layout/img/cityhall.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulation(self::POP);
        $town->setPopulationMax(self::POP);
        $town->setProsperity(1);
    }

    public function upgrade(AbsTown $town, $level) {
        parent::upgrade($town, $level);
        $this->setLevel($level);
        $town->setGold(- (self::GOLD * $level)/10);
        $town->setStone(- (self::STONE * $level)/10);
        $town->setWood(- (self::WOOD * $level)/10);
        $town->setProsperity(2);
    }

    public function action(AbsTown $town) {
        $town->setGold(self::BYTURNGOLD * $this->getLevel() * $this->getDamageLevel()/100);
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(Town $town) {
        $town->setPopulation(- (self::POP));
        $town->setPopulationMax(- (self::POP));
        $town->setProsperity(-4);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }

}