<?php

namespace HeroApp\Skills;

class Skill{
    const SKILLS_PREFIX = 'HeroApp\Skills'; 
    private $name;
    private $type;
    private $chance;

    public function getName(){
        return $this->name;
    }

    public function setName($otherName)
    {
        $this->name = $otherName;
    }

    public function getChance()
    {
        return $this->chance;
    }

    public function setChance($otherChance)
    {
        if($otherChance < 0 || $otherChance > 100){
            throw new Exception("Invalid chance!");
        }

        $this->chance = $otherChance;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($otherType)
    {
        $this->type = $otherType;
    }
}