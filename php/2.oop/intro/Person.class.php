<?php

class Person
{
    // VARIABLES

    private $firstName = '';
    private $name = '';
    private $age = 0;
    private $sex = '';



    // SETTERS

    public function setFirstName($str)
    {
        $this->firstName = $str;
    }
    public function setName($str)
    {
        $this->name = $str;
    }
    public function setAge($n)
    {
        $this->age = $n;
    }
    public function setSex($str)
    {
        $this->sex = $str;
    }

    // GETTERS

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getInitials()
    {
        $fullName = $this->firstName . ' ' . $this->name;
        $words = explode(" ", $fullName);
        $result = '';
        foreach ($words as $word) {
            $result .= substr($word, 0, 1);
        }
        return $result;
    }
}
