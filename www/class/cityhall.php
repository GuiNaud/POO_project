<?php


class CityHall extends Civil {

    const GOLD = 700;
    const STONE = 500;
    const WOOD = 400;
    const POP = 100;

    protected $id;
    protected $name;
    protected $picture;
    protected $level;

    public function __construct(Town $town) {
        parent::__construct($town);
        $this->setId(1);
        $this->setName('Hotel de ville');
        $this->setPicture('../layout/img/cityhall.png');
        $this->setLevel(1);
        $town->gold             -= self::GOLD;
        $town->stone            -= self::STONE;
        $town->wood             -= self::WOOD;
        $town->population       += self::POP;
        $town->populationMax    += self::POP;
        $town->populationActive += self::POP;
    }

    public function __destruct(Town $town) {
        parent::__destruct($town);
        $town->population       -= self::POP;
        $town->populationMax    -= self::POP;
        $town->populationActive -= self::POP;
    }

    public function upgrade(Town $town, $level) {
        parent::upgrade($town, $level);
        $this->setLevel($level);
        $town->gold             -= (self::GOLD * $level)/100;
        $town->stone            -= (self::STONE * $level)/100;
        $town->wood             -= (self::WOOD * $level)/100;
    }

    public function damage(Town $town, $damageLevel) {
        parent::damage($town, $damageLevel);
        $town->gold             -= (self::GOLD * $damageLevel)/100;
        $town->stone            -= (self::STONE * $damageLevel)/100;
        $town->wood             -= (self::WOOD * $damageLevel)/100;
        $town->population       -= (self::POP * $damageLevel)/100;
        $town->populationMax    -= (self::POP * $damageLevel)/100;
        $town->populationActive -= (self::POP * $damageLevel)/100;
    }

    public function action(Town $town) {
        $town->gold += 300 * $this->getLevel();
        $town->wood -= 50;
    }

    //Getters

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getLevel()
    {
        return $this->level;
    }

    //Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

}