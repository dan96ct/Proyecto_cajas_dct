<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventario
 *
 * @author dani
 */
class Inventario {

    private $material;
    private $nLejas;
    private $pasillo;
    private $numero;
    private $lejasOcupadas = 0;
    private $id;
    private $codigo;
    private $cajas = array();

    function __construct($material, $nLejas, $pasillo, $numero, $codigo) {
        $this->material = $material;
        $this->nLejas = $nLejas;
        $this->pasillo = $pasillo;
        $this->numero = $numero;
        $this->codigo = $codigo;
    }

    function getMaterial() {
        return $this->material;
    }

    function getNLejas() {
        return $this->nLejas;
    }

    function getPasillo() {
        return $this->pasillo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getLejasOcupadas() {
        return $this->lejasOcupadas;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setNLejas($nLejas) {
        $this->nLejas = $nLejas;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setLejasOcupadas($lejasOcupadas) {
        $this->lejasOcupadas = $lejasOcupadas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCaja($caja) {
        array_push($this->cajas, $caja);
    }

    function getCajas() {
        return $this->cajas;
    }

}
