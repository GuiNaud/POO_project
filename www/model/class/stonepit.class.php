<?php

class StonePit extends AbsRessource {

    const GOLD = 100;
    const STONE = 0;
    const WOOD = 100;
    const POP = 100;
    const BYTURNSTONE = 500;


    public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(7);
        $this->setName('Carrière');
        $this->setPicture('../layout/img/stonepit.png');
        $this->setLevel(1);
        $town->setGold(- (self::GOLD));
        $town->setStone(- (self::STONE));
        $town->setWood(- (self::WOOD));
        $town->setPopulationActive(self::POP);
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
        $town->setStone(- (self::WOOD * $damageLevel)/10);
        $town->setPopulation(- (self::POP * $damageLevel)/10);
        $town->setPopulationActive(- (self::POP * $damageLevel)/10);
        $town->setProsperity(-1);
    }

    public function action(Town $town) {
        $town->setStone(self::BYTURNSTONE * $this->getLevel());
    }

    public function destroy(Town $town) {
        $town->setPopulation(-self::POP);
        $town->setPopulationActive(-self::POP);
        $town->setProsperity(-1);
        //retirer en bdd l'id et les coordonnées du batiment pour qu'il disparaisse
    }
}