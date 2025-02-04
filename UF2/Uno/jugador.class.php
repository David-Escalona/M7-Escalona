<?php


require_once('baraja.class.php');
require_once('carta.class.php');

class Jugador {
    public $mano = [];
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    // Método para añadir una carta a la mano
    public function añadir_carta($carta) {
        $this->mano[] = $carta;
    }

    // Método para eliminar una carta de la mano
    public function eliminar_carta($carta) {
        $key = array_search($carta, $this->mano);
        if ($key !== false) {
            unset($this->mano[$key]);
            $this->mano = array_values($this->mano); // Reorganizar el array después de eliminar la carta
        }
    }

    // Método para mostrar la mano del jugador
    public function mostrar_ma() {
        foreach ($this->mano as $carta) {
            echo $carta->pinta_carta() . " ";
        }
    }
}

?>
