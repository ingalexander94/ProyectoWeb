$(document).ready(function(){
    
    $("#vistaIngeniero").validate({
        
        rules: {
            cambiarContraseña: {required: true}
        },
        messages:
                {
                    cambiarContraseña: {required: " ✘"}
                },
                

        submitHandler: function () {

            var datos = {
                cambiarContraseña: $("#cambiarContraseña").val()             
            };
            
            
            $.ajax({
                url: 'vista/modulos/Ajax.php',
                method: 'post',
                data: datos,
                dataType: 'json',

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },
                success: function (respuesta)
                {
                    if (respuesta["exito"]) {
                        ingresoExitoso("Exito","Se ha cambiado la Contraseña");                        
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "No se pudo cambiar la Contraseña");
                    }

                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
                
            });
        }
        
    });
    
});