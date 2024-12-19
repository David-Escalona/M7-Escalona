<?php
    class Cotxe {
        
        public string $marca;
        public string $model;
        
        public function descripcio(): string {
        return "Aquest cotxe és un " . $this->marca . " " . $this->model . ".";
    }
}