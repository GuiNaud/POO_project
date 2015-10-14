<?php

class CelticTown extends Town
{
    public function __construct($name)
    {
        $ratio = 0.2;
        $this->name = $name;
        $this->army = floor($this->army * (1-$ratio));
        $this->market = floor($this->market * (1+$ratio));
    }

    public function process()
    {
        //maths
    }
}