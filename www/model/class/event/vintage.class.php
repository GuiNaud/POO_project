<?php

class Vintage extends AbsEvent{

    const GOLD = 500;
    const FOOD = 1000;
    const PROSPERITY = 5;

    public function __construct(AbsTown $town) {
        $this->setName('R&eacutecoltes florissantes');
        $this->setMessage('Les récoltes dépassent toutes les &eacutesp&eacuterances.');
        $this->setPicture('../layout/img/vintage.png');
    }

    public function action(AbsTown $town) {
        $town->setGold(self::GOLD);
        $town->setFood(self::FOOD);
        $town->setProsperity(self::PROSPERITY);
    }

}