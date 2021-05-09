<?php

namespace HeroApp\Fighters;

use HeroApp\Output;

class HeroFactory extends FighterFactory {
    public function build($output, $name) : IFighter {
        return new Hero(rand(40, 50), rand(10, 30), rand(70, 100), rand(70, 80), rand(45, 55), $name, $output);
    }
}