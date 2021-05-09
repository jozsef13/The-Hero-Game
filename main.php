<?php
require_once realpath("vendor/autoload.php");

use HeroApp\Output;
use HeroApp\Game;
use HeroApp\Fight;
use HeroApp\Skills\ISkill;
use HeroApp\Fighters\FighterFactory;

$output = new Output();
$heroFactory = FighterFactory::buildFactoryClass(FighterFactory::HERO_FACTORY);
$beastFactory = FighterFactory::buildFactoryClass(FighterFactory::BEAST_FACTORY);

$hero = $heroFactory->build($output, "Orderus");
$hero->addSkill(ISkill::MAGIC_SHIELD_NAME);
$hero->addSkill(ISkill::RAPID_STRIKE_NAME);
$beast = $beastFactory->build($output, "Beast");

$fight = new Fight($hero, $beast, $output);
$game = new Game($fight);

$game->start();
$game->ongoing();
$game->over();