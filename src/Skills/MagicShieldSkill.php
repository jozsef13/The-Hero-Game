<?php

namespace HeroApp\Skills;

class MagicShieldSkill extends Skill implements ISkill{

    public function __construct(){
        $this->setType(ISkill::DEFENCE_TYPE);
        $this->setName("Magic Shield");
        $this->setChance(20);
    }

    public function canApply() : bool{
        return $this->getChance() >= rand(0,100);
    }

    public function apply($attribute){
        $attribute = $attribute/2;
        return $attribute;
    }
}