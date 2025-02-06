<?php

class Factura {
    
    public $client;
    public $producte;
    public $quantitat;
    public $preuUnitari;
    
    public function calcularTotal() {
        return $this->client . " - " . $this->producte . " - " . $this->quantitat . " - " . $this->preuUnitari . " ";
    }

}


?>