<?php

class IngenieroDAO {

//     Metodo para registrar al ingeniero en la base de datos
    function registrarIngeniero($IngenieroDTO) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $nombres = $IngenieroDTO->getNombres();
            $apellidos = $IngenieroDTO->getApellidos();
            $documento = $IngenieroDTO->getDocumento();
            $correo = $IngenieroDTO->getCorreo();
            $telefono = $IngenieroDTO->getTelefono();
            $contraseña = $IngenieroDTO->getContraseña();
            $consulta = $conectar->prepare("INSERT INTO ingeniero (nombres,apellidos,documento,correo,telefono,contraseña) VALUES(?,?,?,?,?,?)");
            $consulta->bindParam(1, $nombres, PDO::PARAM_STR);
            $consulta->bindParam(2, $apellidos, PDO::PARAM_STR);
            $consulta->bindParam(3, $documento, PDO::PARAM_STR);
            $consulta->bindParam(4, $correo, PDO::PARAM_STR);
            $consulta->bindParam(5, $telefono, PDO::PARAM_STR);
            $consulta->bindParam(6, $contraseña, PDO::PARAM_STR);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

//     Metodo para saber si el ingeniero ya esta registrado en la base de datos
    function buscarIngeniero($documento, $correo) {
        $conectar = Conexion::crearConexion();
        try {
            $consulta = $conectar->prepare("SELECT ingeniero.id FROM ingeniero WHERE ingeniero.documento =? AND ingeniero.correo=?;");
            $consulta->bindParam(1, $documento, PDO::PARAM_STR);
            $consulta->bindParam(2, $correo, PDO::PARAM_STR);
            $consulta->execute();
            $filas = $consulta->rowCount();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $filas;
    }

//      Metodo para que el ingeniero ingrese al sistema
    function loguearIngeniero($IngenieroDTO) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $documento = $IngenieroDTO->getDocumento();
            $contraseña = $IngenieroDTO->getContraseña();
            $consulta = $conectar->prepare("SELECT ingeniero.id AS id,ingeniero.nombres AS nombres,ingeniero.apellidos AS apellidos,ingeniero.correo AS correo,ingeniero.telefono AS telefono,ingeniero.contraseña AS contraseña FROM ingeniero WHERE ingeniero.documento =? AND ingeniero.contraseña=?;");
            $consulta->bindParam(1, $documento, PDO::PARAM_STR);
            $consulta->bindParam(2, $contraseña, PDO::PARAM_STR);
            $consulta->execute();
            $filas = $consulta->rowCount();
            if ($filas > 0) {
                $datos = $consulta->fetch();
                $IngenieroDTO->setId($datos["id"]);
                $IngenieroDTO->setNombres($datos["nombres"]);
                $IngenieroDTO->setApellidos($datos["apellidos"]);
                $IngenieroDTO->setCorreo($datos["correo"]);
                $IngenieroDTO->setTelefono($datos["telefono"]);
                $IngenieroDTO->setContraseña($datos["contraseña"]);
                $exito = true;
            } else {
                $exito = false;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }
    
    function recordarContraseña($correo){
        $conectar = Conexion::crearConexion();
        try{
        $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $conectar->prepare("SELECT ingeniero.contraseña AS contraseña FROM ingeniero WHERE ingeniero.correo=?;");
        $consulta->bindParam(1, $correo, PDO::PARAM_STR);
        $consulta->execute();
        $respuesta= $consulta->fetch();
        return $respuesta["contraseña"];
        } catch (Exception $ex) {
          throw  new Exception("Algo salio mal");
        }
    }
    
    function cambiarContraseña($contraseñaNueva,$id){
        $conectar = Conexion::crearConexion();
        $exito = false;
        try{
        $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $conectar->prepare("UPDATE ingeniero SET ingeniero.contraseña=? WHERE ingeniero.id=?");
        $consulta->bindParam(1, $contraseñaNueva, PDO::PARAM_STR);
        $consulta->bindParam(2, $id, PDO::PARAM_INT);
        $exito=$consulta->execute();
        } catch (Exception $ex) {
          throw  new Exception("Algo salio mal");
        }
        return $exito;
    }
            
    function guardarFoto($nombre,$id) {
        $conectar = Conexion::crearConexion();
        $exito =false;
        try{ 
            $consulta = $conectar->prepare("UPDATE ingeniero SET ingeniero.foto=? WHERE ingeniero.id=?;");
            $consulta->bindParam(1, $nombre,PDO::PARAM_STR);
            $consulta->bindParam(2,$id,PDO::PARAM_INT);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw  new Exception("Algo salio mal");
        }
        return $exito;
    }
    
    function mostrarFoto($id) {
        $conectar = Conexion::crearConexion();
        try{ 
            $consulta = $conectar->prepare("SELECT ingeniero.foto AS foto FROM ingeniero Where ingeniero.id =?");
            $consulta->bindParam(1,$id,PDO::PARAM_INT);
            $consulta->execute();
            $exito = $consulta->fetch();
            echo 'vista/presentacion/images/'.$exito["foto"];
        } catch (Exception $ex) {
            throw  new Exception("Algo salio mal");
        }
    }

}
