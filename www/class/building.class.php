<?php

interface Building {

    public function __construct(Town $town);
    public function __destruct(Town $town);
    public function upgrade(Town $town, $level);
    public function damage(Town $town, $damageLevel);
    public function action(Town $town);
}