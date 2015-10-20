<?php

class Desertion extends AbsEvent{

    const GOLD = -500;
    const WOOD = -200;
    const STONE = -200;
    const FOOD = -200;
    const PROSPERITY = -5;
    const POPULATION = -100;

    public function __construct(AbsTown $town) {
        $this->setName('D&eacutesertion');
        $this->setMessage('Certains de vos villageois ont d&eacutecid&eacute de partir rejoindre une autre communauté');
        $this->setPicture('../layout/img/invasion.png');
    }

    public function actionDesertion(AbsTown $town, House $house) {
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setProsperity(self::PROSPERITY);
        $house->destroy($town);
    }

}