<?php

abstract class AbsArmy implements IntBuilding {

    protected $id;
    protected $name;
    protected $picture;
    protected $level;

    public function __construct(Town $town) {
        $town->setProsperity(1);
    }

    public function upgrade(Town $town, $level) {
        $town->setProsperity(1);
    }

    public function damage(Town $town, $damageLevel) {
        $town->setProsperity(-1);
    }

    public function action(Town $town) {}

    public function destroy(Town $town) {
        $town->setProsperity(-1);
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