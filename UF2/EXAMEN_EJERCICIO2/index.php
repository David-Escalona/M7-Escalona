<?php

class JocAdivinacio {
    public $numeroSecret;
    public $intents;

    public function __construct() {
        $this->numeroSecret = rand(1, 20);
        $this->intents = 0;
    }
}
?>
