<?php

namespace HeroApp\Fighters;

use HeroApp\Skills\ISkill;
use HeroApp\Skills\Skill;
use HeroApp\Skills\SkillFactory;
use HeroApp\Output;

class Beast extends DefaultFighter implements IFighter{
    public function __construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, Output $defaultOutput){
        parent::__construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, $defaultOutput);
    }
}