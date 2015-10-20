<?php


class TurnOne extends AbsEvent{

    const GOLD = 2000;
    const WOOD = 1000;
    const STONE = 1000;
    const FOOD = 1000;
    const ARMY = 200;
    const PROSPERITY = 20;

    public function __construct(AbsTown $town) {
        $this->setName('Bienvenue à '.$town->getName());
        $this->setMessage('Quelques hommes et femmes se sont réunis avec leurs familles,
                            et ont créé une petite communauté<br>. À vous de la faire grandir
                            et de la faire prospérer.<br>Mais attention ! Le danger n\'est jamais loin...');
        $this->setPicture('../layout/img/start.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setWood(self::WOOD);
        $town->setStone(self::STONE);
        $town->setFood(self::FOOD);
        $town->setArmy(self::ARMY);
        $town->setProsperity(self::PROSPERITY);
    }
}