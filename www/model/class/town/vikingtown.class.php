<?php

class VikingTown extends AbsTown
{
    public function __construct($name)
    {
        $ratio = 0.2;
        $this->name = $name;
        $this->prosperity = floor($this->prosperity * (1-$ratio));
        $this->army = floor($this->army * (1+$ratio));
    }

    public function process()
    {
        //maths
    }
}