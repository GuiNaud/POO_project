<?php

class GallicTown extends AbsTown
{
    public function __construct($name, $level = null, $turn = null, $zone = null, $pop = null, $popmax = null,
                                $popactive = null, $wood = null, $stone = null, $gold = null, $food = null,
                                $army = null, $prosp = null)
    {
        parent::__construct($name, $level = null, $turn = null, $zone = null, $pop = null, $popmax = null,
            $popactive = null, $wood = null, $stone = null, $gold = null, $food = null,
            $army = null, $prosp = null);
    }

    public function processByTurn() {
        $ratio = 0.2;
        switch($this->getTurn()) {
            case 1 :
                $this->setArmy(floor($this->getArmy() + ($this->getArmy() * $ratio)));
                $this->setWood(floor($this->getWood() - ($this->getWood() * $ratio)));
                break;
        }
    }
}