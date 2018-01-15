<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error_caja_excepcion
 *
 * @author dani
 */
class Error_caja_devolucion_excepcion extends Exception {
    function __construct() {
    }
    
    public function __toString(): string {
        return 'Ha surgido un error al devolver la caja.<br>'
        . 'Es posible que el codigo de la caja no exista, revíselo.<br>'
        . 'Linea '.$this->getLine().'<br>'
        . 'Archivo '.$this->getFile();
    }
}
