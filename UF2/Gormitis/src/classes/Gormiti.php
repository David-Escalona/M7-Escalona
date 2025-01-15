<?php

class Gormiti {
    public $nom;
    public $salut;
    public $dany;
    public $imatge;
    public $habilitats;

    public function __construct($nom, $salut, $dany, $imatge, $habilitats) {
        $this->nom = $nom;
        $this->salut = $salut;
        $this->dany = $dany;
        $this->imatge = $imatge;
        $this->habilitats = $habilitats;
    }

    public static function agregarPersonatge($gormiti) {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['gormitis'])) {
            $_SESSION['gormitis'] = [];
        }

        $_SESSION['gormitis'][] = $gormiti;
    }

    public static function obtenerPersonatges() {
        if (!isset($_SESSION)) {
            session_start();
        }

        return $_SESSION['gormitis'] ?? [];
    }
}

?>

