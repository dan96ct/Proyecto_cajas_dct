<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error_estanteria_excepcion
 *
 * @author dani
 */
class Error_estanteria_excepcion extends Exception {
    private $mensaje;
    function __construct($mensaje) {
        $this->mensaje = $mensaje;
    }

    
    public function __toString(): string {
        return $this->mensaje.'<br>'
        . 'Linea '.$this->getLine().'<br>'
        . 'Archivo '.$this->getFile();
    }



}
