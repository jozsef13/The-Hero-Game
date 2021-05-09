<?php

namespace HeroApp;

use HeroApp\Fighters\IFighter;

class Fight{

    private IFighter $hero;
    private IFighter $beast;
    private Output $output;
    private $turn = 0;
    private $heroTurnToAttack = false;
    private $beastTurnToAttack = false;

    public function __construct(IFighter $fighter1, IFighter $fighter2, Output $otherOutput){
        $this->hero = $fighter1;
        $this->beast = $fighter2;
        $this->output = $otherOutput;
    }

    public function decideFightingOrder(){
        $this->hero->printStats();
        $this->beast->printStats();
        $this->heroTurnToAttack = $this->hero->attackFirst($this->beast);
        $this->beastTurnToAttack = $this->beast->attackFirst($this->hero);
    }

    public function ongoingFight(){
        $dead = false;
        while($this->turn <= 20 && $dead == false){
            $this->turn++;
            $this->output->addMessage("\nRound " .$this->turn ."\n");
            $this->output->addMessage($this->hero->getName() ." health: " .$this->hero->getHealth() ."\n");
            $this->output->addMessage($this->beast->getName() ." health: " .$this->beast->getHealth() ."\r\n");

            if($this->heroTurnToAttack){
                $this->output->addMessage($this->hero->getName() ." attacks " .$this->beast->getName() ."\r\n");
                $this->hero->attacks($this->beast);
                $this->heroTurnToAttack = false;
                $this->beastTurnToAttack = true;
            } else if($this->beastTurnToAttack){
                $this->output->addMessage($this->beast->getName() ." attacks " .$this->hero->getName() ."\r\n");
                $this->beast->attacks($this->hero);
                $this->heroTurnToAttack = true;
                $this->beastTurnToAttack = false;
            }

            if($this->hero->isDead() || $this->beast->isDead()){
                $dead = true;
            }

            $this->output->addMessage($this->hero->getName() ." health: " .$this->hero->getHealth() ."\n");
            $this->output->addMessage($this->beast->getName() ." health: " .$this->beast->getHealth() ."\r\n");
        }
    }

    public function endFight(){
        if($this->turn > 20){
            $this->output->addMessage("Draw\n");
        }

        if($this->hero->isDead()){
            $this->output->addMessage("\r\n" .$this->beast->getName() ." wins!\n");
        } else if ($this->beast->isDead()){
            $this->output->addMessage("\r\n" .$this->hero->getName() ." wins!\n");
        }

        $this->output->displayConsole();
    }
}