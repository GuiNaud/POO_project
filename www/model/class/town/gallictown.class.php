<?php

class GalkicTown extends AbsTown
{
    public function __construct($name)
    {
        $ratio = 0.2;
        $this->name = $name;
        $this->food = floor($this->food * (1-$ratio));
        $this->wood = floor($this->wood * (1+$ratio));
    }

    public function process()
    {
        //maths
    }
}