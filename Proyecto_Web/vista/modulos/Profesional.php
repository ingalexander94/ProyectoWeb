
<div class="container p-3"> 
    <h1 class="text-center"> PERFIL PROFESIONAL <i class="fas fa-user-graduate"></i></h1>
    <p class="p-2 text-justify">El perfil laboral o profesional es la descripción clara del conjunto de
        capacidades y competencias que identifican la formación de una persona para
        encarar responsablemente las funciones y tareas de una determinada profesión
        o trabajo.
        Cuando intentamos conseguir un puesto laboral es importante que
        podamos transmitir a través de nuestra presentación todo nuestro
        conocimiento y experiencia para que la persona encargada de la selección de
        personal se interese por nosotros y nos ofrezca la oportunidad de acceder a la
        entrevista de trabajo.</p>
</div>
<hr>
<section class="container">
    <div class="description-profesional text-center">
        <h3> Perfil 1 </h3>
        <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non turpis orci. Morbi sollicitudin
            arcu sit amet neque condimentum, in auctor leo aliquam. Fusce nec posuere sapien. Integer efficitur
            lectus vestibulum ligula bibendum auctor. Pellentesque ut sapien tincidunt, pellentesque odio eu,
            elementum augue. Aenean pharetra sit amet leo eget aliquam. Nunc vel auctor augue.</p>
    </div>
    <div style="width: 50%;margin-left: 25%;">
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/R2F_hGwD26g" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
        </div>
    </div>    
</section>
<hr>
<section class="container">
    <div class="description-profesional text-center">
        <h3> Perfil 2 </h3>
        <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non turpis orci. Morbi sollicitudin
            arcu sit amet neque condimentum, in auctor leo aliquam. Fusce nec posuere sapien. Integer efficitur
            lectus vestibulum ligula bibendum auctor. Pellentesque ut sapien tincidunt, pellentesque odio eu,
            elementum augue. Aenean pharetra sit amet leo eget aliquam. Nunc vel auctor augue.</p>
    </div>
    <div style="width: 50%;margin-left: 25%;">
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/R2F_hGwD26g" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
        </div>
    </div>    
</section>
<hr>
<section class="container">
    <div class="description-profesional text-center">
        <h3> Perfil 3 </h3>
        <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non turpis orci. Morbi sollicitudin
            arcu sit amet neque condimentum, in auctor leo aliquam. Fusce nec posuere sapien. Integer efficitur
            lectus vestibulum ligula bibendum auctor. Pellentesque ut sapien tincidunt, pellentesque odio eu,
            elementum augue. Aenean pharetra sit amet leo eget aliquam. Nunc vel auctor augue.</p>
    </div>
    <div style="width: 50%;margin-left: 25%;">
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/R2F_hGwD26g" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
        </div>
    </div>    
</section>
<hr>
<section class="container">
    <div class="description-profesional text-center">
        <h3> Perfil 4 </h3>
        <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non turpis orci. Morbi sollicitudin
            arcu sit amet neque condimentum, in auctor leo aliquam. Fusce nec posuere sapien. Integer efficitur
            lectus vestibulum ligula bibendum auctor. Pellentesque ut sapien tincidunt, pellentesque odio eu,
            elementum augue. Aenean pharetra sit amet leo eget aliquam. Nunc vel auctor augue.</p>
    </div>
    <div style="width: 50%;margin-left: 25%;">
        <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/R2F_hGwD26g" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
        </div>
    </div>    
</section>
<hr style="background: black;height: 1px;">

<?php
if(!isset($_SESSION["Ingeniero"])){
    echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong><a href="Registro">Registrese!</a></strong> para participar en el foro.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}else{
    echo '<h3> Comentarios <i class="fas fa-comments"></i></h3><br>
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <img src="https://www.webespacio.com/wp-content/uploads/2012/01/foto-perfil.jpg" width="65" height="60">
        </div>
        <div class="col-md-3">
            <h3> Alexander Peñaloza</h3>  
            <p> esto es un comentario </p>
        </div> 
         <p class="text-muted ml-2"> 28/05/2018</p>
    </div>
    <div class="row">
        <div class="col-md-1">
            <img src="https://www.webespacio.com/wp-content/uploads/2012/01/foto-perfil.jpg" width="65" height="60">
        </div>
        <div class="col-md-3">
            <h3> Alexander Peñaloza</h3>  
            <p> esto es un comentario </p>
        </div> 
         <p class="text-muted ml-2"> 28/05/2018</p>
    </div>
</div>

<div class="container">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
        </div>
        <textarea class="form-control" aria-label="With textarea" cols="30" rows="3" placeholder="Escriba aquí su comentario"></textarea>
    </div><br>
    <button class="btn btn-success"> Comentar <i class="fas fa-comment-alt"></i></button>      
</div>
';
}
?>


