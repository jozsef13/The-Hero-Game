<?php

namespace HeroApp\Skills;

interface ISkill{
    const ATTACK_TYPE = 0;
    const DEFENCE_TYPE = 1;

    const MAGIC_SHIELD_NAME = Skill::SKILLS_PREFIX .'\MagicShieldSkill';
    const RAPID_STRIKE_NAME = Skill::SKILLS_PREFIX .'\RapidStrikeSkill';

    public function __construct();
    public function canApply() : bool;
    public function apply($attribute);
}