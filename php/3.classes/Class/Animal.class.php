<?php

class Animal
{
    protected $name;
    private $noise;

    public function __construct(String $name, String $noise = '')
    {
        $this->name = $name;
        $this->noise = $noise;
    }
    public function setName(String $name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setNoise(String $noise)
    {
        $this->noise = $noise;
    }
    public function getNoise()
    {
        return $this->noise;
    }
    public function makeNoise()
    {
        print $this->noise;
    }
}
