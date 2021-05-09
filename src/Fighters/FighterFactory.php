<?php

namespace HeroApp\Fighters;

use HeroApp\Output;

abstract class FighterFactory {
    const FACTORY_CLASS_PREFIX = 'HeroApp\Fighters';
    const HERO_FACTORY = FighterFactory::FACTORY_CLASS_PREFIX .'\HeroFactory';
    const BEAST_FACTORY = FighterFactory::FACTORY_CLASS_PREFIX .'\BeastFactory';

    abstract public function build($output, $name) : IFighter;

    public static function buildFactoryClass($factoryClass) : FighterFactory{
        return new $factoryClass();
    }
}