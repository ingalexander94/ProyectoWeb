var ruta ="";
$(document).ready(function () {
    
     $.ajax({
            url: "vista/modulos/Ajax.php?mostrarFoto=true",
            dataType: "text",
            success: function (respuesta) {
                if(respuesta ==="vista/presentacion/images/"){
                    $("#miFoto").attr('src',"https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png");
                }else{
                     $("#miFoto").attr('src',respuesta);
     
                }
            }
        });
    
    $("#vistaIngeniero article").hide();
    $("#vistaIngeniero #vistaPerfil").show();
    $("#inputContraseña").hide();
    
    //muestra el panel de perfil
    $("#PerfilIngeniero").click(function(){
    $("#vistaIngeniero article").hide();
        $("#vistaIngeniero #vistaPerfil").show();
    });
    
    //muestra el panel de los mensajes
    $("#MensajesIngeniero").click(function(){
    $("#vistaIngeniero article").hide();
        $("#vistaIngeniero #vistaMensajes").show();
    });
    
    //oculta o muestra el campo contraseña
    var index = 0;
    $("#botonCambiarContraseña").click(function(){
        if(index === 1){
            $("#inputContraseña").hide();
            index = 0;
        }else{
            $("#inputContraseña").show();
            index = 1;
        }
    });
    

    $(document).on('change', 'input[type=file]', function (e) {
        // Obtenemos la ruta temporal mediante el evento
        var TmpPath = URL.createObjectURL(e.target.files[0]);
        ruta = TmpPath;
        // Mostramos la ruta temporal
        $('#cambiarFoto').attr('src', TmpPath);
    });
    
    $("#guardarFoto").click(function(){
        var auxiliar = "C:\\Users\\Alexander\\Pictures";
       var datos = {
               ruta: auxiliar+"\\"+$("#foto").val().toString().trim().split("\\")[2],
               nombreImagen:$("#foto").val().toString().trim().split("\\")[2]
            };

            $.ajax({
                url: 'vista/modulos/Ajax.php',
                method: 'post',
                data: datos,
                dataType: 'text',

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },
                success: function (respuesta)
                {
                ingresoExitoso("Exito","Se actualizo su foto de Perfil");
                },
                error: function (jqXHR, estado, error) {
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                },

            });
      
    });
});


