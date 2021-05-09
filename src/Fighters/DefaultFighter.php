<?php

namespace HeroApp\Fighters;

use HeroApp\Skills\ISkill;
use HeroApp\Skills\Skill;
use HeroApp\Skills\SkillFactory;
use HeroApp\Output;

abstract class DefaultFighter implements IFighter {
    protected $name;
    protected $health;
    protected $speed;
    protected $luck;
    protected $strenght;
    protected $defense;
    protected Output $output;

    public function __construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, Output $defaultOutput){
        $this->health = $defaultHealth;
        $this->speed = $defaultSpeed;
        $this->luck = $defaultLuck;
        $this->strenght = $defaultStrenght;
        $this->defense = $defaultDefense;
        $this->output = $defaultOutput;
        $this->name = $defaultName;
    }

    public function getHealth() : float{
        return $this->health;
    }

    public function hasGreaterSpeedThan($otherSpeed) : bool{
        return $this->speed < $otherSpeed;
    }

    public function isLuckierThan($otherLuck) : bool{
        return $this->luck < $otherLuck;
    }

    public function attackFirst(IFighter $opponent) : bool{
        if($opponent->hasSameSpeedWith($this->speed)){
            return $opponent->isLuckierThan($this->luck);
        }

        return $opponent->hasGreaterSpeedThan($this->speed);
    }

    public function isDead() : bool{
        return $this->health <= 0;
    }

    public function attacks(IFighter $opponent){
        $damage = $opponent->calculateDamage($this->strenght);
        $opponent->defends($damage, $this);
    }

    public function defends($damage, $opponent){
        if($this->luckyEnough()){
            $this->output->addMessage($opponent->getName() ." misses the attack! \r\n");
        } else {
            if($damage > 0){
                $this->applyDamage($damage);
            }
        }
    }

    protected function luckyEnough() : bool{
        if($this->luck > rand(0,100)){
            return true;
        }

        return false;
    }

    protected function calculateDamage($otherStrenght) : int{
        return $otherStrenght - $this->defense;
    }

    protected function applyDamage($damage){
        $this->output->addMessage($this->name ." takes " .$damage ." damage! \r\n");
        $this->health = $this->health - $damage;
    } 

    public function getName() : string{
        return $this->name;
    }

    public function hasSameSpeedWith($otherSpeed) : bool{
        return $this->speed == $otherSpeed;
    }

    public function printStats(){
        $this->output->addMessage("\r\n" .$this->name .": health: " .$this->health ."\r\n strenght: " .$this->strenght ."\r\n luck:" .$this->luck ."\r\n defense: " .$this->defense ."\r\n speed: " .$this->speed ."\r\n");
    }

    public function addSkill($skillName){
        //This fighter does not have skills for now
    }
}