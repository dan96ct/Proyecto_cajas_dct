<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estanteria
 *
 * @author dani
 */
class Estanteria {
    private $material;
    private $nLejas;
    private $pasillo;
    private $numero;
    private $lejasOcupadas = 0;
    private $id;
    private $codigo;
    
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


    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function getId() {
        return $this->id;
    }
    public function __toString() {
        return 'Estanteria de '. $this->material. ' numero de lejas '. $this->nLejas. ' pasillo '. $this->pasillo. ' numero '. $this->numero. 
                ' lejas ocupadas '. $this->lejasOcupadas. ' id '. $this->id. ' y codigo '. $this->codigo;
        
    }




}
