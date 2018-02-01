<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operaciones
 *
 * @author dani
 */
include_once '../DAO/conexion_bd.php';
include_once '../modelo/Estanteria.php';
include_once '../modelo/Caja.php';
include_once '../modelo/Inventario.php';
include_once '../Errores/Error_estanteria_excepcion.php';
include_once '../Errores/Error_caja_excepcion.php';
include_once '../Errores/Error_registro.php';

class Operaciones {

    public function registroUsuario($usu, $pass) {
        global $conexion;
        mysqli_autocommit($conexion, false);
        $passCifrada = md5('sorbete_de_limon' . $pass);
        //$passCifrada = password_hash($pass, PASSWORD_BCRYPT);
        $ordenSQL = "INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES ('" . $usu . "', '" . $passCifrada . "');";
        $consulta = $conexion->query($ordenSQL);
        if ($consulta) {
            mysqli_commit($conexion);
        } else {
            mysqli_rollback($conexion);
            throw new Error_registro_excepcion();
        }
    }

    public function compruebaLogin($usu, $pass) {
        global $conexion;

        $ordenSQL = "SELECT * FROM usuarios;";
        $consulta = $conexion->query($ordenSQL);
        $validar = false;
        if ($consulta) {
            $fila = $consulta->fetch_array();
            $usuario = $fila['usuario'];
            $psw = $fila['contraseña'];
        }
        if ($usu == $usuario) {
            if (md5('sorbete_de_limon' . $pass) == $psw) {
                $validar = true;
            }
        }
        return $validar;
    }

    public function compruebaUsuarios() {
        global $conexion;

        $ordenSQL = "SELECT * FROM usuarios;";
        $consulta = $conexion->query($ordenSQL);
        if ($consulta) {
            $fila = $consulta->fetch_array();
            $usuario = $fila['usuario'];
        }
        return $usuario;
    }

    public function addEstanteria($objEstanteria) {

        if (Operaciones::compruebaEstanteria($objEstanteria->getCodigo()) == true) {
            $codigo = $objEstanteria->getCodigo();
            $material = $objEstanteria->getMaterial();
            $numero_lejas = $objEstanteria->getNLejas();
            $pasillo = $objEstanteria->getPasillo();
            $n_pasillo = $objEstanteria->getNumero();
            global $conexion;
            mysqli_autocommit($conexion, false);

            $ordenSQL = "INSERT INTO `estanteria` (`material`, `nLejas`, `pasillo`, `numero`, `lejasOcupadas`, `codigo`) 
            VALUES ('" . $material . "', '" . $numero_lejas . "', '" . $pasillo . "', '" . $n_pasillo . "', '" . 0 . "', '" . $codigo . "');";
            $resultado = $conexion->query($ordenSQL);
            if ($resultado) {
                mysqli_commit($conexion);
            } else {
                mysqli_rollback($conexion);
                throw new Error_estanteria_excepcion("Error al introducir los datos de la estanteria");
            }
            $conexion->close();
        } else {
            throw new Error_estanteria_excepcion("El codigo introducido ya existe");
        }
    }

    public function compruebaCaja($codigo) {
        global $conexion;

        $ordenSQL = "SELECT * FROM `caja`;";
        $consulta = $conexion->query($ordenSQL);
        $validar = true;
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                if ($fila['codigo'] === $codigo) {
                    $validar = false;
                    break;
                }
                $fila = $consulta->fetch_array();
            }
        }
        if (validar == true) {
            $ordenSQL2 = "SELECT * FROM `cajasVendidas`;";
            $consulta2 = $conexion->query($ordenSQL2);
            if ($consulta2) {
                $fila2 = $consulta2->fetch_array();
                while ($fila2) {
                    if ($fila2['codigo'] === $codigo) {
                        $validar = false;
                        break;
                    }
                    $fila2 = $consulta2->fetch_array();
                }
            }
        }
        return $validar;
    }

    public function compruebaEstanteria($codigo) {
        global $conexion;

        $ordenSQL = "SELECT * FROM estanteria;";
        $consulta = $conexion->query($ordenSQL);
        $validar = true;
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                if ($fila['codigo'] == $codigo) {
                    $validar = false;
                    break;
                }
                $fila = $consulta->fetch_array();
            }
        }
        return $validar;
    }

    public function addCaja($objCaja) {

        if (Operaciones::compruebaCaja($objCaja->getCodigo()) === true) {
            $color = $objCaja->getColor();
            $altura = $objCaja->getAltura();
            $anchura = $objCaja->getAnchura();
            $profundidad = $objCaja->getProfundidad();
            $material = $objCaja->getMaterial();
            $contenido = $objCaja->getContenido();
            $codigo = $objCaja->getCodigo();
            $estanteria = $objCaja->getEstanteria();
            $lejaEstanteria = $objCaja->getLejaOcupada();


            global $conexion;
            mysqli_autocommit($conexion, false);
            $ordenSQL = "INSERT INTO `caja` (`color`, `altura`, `anchura`, `profundidad`, `material`, `contenido`,`codigo`) 
            VALUES ('" . $color . "', '" . $altura . "', '" . $anchura . "', '" . $profundidad . "', '" . $material . "', '" . $contenido . "','" . $codigo . "');";
            $resultado = $conexion->query($ordenSQL);

            $ordenSQL2 = "SELECT `id` FROM `caja` WHERE `codigo`='" . $codigo . "'";
            $resultado2 = $conexion->query($ordenSQL2);

            $ordenSQL3 = "SELECT `id` FROM `estanteria` WHERE `codigo`='" . $estanteria . "'";
            $resultado3 = $conexion->query($ordenSQL3);

            $idEstanteria = $resultado3->fetch_array();
            $idCaja = $resultado2->fetch_array();

            $ordenSQL4 = "INSERT INTO `ocupacion` (`idCaja`, `idEstanteria`, `lejaOcupada`) VALUES ('" . $idCaja['id'] . "', '" . $idEstanteria['id'] . "', '" . $lejaEstanteria . "')";
            $resultado4 = $conexion->query($ordenSQL4);

            $ordenSQL5 = "UPDATE `estanteria` SET `lejasOcupadas`=`lejasOcupadas`+1 WHERE `id`='" . $idEstanteria['id'] . "';";
            $resultado5 = $conexion->query($ordenSQL5);

            if ($resultado && $resultado2 && $resultado3 && $resultado4 && $resultado5) {
                mysqli_commit($conexion);
            } else {
                mysqli_rollback($conexion);
                throw new Error_caja_excepcion("Ha surgido un error al introducir la caja");
            }
            $conexion->close();
        } else {
            throw new Error_caja_excepcion("El codigo introducido ya existe");
        }
    }

    public function listarEstanterias() {
        global $conexion;
        $ordenSQL = "SELECT * FROM estanteria";
        $consulta = $conexion->query($ordenSQL);
        $arrayEstanterias = array();
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                $estanteria = new Estanteria($fila['material'], $fila['nLejas'], $fila['pasillo'], $fila['numero'], $fila['codigo']);
                $estanteria->setLejasOcupadas($fila['lejasOcupadas']);
                array_push($arrayEstanterias, $estanteria);
                $fila = $consulta->fetch_array();
            }
        } else {
            echo "La consulta no ha producido resultados" . "<br>";
        }
        $conexion->close();
        return $arrayEstanterias;
    }

    public function listarCajas() {
        global $conexion;
        $ordenSQL = "SELECT caja.color'color',caja.altura'altura',caja.anchura'anchura',caja.profundidad'profundidad',caja.material'material',caja.contenido'contenido',caja.codigo'codigo',estanteria.codigo'codigoEstanteria',ocupacion.lejaOcupada'lejaOcupada' FROM caja, ocupacion,estanteria WHERE caja.id = ocupacion.id AND ocupacion.id = estanteria.id";
        $consulta = $conexion->query($ordenSQL);
        $arrayCajas = array();
        if($consulta){
            $fila = $consulta->fetch_array();
            while($fila){
                $caja = new Caja($fila['color'], $fila['altura'], $fila['anchura'], $fila['profundidad'], $fila['material'], $fila['contenido'], $fila['codigo']);
                $caja->setEstanteria($fila['codigoEstanteria']);
                $caja->setLejaOcupada($fila['lejaOcupada']);
                array_push($arrayCajas, $caja);
                $fila = $consulta->fetch_array();
            }
        }
        return $arrayCajas;
    }

    public function getCodigoCajas() {
        global $conexion;
        $ordenSQL = "SELECT * FROM caja";
        $consulta = $conexion->query($ordenSQL);
        $arrayCodigoCajas = array();
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                array_push($arrayCodigoCajas, $fila['codigo']);
                $fila = $consulta->fetch_array();
            }
        } else {
            echo "La consulta no ha producido resultados" . "<br>";
        }
        $conexion->close();
        return $arrayCodigoCajas;
    }

    public function getCodigoCajasVendidas() {
        global $conexion;
        $ordenSQL = "SELECT * FROM cajasVendidas";
        $consulta = $conexion->query($ordenSQL);
        $arrayCodigoCajas = array();
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                array_push($arrayCodigoCajas, $fila['codigo']);
                $fila = $consulta->fetch_array();
            }
        } else {
            echo "La consulta no ha producido resultados" . "<br>";
        }
        return $arrayCodigoCajas;
    }

    public function venderCaja($codigo) {
        global $conexion;
        mysqli_autocommit($conexion, false);
        $ordenSQL = "SELECT * FROM caja WHERE codigo='" . $codigo . "';";
        $consulta = $conexion->query($ordenSQL);
        $fila = $consulta->fetch_array();
        $ordenSQL2 = "DELETE FROM `caja` WHERE `id`='" . $fila['id'] . "';";
        $consulta2 = $conexion->query($ordenSQL2);
        if ($consulta && $consulta2 && $fila['id'] !== null) {
            mysqli_commit($conexion);
        } else {
            mysqli_rollback($conexion);
            throw new Error_caja_venta_excepcion();
        }



        $conexion->close();
    }

    public function devolverCaja($codigo, $estanteria, $leja) {
        global $conexion;
        mysqli_autocommit($conexion, false);
        /* PRIMERA SENTENCIA */
        $ordenSQL = "SELECT * FROM cajasVendidas WHERE codigo='" . $codigo . "';";
        $consulta = $conexion->query($ordenSQL);
        $fila = $consulta->fetch_array();
        $caja = new Caja($fila['color'], $fila['altura'], $fila['anchura'], $fila['profundidad'], $fila['material'], $fila['contenido'], $fila['codigo']);
        $caja->setLejaOcupada($leja);
        $caja->setEstanteria($estanteria);
        /* SEGUNDA SENTENCIA */
        $ordenSQL2 = "INSERT INTO `caja` (`color`, `altura`, `anchura`, `profundidad`, `material`, `contenido`,`codigo`) 
            VALUES ('" . $caja->getColor() . "', '" . $caja->getAltura() . "', '" . $caja->getAnchura() . "', '" . $caja->getProfundidad() . "', '" . $caja->getMaterial() . "', '" . $caja->getContenido() . "','" . $caja->getCodigo() . "');";
        $consulta2 = $conexion->query($ordenSQL2);
//        /* TERCERA SENTENCIA */
        $ordenSQL3 = "UPDATE `bd_alumno_dct`.`estanteria` SET `lejasOcupadas`=`lejasOcupadas`+1 WHERE `codigo`='" . $caja->getEstanteria() . "';";
        $consulta3 = $conexion->query($ordenSQL3);
//        /* CUARTA SENTENCIA */
        $ordenSQL4 = "SELECT * FROM `estanteria` WHERE `codigo` ='" . $caja->getEstanteria() . "';";
        $consulta4 = $conexion->query($ordenSQL4);
        $fila2 = $consulta4->fetch_array();
        $caja->setEstanteria($fila2['id']);
        /* QUINTA SENTENCIA */
        $ordenSQL5 = "SELECT * FROM `caja` WHERE `codigo` ='" . $caja->getCodigo() . "';";
        $consulta5 = $conexion->query($ordenSQL5);
        $idCaja = $consulta5->fetch_array();
//        /* SEXTA SENTENCIA */
        $ordenSQL6 = "INSERT INTO `ocupacion` (`idCaja`, `idEstanteria`, `lejaOcupada`) VALUES ('" . $idCaja['id'] . "', '" . $caja->getEstanteria() . "', '" . $caja->getLejaOcupada() . "')";
        $consulta6 = $conexion->query($ordenSQL6);
        /* SEPTIMA SENTENCIA */
        $ordenSQL7 = "DELETE FROM `cajasVendidas` WHERE `codigo`='" . $caja->getCodigo() . "';";
        $consulta7 = $conexion->query($ordenSQL7);

        if ($consulta && $consulta2 && $consulta3 && $consulta4 && $consulta5 && $consulta7) {
            mysqli_commit($conexion);
            $conexion->close();
        } else {
            mysqli_rollback($conexion);
            $conexion->close();
            throw new Error_caja_devolucion_excepcion();
        }
    }

    public function listarInventario() {
        global $conexion;
        $ordenSQL = "SELECT * FROM estanteria";
        $consulta = $conexion->query($ordenSQL);
        $arrayInventario = array();
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                $objInventario = new Inventario($fila['material'], $fila['nLejas'], $fila['pasillo'], $fila['numero'], $fila['codigo']);
                $objInventario->setLejasOcupadas($fila['lejasOcupadas']);
                if ($fila['lejasOcupadas'] > 0) {
                    $ordenSQL2 = "SELECT ocupacion.lejaOcupada,caja.color, caja.altura, caja.anchura, caja.profundidad, caja.material, caja.contenido, caja.codigo  FROM caja,ocupacion,estanteria WHERE estanteria.id = ocupacion.idEstanteria AND caja.id = ocupacion.idCaja AND ocupacion.idEstanteria =" . $fila['id'];
                    $consulta2 = $conexion->query($ordenSQL2);
                    $filaCaja = $consulta2->fetch_array();
                    if ($consulta2) {
                        while ($filaCaja) {
                            $caja = new Caja($filaCaja['color'], $filaCaja['altura'], $filaCaja['anchura'], $filaCaja['profundidad'], $filaCaja['material'], $filaCaja['contenido'], $filaCaja['codigo']);
                            $caja->setLejaOcupada($filaCaja['lejaOcupada']);
                            $objInventario->setCaja($caja);
                            $filaCaja = $consulta2->fetch_array();
                        }
                    }
                }
                array_push($arrayInventario, $objInventario);

                $fila = $consulta->fetch_array();
            }
        } else {
            echo "La consulta no ha producido resultados" . "<br>";
        }
        $conexion->close();
        return $arrayInventario;
    }

    public function borrarEstanteria($codigo) {
        $orderSQL = "DELETE FROM `bd_alumno_dct`.`estanteria` WHERE `codigo`='" . $codigo . "'";
        global $conexion;
        $consulta = $conexion->query($orderSQL);
        if ($consulta) {
            mysqli_commit($conexion);
        } else {
            mysqli_rollback($conexion);
            echo "La consulta no ha producido resultados" . "<br>";
        }
        $conexion->close();
    }

    public function listarEstanteriasAJAX() {
        global $conexion;
        $ordenSQL = "SELECT * FROM estanteria";
        $consulta = $conexion->query($ordenSQL);
        $arrayEstanterias = array();
        if ($consulta) {
            $fila = $consulta->fetch_array();
            $_SESSION['sesion'] = array();
            while ($fila) {
                $estanteria = new Estanteria($fila['material'], $fila['nLejas'], $fila['pasillo'], $fila['numero'], $fila['codigo']);
                $estanteria->setLejasOcupadas($fila['lejasOcupadas']);
                array_push($arrayEstanterias, $estanteria);
                $fila = $consulta->fetch_array();
            }
        } else {
            echo "La consulta no ha producido resultados" . "<br>";
        }
        return $arrayEstanterias;
    }

}
