<?php

namespace HeroApp\Fighters;

use HeroApp\Skills\ISkill;
use HeroApp\Skills\Skill;
use HeroApp\Skills\SkillFactory;
use HeroApp\Output;

interface IFighter{
    public function __construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, Output $defaultOutput);
    public function addSkill($skillName);
    public function hasGreaterSpeedThan($otherSpeed) : bool;
    public function isLuckierThan($otherLuck) : bool;
    public function attackFirst(IFighter $opponent) : bool;
    public function isDead() : bool;
    public function attacks(IFighter $opponent);
    public function defends($damage, $opponent);
    public function hasSameSpeedWith($otherSpeed) : bool;
    public function printStats();
    public function getHealth() : float;
    public function getName() : string;
}