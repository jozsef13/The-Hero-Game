<?php

namespace HeroApp\Fighters;

use HeroApp\Skills\ISkill;
use HeroApp\Skills\Skill;
use HeroApp\Skills\SkillFactory;
use HeroApp\Output;

class Hero extends DefaultFighter implements IFighter{
    protected $skills;

    public function __construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, Output $defaultOutput){
        parent::__construct($defaultSpeed, $defaultLuck, $defaultHealth, $defaultStrenght, $defaultDefense, $defaultName, $defaultOutput);
        $this->skills = [];
    }

    public function attacks(IFighter $opponent){
        $damage = $opponent->calculateDamage($this->strenght);

        foreach($this->skills as $skill){
            if($skill->getType() == ISkill::ATTACK_TYPE){
                if($skill->canApply()){
                    $damage = $skill->apply($damage);
                    $this->output->addMessage($this->name ." applies Rapid Strike! \r\n");
                }
            }
        }

        $opponent->defends($damage, $this);
    }

    public function defends($damage, $opponent){
        if($this->luckyEnough()){
            $this->output->addMessage($opponent->getName() ." misses the attack! \r\n");
        } else {
            if($damage > 0){
                foreach($this->skills as $skill){
                    if($skill->getType() == ISkill::DEFENCE_TYPE){
                        if($skill->canApply()){
                            $damage = $skill->apply($damage);
                            $this->output->addMessage($this->name ." applies Magic Shield! \r\n");
                        }
                    }
                }
                
                $this->applyDamage($damage);
            }
        }
    }

    public function addSkill($skillName){
        $skill = SkillFactory::build($skillName);
        array_push($this->skills, $skill);
    }

    public function printStats(){
        parent::printStats();
        $this->output->addMessage($this->name ." has the following skills: ");
        foreach($this->skills as $skill){
            $this->output->addMessage($skill->getName());
            if($skill == end($this->skills)){
                $this->output->addMessage("\r\n");
            } else {
                $this->output->addMessage(", ");
            }
        }
    }
}