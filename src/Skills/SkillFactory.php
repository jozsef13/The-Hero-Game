<?php

namespace HeroApp\Skills;

class SkillFactory {
    public static function build($class) : ISkill{
        return new $class();
    }
}