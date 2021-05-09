<?php

namespace HeroApp\Fighters;

use HeroApp\Output;

class BeastFactory extends FighterFactory {
    public function build($output, $name) : IFighter {
        return new Beast(rand(40, 60), rand(25, 40), rand(60, 90), rand(60, 90), rand(40, 60), $name, $output);
    }
}