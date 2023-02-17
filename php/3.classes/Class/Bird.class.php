<?php

class Bird extends Animal
{
    public function fly()
    {
        return $this->name . " cannot fly";
    }
}
