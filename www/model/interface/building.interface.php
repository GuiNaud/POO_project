<?php

interface IntBuilding {

    public function __construct(Town $town);
    public function upgrade(Town $town, $level);
    public function damage(Town $town, $damageLevel);
    public function fix(Town $town);
    public function action(Town $town);
    public function destroy(Town $town);
}