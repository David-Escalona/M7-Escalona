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
        // Si el valor es numérico (del 0 al 9), no hay cambios
        if (is_numeric($this->valor)) {
            $valor = $this->valor; // Para cartas numéricas
        } else {
            // Si es una carta especial (reverse, skip, +2), convertimos el valor a minúsculas para el nombre de archivo
            $valor = strtolower($this->valor);
        }

        // Devolvemos la imagen con el formato {valor_color.png}
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
