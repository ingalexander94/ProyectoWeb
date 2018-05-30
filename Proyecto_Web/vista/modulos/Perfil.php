<?php
if (!isset($_SESSION["Ingeniero"])) {
    header("location:Inicio");
}
?>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="list-group mb-3" style="cursor: pointer;">
            <a id="PerfilIngeniero" class="list-group-item list-group-item-action active"><i class="fas fa-user"></i> Mi Perfil</a>
            <a id="MensajesIngeniero" class="list-group-item list-group-item-action"><i class="fas fa-comments"></i> Buzón de Mensajes</a>
        </div>
    </div>

    <form class="col-md-7" id="vistaIngeniero" method="POST">
        <article id="vistaPerfil" class="container perfil" style="background: white;">
            <h2>Mi Perfil</h2>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <img class="mb-2" id="miFoto" src="https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png" style="border:1px solid gray;border-radius:20px 20px 20px 20px;width:100%;height:43%;display:block;margin:auto;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-dark" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Editar Foto</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <?php
                    $user = unserialize($_SESSION['Ingeniero']);
                    echo '
                    <div class="input-group mb-3" title="Nombres">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user"></i></div>
                      </div>
                      <input value="' . $user->getNombres() . '" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Apellidos">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user"></i></div>
                      </div>
                      <input value="' . $user->getApellidos() . '" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Documento">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-address-card"></i></div>
                      </div>
                      <input value="' . $user->getDocumento() . '" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Correo Electrónico">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-envelope"></i></div>
                      </div>
                      <input value="' . $user->getCorreo() . '" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Teléfono">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-phone"></i></div>
                      </div>
                      <input value="' . $user->getTelefono() . '" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Contraseña" id="inputContraseña">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key"></i></div>
                      </div>
                      <input value="' . $user->getContraseña() . '" type="text" name="cambiarContraseña" id="cambiarContraseña" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon"  required>
                      <button id="actualizarContraseña" type="submit" class="btn btn-primary" title="Actualizar"><i class="fas fa-sync-alt"></i></button>
                  </div>

                  <button type="button" class="btn btn-primary mb-2" id="botonCambiarContraseña"><i class="fas fa-sync-alt"></i> Cambiar Contraseña</button>
                  <button type="button" class="btn btn-danger mb-2"><i class="fas fa-redo"></i> Actualizar Información</button>';
                    ?>               
                </div>
            </div>
        </article>
        <article id="vistaMensajes" class="container perfil">
            Mensajes
        </article>
    </form>

</div>


<form class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="formFoto" enctype="multipart/form-data" method="POST">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding: 4%;">
            <h3 style="text-align: center;">Cambiar Foto</h3>
            <hr style="border: 1px solid red;width: 100%;">
            <input type="file" id="foto" name="foto">

            <img id="cambiarFoto" class="mt-3" style="width:80%;display: block;margin: auto;">
            <button type="submit" class="btn btn-danger mb-2 mt-4" id="guardarFoto"><i class="fas fa-sync-alt"></i> Actualizar Foto</button>
        </div>
    </div>
</form>


