<?php

class CelticTown extends AbsTown
{
    public function __construct($name, $level = null, $turn = null, $zone = null, $pop = null, $popmax = null,
                                $popactive = null, $wood = null, $stone = null, $gold = null, $food = null,
                                $army = null, $prosp = null)
    {
        parent::__construct($name, $level = null, $turn = null, $zone = null, $pop = null, $popmax = null,
            $popactive = null, $wood = null, $stone = null, $gold = null, $food = null,
            $army = null, $prosp = null);
        $ratio = 0.2;
        if($this->getTurn() == 1) {
            $this->setArmy(floor(1000 * (1-$ratio)));
            $this->setStone(floor(1000 * (1+$ratio)));
        }
    }

    public function process()
    {
        //maths
    }
}