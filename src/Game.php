<?php

namespace HeroApp;

class Game{
    private $fight;

    public function __construct(Fight $otherFight){
        $this->fight = $otherFight;
    }

    public function start(){
        $this->fight->decideFightingOrder();
    }

    public function ongoing(){
        $this->fight->ongoingFight();
    }

    public function over(){
        $this->fight->endFight();
    }
}