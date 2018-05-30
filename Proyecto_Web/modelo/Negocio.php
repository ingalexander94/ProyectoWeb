<?php

class Negocio{
    
    public function generarPlantilla() {
        // Incluir Archivo a la ruta
        include 'vista/Plantilla.php';
    }
    
    // Metodo para obtener la pestaña seleccionada en el menú
    private function validarPestañaBarraNavegacion($pestaña) {
        
        $exito=false;
        $pestañas = array("Inicio","Contacto","Registro","Ingresar","Salir");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    // Metodo para osbtener la pestaña a redirigir 
    private function validarPestañaRedireccion($pestaña) {
        
        $exito=false;
        $pestañas = array("Perfil","Profesional","Ocupacional");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    public function generarEnlace($enlace) {
        
        if($this->validarPestañaBarraNavegacion($enlace)){
            return "vista/modulos/barraNavegacion/" .$enlace. ".php";
        }else if($this->validarPestañaRedireccion($enlace)){
            return "vista/modulos/" .$enlace. ".php";
        }else{
            return "vista/modulos/barraNavegacion/Inicio.php";
        }  
    }
    
    public function registrarIngenieroNegocio($IngenieroDTO) {
        return IngenieroDAO::registrarIngeniero($IngenieroDTO);
    }
    
    public function buscarIngenieroNegocio($documento,$correo) {
        return IngenieroDAO::buscarIngeniero($documento, $correo);
    }

    public function loguearIngenieroNegocio($IngenieroDTO) {
        return IngenieroDAO::loguearIngeniero($IngenieroDTO);
    }
    
    public function recordarContraseñaNegocio($correo) {
        return IngenieroDAO::recordarContraseña($correo);
    }
    
    public function cambiarContraseñaNegocio($contraseñaNueva){
        include_once 'dto/IngenieroDTO.php';
        $user = unserialize($_SESSION["Ingeniero"]);
        return IngenieroDAO::cambiarContraseña($contraseñaNueva,$user->getId());
    }

    public function guardarFoto($nombre) {
        include_once 'dto/IngenieroDTO.php';
        $user = unserialize($_SESSION["Ingeniero"]);
        return IngenieroDAO::guardarFoto($nombre,$user->getId());
    }
    
    public function mostrarFoto() {
        include_once 'dto/IngenieroDTO.php';
        $user = unserialize($_SESSION["Ingeniero"]);
        return IngenieroDAO::mostrarFoto($user->getId());
    }

}
