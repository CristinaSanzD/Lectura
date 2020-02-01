<div class="col-md-12">
    <!-- Carrusel de imágenes para la cabecera -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
            <li data-target="#demo" data-slide-to="5"></li>
            <li data-target="#demo" data-slide-to="6"></li>
        </ol>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div id="carrusel" class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen11.jpg') }}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen2.jpg')}}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen3.jpg') }}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen4.jpg') }}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen5.jpg') }}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen6.jpg') }}" alt="">
            </div>
            <div id="carrusel" class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/imagen7.jpg') }}" alt="">
            </div>
            <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
       
    </div>
   
</div>
