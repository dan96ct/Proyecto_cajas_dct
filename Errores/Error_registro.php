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
class Error_registro_excepcion extends Exception {
    function __construct() {
    }
    
    public function __toString(): string {
        return 'Ha surgido un error en el registro.<br>'
        . 'Linea '.$this->getLine().'<br>'
        . 'Archivo '.$this->getFile();
    }
}
