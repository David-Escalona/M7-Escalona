<?php
    class Cotxe {
        
        public string $marca = "SEAT";
        public string $model = "ARONA";
        
        public function descripcio(): string {
        return "Aquest cotxe és un " . $this->marca . " " . $this->model . ".";
    }
}