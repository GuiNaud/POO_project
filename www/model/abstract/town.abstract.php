<?php

abstract class AbsTown
{
    protected $name;
    protected $level;
    protected $turn;
    protected $zone;
    protected $population;
    protected $populationMax;
    protected $populationActive;
    protected $wood;
    protected $stone;
    protected $gold;
    protected $food;
    protected $army;
    protected $prosperity;

    public function __construct($name, $level = null, $turn = null, $zone = null, $pop = null, $popmax = null,
                                $popactive = null, $wood = null, $stone = null, $gold = null, $food = null,
                                $army = null, $prosp = null)
    {
        $this->name = $name;
        $this->level = $level ? $level : 1;
        $this->turn = $turn ? $turn : $this->getTurn() + 1;
        $this->zone = $zone ? $zone : $zone = array(0 => '1:1:1:1');
        $this->population = $pop ? $pop : 100;
        $this->populationMax = $popmax ? $popmax : 100;
        $this->populationActive = $popactive ? $popactive : 0;
    }

    public function __toString() {
        return 'Nom de la ville : '.$this->getName().'<br/>';
    }

    // GETTERS SETTERS //

    public function getName()
    {
        return $this->name;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getTurn()
    {
        return $this->turn;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function getPopulation()
    {
        return $this->population;
    }

    public function getPopulationMax()
    {
        return $this->populationMax;
    }

    public function getPopulationActive()
    {
        return $this->populationActive;
    }

    public function getGold()
    {
        return $this->gold;
    }

    public function getWood()
    {
        return $this->wood;
    }

    public function getStone()
    {
        return $this->stone;
    }

    public function getFood()
    {
        return $this->food;
    }

    public function getProsperity()
    {
        return $this->prosperity;
    }

    public function getArmy()
    {
        return $this->army;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setTurn($turn)
    {
        $this->turn = $turn;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    public function setPopulation($population)
    {
        $this->population += $population;
    }

    public function setPopulationMax($populationMax)
    {
        $this->populationMax += $populationMax;
    }

    public function setPopulationActive($populationActive)
    {
        $this->populationActive += $populationActive;
    }

    public function setGold($gold)
    {
        $this->gold += $gold;
    }

    public function setWood($wood)
    {
        $this->wood += $wood;
    }

    public function setStone($stone)
    {
        $this->stone += $stone;
    }

    public function setFood($food)
    {
        $this->food += $food;
    }

    public function setProsperity($prosperity)
    {
        $this->prosperity += $prosperity;
    }

    public function setArmy($army)
    {
        $this->army += $army;
    }

    // TOWN MAIN FUNCTIONS //

    protected abstract function processByTurn();

    protected function createBuilding($position, $type)
    {
        $this->zone[$position] = new $type();
    }

    protected function destructBuilding($position)
    {
        $this->zone[$position] = null;
    }
}

?>