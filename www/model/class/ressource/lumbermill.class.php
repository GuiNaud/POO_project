<?php

class LumberMill extends AbsRessource {

    const GOLD = 100;
    const STONE = 100;
    const WOOD = 0;
    const POP = 100;
    const BYTURNWOOD = 500;


    public function __construct(AbsTown $town) {
        parent::__construct($town);
        $this->setId(6);
        $this->setName('Scierie');
        $this->setPicture('../layout/img/lumbermill.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulationActive(self::POP);
        $town->setProsperity(1);
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
        $town->setWood(self::BYTURNWOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(AbsTown $town) {
        $town->setPopulation(-self::POP);
        $town->setPopulationActive(-self::POP);
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }

}