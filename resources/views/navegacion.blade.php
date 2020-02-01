<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e7f0c3;">
  <a class="navbar-brand" href="/libro">Libros</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/libro">Libros</a>
          <a class="dropdown-item" href="/generos">Géneros</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Añadir</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/crear">Añadir Libro</a>
          <a class="dropdown-item" href="/nuevo">Añadir Género</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/salir">Cerrar sesión</a>
      </li>
      <li class="nav-item {{ request()->is('buscar') ? 'active activa' : '' }}">
              <a class="nav-link" href="/buscar"><i class="fas fa-search"></i> Consulta por Nombre</a></li>
    </ul>
  </div>
</nav>