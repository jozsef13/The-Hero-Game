<?php

namespace HeroApp;

class Output{
    private $message;

    public function __construct(){
        $this->message = "";
    }

    public function addMessage($text){
        $this->message .= $text;
    }

    public function displayConsole() {
        echo $this->message;
    }
}