<?php

class Controlador {

    private $negocio;

    // Constructor de la clase
    public function __construct() {
        $this->negocio = new Negocio();
    }

    public function generarPlantilla() {
        return Negocio::generarPlantilla();
    }

    public function generarVista() {

        $enlace = filter_input(INPUT_GET, "ubicacion");
        if ($enlace) {
            $enlace = $this->negocio->generarEnlace($enlace);
        } else {
            $enlace = $this->negocio->generarEnlace("Inicio");
        }
        include_once $enlace;
    }
    
    public function registrarIngenieroControlador($IngenieroDTO){
        return $this->negocio->registrarIngenieroNegocio($IngenieroDTO);
    }
    
    public function buscarIngenieroControlador($documento,$correo){
        return $this->negocio->buscarIngenieroNegocio($documento,$correo);
    }
    
    public function loguearIngenieroControlador($IngenieroDTO) {
        return $this->negocio->loguearIngenieroNegocio($IngenieroDTO);
    }
    
    public function recordarContraseñaControlador($correo) {
        return $this->negocio->recordarContraseñaNegocio($correo);
    }
    
    public function cambiarContraseñaControlador($contraseñaNueva){
        return $this->negocio->cambiarContraseñaNegocio($contraseñaNueva);
    }
    
    public function guardarFoto($nombre){
        return $this->negocio->guardarFoto($nombre);
    }
    
    public function mostrarFoto(){
        return $this->negocio->mostrarFoto();
    }

}
