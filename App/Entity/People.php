<?php

namespace App\Entity;

class People
{
    private $id;
    private $name;
    private $email;
    private $gen;
    private $state;

    public function __construct($id = 0, $name = '', $email = '', $gen = '', $state = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gen = $gen;
        $this->state = $state;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setEmail(string $email)
    {
        $this->email = strtolower($email);
    }
    public function setGen($gen)
    {
        $this->gen = $gen;
    }
    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getGen()
    {
        return $this->gen;
    }
    public function getState()
    {
       return $this->state;
    }
}
