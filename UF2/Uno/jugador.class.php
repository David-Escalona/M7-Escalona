<?php

class Jugador {
    public $mano = [];
    public $id;
    
    public function __construct($id) {
        $this->id = $id;
    }
    
    public function afegir_carta($carta) {
        $this->mano[] = $carta;
    }
    
    public function eliminar_carta($carta) {
        foreach ($this->mano as $key => $c) {
            if ($c->index === $carta->index) {
                unset($this->mano[$key]);
                $this->mano = array_values($this->mano);
                return true;
            }
        }
        return false;
    }
    
    public function mostrar_ma() {
        $output = "";
        foreach ($this->mano as $carta) {
            $output .= $carta->pinta_carta() . " ";
        }
        return $output;
    }
}

?>
