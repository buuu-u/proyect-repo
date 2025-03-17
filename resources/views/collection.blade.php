<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colecciones - Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-color: #1d4b6f;
            --accent-color: #ffd700;
            --bg-light: #f8f9fa;
            --text-dark: #333;
            --text-light: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .institutional-nav {
            background-color: var(--primary-blue);
            color: white;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .institutional-nav .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .institutional-nav .nav-link:hover,
        .institutional-nav .nav-link:focus {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .main-nav {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled {
            padding: 0.25rem 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .main-nav .navbar-brand img {
            height: 50px;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled .navbar-brand img {
            height: 40px;
        }

        .main-nav .nav-link {
            color: var(--primary-blue);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .main-nav .nav-link:hover,
        .main-nav .nav-link:focus,
        .main-nav .nav-link.active {
            color: white;
            background-color: var(--primary-blue);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            border: none;
            border-radius: 30px;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .search-btn {
            border-radius: 30px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .collection-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .collection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .collection-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .collection-card-body {
            padding: 1.5rem;
        }

        .collection-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-blue);
        }

        .collection-card-text {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .collection-card-stats {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .filters {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .filters h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-blue);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }

        .page-link {
            color: var(--primary-blue);
            border-radius: 5px;
            margin: 0 0.2rem;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 3rem 0;
            margin-top: 3rem;
        }

        footer h5 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        footer ul {
            padding-left: 0;
            list-style-type: none;
        }

        footer ul li {
            margin-bottom: 0.75rem;
        }

        footer a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px) rotate(5deg);
        }

        .social-icons i {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .collection-card img {
                height: 150px;
            }
        }

        .institutional-nav .dropdown-menu {
            background-color: white;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            z-index: 1050;
        }

        .institutional-nav .dropdown-item {
            color: var(--primary-blue);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .institutional-nav .dropdown-item:hover,
        .institutional-nav .dropdown-item:focus {
            background-color: rgba(45, 93, 134, 0.1);
            color: var(--hover-color);
        }

        .institutional-nav .dropdown-divider {
            margin: 0.25rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .institutional-nav .nav-link.dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
    </style>
</head>

<body>
    <!-- Institutional Navigation -->
    <nav class="institutional-nav">
        <div class="container d-flex justify-content-end py-2">
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link">Noticias</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Eventos</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Ayuda</a></li>
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user me-2"></i>Ver Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="main-nav sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('udo.jpg') }}" alt="Logo Universidad" height="50">
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/collection" class="nav-link active">Colecciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Explora Nuestras Colecciones</h1>
            <p class="hero-subtitle">Descubre una amplia gama de recursos académicos y de investigación</p>
            <form class="search-form" action="{{ route('collection') }}" method="GET">
                <div class="input-group input-group-lg">
                    <input type="search" name="search" class="form-control search-input" placeholder="Buscar en las colecciones..." value="{{ request('search') }}">
                    <button class="btn btn-primary search-btn" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="filters">
                    <h4>Filtros</h4>
                    <form id="filter-form" action="{{ route('collection') }}" method="GET">
                        <!-- Mantener la búsqueda actual si existe -->
                        @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="mb-3">
                            <h5 class="h6">Categorías</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="1" id="filterCat1"
                                    {{ in_array(1, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat1">
                                    Áreas de Grado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="2" id="filterCat2"
                                    {{ in_array(2, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat2">
                                    Tesis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="3" id="filterCat3"
                                    {{ in_array(3, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat3">
                                    Pasantías
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="4" id="filterCat4"
                                    {{ in_array(4, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat4">
                                    Prácticas Profesionales
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="5" id="filterCat5"
                                    {{ in_array(5, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat5">
                                    Servicios Comunitarios
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="category_id[]" value="6" id="filterCat6"
                                    {{ in_array(6, (array)request('category_id')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="filterCat6">
                                    Líneas de Investigación
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Aplicar Filtros</button>
                        <a href="{{ route('collection') }}" class="btn btn-outline-secondary w-100 mt-2">Limpiar Filtros</a>
                    </form>
                </div>
            </div>

            <!-- Collections Grid -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Collection Card 1 - Áreas de Grado -->
                    @if((!request('category_id') || in_array(1, (array)request('category_id'))) &&
                    (!request('search') || stripos('Areas de Grado', request('search')) !== false ||
                    stripos('Organización de los temas de grado para orientar y dar referencia a futuros estudiantes e investigadores.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('areas.grado') }}">
                                <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Tesis de Ingeniería">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Áreas de Grado</h5>
                                <p class="collection-card-text">Organización de los temas de grado para orientar y dar referencia a futuros estudiantes e investigadores.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 1,234 documentos</span>
                                    <span><i class="fas fa-eye"></i> 5,678 vistas</span>
                                </div>
                                <a href="{{ route('areas.grado') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Collection Card 2 - Tesis -->
                    @if((!request('category_id') || in_array(2, (array)request('category_id'))) &&
                    (!request('search') || stripos('Tesis', request('search')) !== false ||
                    stripos('Almacenamiento de tesis de los estudiantes, con información detallada y fácil acceso para consultas académicas.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('tesis') }}">
                                <img src="https://images.unsplash.com/photo-1507413245164-6160d8298b31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Artículos Científicos">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Tesis</h5>
                                <p class="collection-card-text">Almacenamiento de tesis de los estudiantes, con información detallada y fácil acceso para consultas académicas.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 2,345 documentos</span>
                                    <span><i class="fas fa-eye"></i> 7,890 vistas</span>
                                </div>
                                <a href="{{ route('tesis') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Collection Card 3 - Pasantías -->
                    @if((!request('category_id') || in_array(3, (array)request('category_id'))) &&
                    (!request('search') || stripos('Pasantias', request('search')) !== false ||
                    stripos('Almacenamiento de pasantías de los estudiantes, con información detallada y fácil acceso para consultas académicas.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('pasantias') }}">
                                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Libros Académicos">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Pasantías</h5>
                                <p class="collection-card-text">Almacenamiento de pasantías de los estudiantes, con información detallada y fácil acceso para consultas académicas.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 567 documentos</span>
                                    <span><i class="fas fa-eye"></i> 3,456 vistas</span>
                                </div>
                                <a href="{{ route('pasantias') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Collection Card 4 - Prácticas Profesionales -->
                    @if((!request('category_id') || in_array(4, (array)request('category_id'))) &&
                    (!request('search') || stripos('Practicas Profesionales', request('search')) !== false ||
                    stripos('Documentación de prácticas realizadas por los estudiantes en entornos profesionales.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('practicas.profesionales') }}">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Proyectos de Investigación">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Prácticas Profesionales</h5>
                                <p class="collection-card-text">Documentación de prácticas realizadas por los estudiantes en entornos profesionales.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 789 documentos</span>
                                    <span><i class="fas fa-eye"></i> 4,567 vistas</span>
                                </div>
                                <a href="{{ route('practicas.profesionales') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Collection Card 5 - Servicios Comunitarios -->
                    @if((!request('category_id') || in_array(5, (array)request('category_id'))) &&
                    (!request('search') || stripos('Servicios Comunitarios', request('search')) !== false ||
                    stripos('Proyectos de servicio comunitario realizados por los estudiantes, destacando el impacto comunitario del departamento.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('servicios.comunitarios') }}">
                                <img src="https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Recursos Educativos">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Servicios Comunitarios</h5>
                                <p class="collection-card-text">Proyectos de servicio comunitario realizados por los estudiantes, destacando el impacto comunitario del departamento.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 1,234 documentos</span>
                                    <span><i class="fas fa-eye"></i> 6,789 vistas</span>
                                </div>
                                <a href="{{ route('servicios.comunitarios') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Collection Card 6 - Líneas de Investigación -->
                    @if((!request('category_id') || in_array(6, (array)request('category_id'))) &&
                    (!request('search') || stripos('Lineas de Investigacion', request('search')) !== false ||
                    stripos('Registro de las líneas de investigación desarrolladas o en desarrollo en el departamento.', request('search')) !== false))
                    <div class="col">
                        <div class="collection-card">
                            <a href="{{ route('lineas.investigacion') }}">
                                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Revistas Académicas">
                            </a>
                            <div class="collection-card-body">
                                <h5 class="collection-card-title">Líneas de Investigación</h5>
                                <p class="collection-card-text">Registro de las líneas de investigación desarrolladas o en desarrollo en el departamento.</p>
                                <div class="collection-card-stats">
                                    <span><i class="fas fa-file-alt"></i> 890 documentos</span>
                                    <span><i class="fas fa-eye"></i> 5,678 vistas</span>
                                </div>
                                <a href="{{ route('lineas.investigacion') }}" class="btn btn-primary w-100 mt-3">Ver colección</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Mensaje cuando no hay resultados -->
                @if(request('search') &&
                !(
                ((!request('category_id') || in_array(1, (array)request('category_id'))) && (stripos('Areas de Grado', request('search')) !== false || stripos('Organización de los temas de grado para orientar y dar referencia a futuros estudiantes e investigadores.', request('search')) !== false)) ||
                ((!request('category_id') || in_array(2, (array)request('category_id'))) && (stripos('Tesis', request('search')) !== false || stripos('Almacenamiento de tesis de los estudiantes, con información detallada y fácil acceso para consultas académicas.', request('search')) !== false)) ||
                ((!request('category_id') || in_array(3, (array)request('category_id'))) && (stripos('Pasantias', request('search')) !== false || stripos('Almacenamiento de pasantías de los estudiantes, con información detallada y fácil acceso para consultas académicas.', request('search')) !== false)) ||
                ((!request('category_id') || in_array(4, (array)request('category_id'))) && (stripos('Practicas Profesionales', request('search')) !== false || stripos('Documentación de prácticas realizadas por los estudiantes en entornos profesionales.', request('search')) !== false)) ||
                ((!request('category_id') || in_array(5, (array)request('category_id'))) && (stripos('Servicios Comunitarios', request('search')) !== false || stripos('Proyectos de servicio comunitario realizados por los estudiantes, destacando el impacto comunitario del departamento.', request('search')) !== false)) ||
                ((!request('category_id') || in_array(6, (array)request('category_id'))) && (stripos('Lineas de Investigacion', request('search')) !== false || stripos('Registro de las líneas de investigación desarrolladas o en desarrollo en el departamento.', request('search')) !== false))
                )
                )
                <div class="alert alert-info mt-4">
                    No se encontraron colecciones que coincidan con tu búsqueda: "{{ request('search') }}".
                    <a href="{{ route('collection') }}" class="alert-link">Ver todas las colecciones</a>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 Repositorio Académico Digital. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="me-3">Política de Privacidad</a>
                    <a href="#" class="me-3">Términos de Uso</a>
                    <a href="#">Contacto</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainNav = document.querySelector('.main-nav');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    mainNav.classList.add('scrolled');
                } else {
                    mainNav.classList.remove('scrolled');
                }
            });

            // Animación para las estadísticas de las colecciones
            function animateValue(obj, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    obj.innerHTML = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statsItems = entry.target.querySelectorAll('.collection-card-stats span');
                        statsItems.forEach(item => {
                            const finalValue = parseInt(item.innerText.match(/\d+/)[0]);
                            animateValue(item.querySelector('span'), 0, finalValue, 2000);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const collectionCards = document.querySelectorAll('.collection-card');
            collectionCards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>

</html>