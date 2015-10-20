<?php

class RomainTown extends AbsTown
{
    public function __construct($name)
    {
        $ratio = 0.2;
        $this->name = $name;
        $this->food = floor($this->food * (1-$ratio));
        $this->stone = floor($this->stone * (1-$ratio));
        $this->army = floor($this->army * (1+$ratio));
        $this->prosperity = floor($this->prosperity * (1+$ratio));
    }

    public function process()
    {
        //maths
    }
}