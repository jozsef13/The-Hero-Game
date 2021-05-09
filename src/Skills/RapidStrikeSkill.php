<?php

namespace HeroApp\Skills;

class RapidStrikeSkill extends Skill implements ISkill{

    public function __construct(){
        $this->setType(ISkill::ATTACK_TYPE);
        $this->setName("Rapid Strike");
        $this->setChance(10);
    }

    public function canApply() : bool{
        return $this->getChance() >= rand(0,100);
    }

    public function apply($attribute){
        $attribute = $attribute*2;
        return $attribute;
    }
}