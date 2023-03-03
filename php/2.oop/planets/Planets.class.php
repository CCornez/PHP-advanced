<?php

class Planet
{

    private $name;
    private $diameter;
    private $distanceFromSun;

    public function __construct($name, $diameter, $distanceFromSun)
    {
        $this->name = $name;
        $this->diameter = $diameter;
        $this->distanceFromSun = $distanceFromSun;
    }
    public function __destruct()
    {
        print '<pre>';
        print_r($this);
        print '</pre>';
    }
    public function getCircumference()
    {
        return round(pi() * $this->diameter, 2) . ' km';
    }
}
