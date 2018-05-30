<?php

require_once '../../controlador/Controlador.php';
require_once '../../modelo/Negocio.php';
require_once '../../modelo/dto/IngenieroDTO.php';
require_once '../../modelo/dao/IngenieroDAO.php';
require_once '../../modelo/Mail/Mail.php';
require_once '../../modelo/Conexion.php';


class Ajax {

    private function instanciarControlador() {
        $controlador = new Controlador();
        return $controlador;
    }

    public function registrarIngeniero($nombres, $apellidos, $documento, $correo, $telefono, $contraseña) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            $IngenieroDTO = new IngenieroDTO($nombres, $apellidos, $documento, $correo, $telefono, $contraseña);
             $primeraVez = $this->buscarIngeniero($documento,$correo);
            if($primeraVez==0){
             $exito = $controlador->registrarIngenieroControlador($IngenieroDTO);
            }else{
            $exito=false;
            }
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Ingeniero"));
        }
    }
    
    public function buscarIngeniero($documento,$correo) {
        $controlador = $this->instanciarControlador();
        return $controlador->buscarIngenieroControlador($documento,$correo);    
    }

    public function loguearIngeniero($documento, $contraseña, $tipo) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            if (strcmp($tipo, "Estudiante") == 0) {
                $IngenieroDTO = new IngenieroDTO(null, null, $documento, null, null, $contraseña);
                $exito = $controlador->loguearIngenieroControlador($IngenieroDTO);
            } else {
                if(strcmp($documento, "1234")==0 && strcmp($contraseña, "admin")==0 ){
                    $exito=true;
                }else{
                    $exito=false;
                }
            }
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            if (strcmp($tipo, "Estudiante") == 0) {
                session_start();
                $_SESSION["Ingeniero"] = serialize($IngenieroDTO);
            } else {
                session_start();
                $_SESSION["Ingeniero"] = "Administrador";
            }
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Ingeniero"));
        }
    }
    
    public function guardarFoto($ruta,$nombre){

       $guardarEn=$_SERVER['DOCUMENT_ROOT']."/Proyecto_Web/vista/presentacion/images";
       echo copy($ruta,$guardarEn."/".$nombre);
       $exito = false;
       try{
           session_start();
           $controlador = $this->instanciarControlador();
          $exito= $controlador->guardarFoto($nombre);
       } catch (Exception $ex) {
           echo $ex->getTraceAsString();
       }
       if($exito){
           echo 'bien';
       }else{
           echo 'mal';
       }
    }

    public function mostrarFoto() {
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            echo $controlador->mostrarFoto();
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    
    public function recordarContraseña($correo) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            $contraseña = $controlador->recordarContraseñaControlador($correo);
            if (empty($contraseña) === true) {
                $exito = false;
            } else {
                $enviarCorreo = new Mail();
                $enviarCorreo->enviarCorreoRecordarContraseña($correo,$contraseña);
                $exito = true;
            }
//            
        } catch (Exception $ex) {
            echo "algo salio mal" . $ex;
        }
        if ($exito) {
            echo "exito";
        } else {
            echo "error";
        }
    }
    
    public function cambiarContraseña($contraseñaNueva){
         $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->cambiarContraseñaControlador($contraseñaNueva);
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
            session_destroy();
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Ingeniero"));
        }
    }

}

//instanciar clase Ajax para acceder a sus metodos
$ajax = new Ajax();

//variables para recibir datos del formulario
$registrarIngeniero = isset($_POST["registrarNombres"], $_POST["registrarApellidos"], $_POST["registrarDocumento"], $_POST["registrarCorreo"], $_POST["registrarTelefono"], $_POST["registrarContraseña"]);
$loguearIngeniero = isset($_POST["loguearDocumento"], $_POST["loguearContraseña"], $_POST["loguearTipo"]);
$guardarFoto = isset($_POST["ruta"],$_POST["nombreImagen"]);
$mostrarFoto = isset($_GET["mostrarFoto"]);
$recordarContraseña = isset($_POST["recordarCorreo"]);
$cambiarContraseña = isset($_POST["cambiarContraseña"]);
//ejecutar metodo según variable instanciada
if ($registrarIngeniero) {
    $ajax->registrarIngeniero($_POST["registrarNombres"], $_POST["registrarApellidos"], $_POST["registrarDocumento"], $_POST["registrarCorreo"], $_POST["registrarTelefono"], $_POST["registrarContraseña"]);
} else if ($loguearIngeniero) {
    $ajax->loguearIngeniero($_POST["loguearDocumento"], $_POST["loguearContraseña"], $_POST["loguearTipo"]);
}else if($guardarFoto){
    $ajax->guardarFoto($_POST["ruta"],$_POST["nombreImagen"]);
}else if($mostrarFoto && $_GET["mostrarFoto"]){
    $ajax->mostrarFoto();
}else if($recordarContraseña){
    $ajax->recordarContraseña($_POST["recordarCorreo"]);
}else if($cambiarContraseña){
    $ajax->cambiarContraseña($_POST["cambiarContraseña"]);
}