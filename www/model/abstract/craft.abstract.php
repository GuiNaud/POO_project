<?php

abstract class AbsCraft implements IntBuilding {

    protected $id;
    protected $name;
    protected $picture;
    protected $level;
    protected $damageLevel; //from 100 to 0, 100 = the building works at 100%, 0 = at 0%

    public function __construct(Town $town) {
        $town->setProsperity(1);
    }

    public function upgrade(Town $town, $level) {
        $town->setProsperity(1);
    }

    //new
    public function damage(Town $town, $damageLevel) {
        $town->setProsperity(-1);
    }

    //new
    public function fix(Town $town) {
        $town->setProsperity(1);
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

    //new
    public function getDamageLevel(){
        return $this->damageLevel;
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

    //new
    public function setDamageLevel($damageLevel){
        $this->damageLevel = $damageLevel;
    }

}