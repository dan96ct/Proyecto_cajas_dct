<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
 *
 * @author dani
 */
class Caja {

    private $id;
    private $color;
    private $altura;
    private $anchura;
    private $profundidad;
    private $material;
    private $contenido;
    private $codigo;
    private $lejaOcupada;
    private $estanteria;

    public function __toString() {
        $texto = 'Color ' + $this->color + ' altura ' + $this->altura + ' anchura ' + $this->anchura + ' profundidad ' + $this->profundidad + ' material ' + $this->material
                + ' contenido ' + $this->contenido + ' codigo ' + $this->codigo;
        return $texto;
    }
    
    function getLejaOcupada() {
        return $this->lejaOcupada;
    }

    function getEstanteria() {
        return $this->estanteria;
    }

    function setLejaOcupada($lejaOcupada) {
        $this->lejaOcupada = $lejaOcupada;
    }

    function setEstanteria($estanteria) {
        $this->estanteria = $estanteria;
    }

    function __construct($color, $altura, $anchura, $profundidad, $material, $contenido, $codigo) {
        $this->color = $color;
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->material = $material;
        $this->contenido = $contenido;
        $this->codigo = $codigo;
    }

    function getId() {
        return $this->id;
    }

    function getColor() {
        return $this->color;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getMaterial() {
        return $this->material;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setId($id) {
        $this->id = $id;
    }
    

}
