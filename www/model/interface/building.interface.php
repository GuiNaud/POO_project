<?php

interface IntBuilding {

    public function __construct(AbsTown $town);
    public function upgrade(AbsTown $town, $level);
    public function damage(AbsTown $town, $damageLevel);
    public function fix(AbsTown $town);
    public function action(AbsTown $town);
    public function destroy(AbsTown $town);
}