<?php

abstract class Town
{
    protected $name;
    protected $level = 0;
    protected $turn = 0;
    protected $event = 0;
    protected $zone = array();
    protected $population = 0;
    protected $populationMax = 0;
    protected $populationActive = 0;
    protected $gold = 100;
    protected $wood = 20;
    protected $stone = 20;
    protected $food = 10;
    protected $prosperity = 0;
    protected $army = 0;
    protected $market = 0;

    // GETTERS SETTERS //

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getTurn()
    {
        return $this->turn;
    }

    public function setTurn($turn)
    {
        $this->turn = $turn;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    public function getPopulation()
    {
        return $this->population;
    }

    public function setPopulation($population)
    {
        $this->population = $population;
    }

    public function getPopulationMax()
    {
        return $this->populationMax;
    }

    public function setPopulationMax($populationMax)
    {
        $this->populationMax = $populationMax;
    }

    public function getPopulationActive()
    {
        return $this->populationActive;
    }

    public function setPopulationActive($populationActive)
    {
        $this->populationActive = $populationActive;
    }

    public function getGold()
    {
        return $this->gold;
    }

    public function setGold($gold)
    {
        $this->gold = $gold;
    }

    public function getWood()
    {
        return $this->wood;
    }

    public function setWood($wood)
    {
        $this->wood = $wood;
    }

    public function getStone()
    {
        return $this->stone;
    }

    public function setStone($stone)
    {
        $this->stone = $stone;
    }

    public function getFood()
    {
        return $this->food;
    }

    public function setFood($food)
    {
        $this->food = $food;
    }

    public function getProsperity()
    {
        return $this->prosperity;
    }

    public function setProsperity($prosperity)
    {
        $this->prosperity = $prosperity;
    }

    public function getArmy()
    {
        return $this->army;
    }

    public function setArmy($army)
    {
        $this->army = $army;
    }

    protected function createBuilding($position, $type)
    {
        $this->zone[$position] = new $type();
    }

    protected function destructBuilding($position)
    {
        $this->zone[$position] = null;
    }

    public function getMarket()
    {
        return $this->market;
    }

    public function setMarket($market)
    {
        $this->market = $market;
    }

    // TOWN MAIN FUNCTIONS //

    protected abstract function process();

    protected function getEvent()
    {

    }
}

?>