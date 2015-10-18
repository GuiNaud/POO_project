<?php

class Field extends AbsRessource {

    const GOLD = 100;
    const STONE = 100;
    const WOOD = 100;
    const POP = 100;
    const BYTURNFOOD = 500;


    public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(8);
        $this->setName('Champs');
        $this->setPicture('../layout/img/field.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulationActive(self::POP);
        $town->setProsperity(1);
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
        $town->setFOOD(self::BYTURNFOOD * $this->getLevel() * $this->getDamageLevel()/100);
    }

    public function destroy(Town $town) {
        $town->setPopulation(-self::POP);
        $town->setPopulationActive(-self::POP);
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}