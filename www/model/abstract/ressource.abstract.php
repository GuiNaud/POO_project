<?php


abstract class AbsRessource implements IntBuilding {

    protected $id;
    protected $name;
    protected $picture;
    protected $level;
    protected $damageLevel; //from 100 to 0, 100 = the building works at 100%, 0 = at 0%

    public function __construct(AbsTown $town) {
        $town->setProsperity(1);
    }

    public function __toString() {
        return 'Nom : '.$this->getName().', id : '.$this->getId().', level : '.$this->getLevel().'<br/>';
    }

    public function upgrade(AbsTown $town, $level) {
        $town->setProsperity(1);
    }

    public function damage(AbsTown $town, $damageLevel) {
        $town->setProsperity(-1);
        $this->setDamageLevel($damageLevel);
    }

    public function fix(AbsTown $town) {
        //damage level is back to 100
        $town->setProsperity(1);
        $this->setDamageLevel(100);
    }

    public function action(AbsTown $town) {}

    public function destroy(AbsTown $town) {
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

    public function setDamageLevel($damageLevel){
        $this->damageLevel = $damageLevel;
    }
}