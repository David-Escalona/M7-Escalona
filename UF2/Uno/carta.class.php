<?php

require_once('jugador.class.php');
require_once('baraja.class.php');

class Carta {
    public $color;
    public $valor;
    public $index;

    public function __construct($color, $valor) {
        $this->color = $color;
        $this->valor = $valor;
        $this->index = uniqid(); // Identificador único
    }

    // Método para mostrar la carta como imagen
    public function pinta_carta() {
        // Aquí ajustamos el valor para que se adapte a tus imágenes.
        if (is_numeric($this->valor)) {
            // Para cartas numéricas, usamos el valor tal cual
            $valor = $this->valor;
        } else {
            // Para cartas especiales, asignamos un número fijo o un valor especial
            $valor = strtolower($this->valor); // reverse, skip, etc.
        }

        // Devolvemos la imagen correcta en función del color y el valor
        return "<img src='img/{$valor}_{$this->color}.png' alt='{$this->color} {$this->valor}' />";
    }

    // Método para mostrar la carta como un enlace
    public function pinta_carta_link() {
        return "<a href='?accion=jugar&index={$this->index}'>" . $this->pinta_carta() . "</a>";
    }

    // Método para mostrar la carta girada
    public function pinta_carta_girada() {
        return "<img src='img/carta_girada.png' alt='Carta girada' />";
    }

    // Verificar si la carta es especial
    public function es_especial() {
        return in_array($this->valor, ['reverse', 'skip', '+2']);
    }
}
?>
