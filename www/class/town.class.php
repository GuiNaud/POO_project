<?php

abstract class Town
{
    protected $name;
    protected $level = 0;
    protected $turn = 0;
    protected $event;
    protected $zone = array();
    protected $population;
    protected $populationmax;
    protected $populationactive;
    protected $gold;
    protected $wood;
    protected $stone;
    protected $food;
    protected $prosperity;

    public function __construct($gold, $wood, $stone, $food, $prosperity)
    {
        $this->gold = $gold;
        $this->wood = $wood;
        $this->stone = $stone;
        $this->food = $food;
        $this->prosperity = $prosperity;
    }

    protected abstract function harvest();

    protected function createBuilding($position, $type)
    {
        $this->zone[$position] = new $type();
    }

    protected function destructBuilding($position)
    {
        $this->zone[$position] = null;
    }

    protected function getEvent()
    {

    }
}

?>