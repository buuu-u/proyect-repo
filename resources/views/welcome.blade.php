<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-inicio: #ff7f50;
            --hover-colecciones: #32cd32;
            --hover-comunidades: #9370db;
            --hover-investigacion: #ff69b4;
            --hover-acerca: #ffd700;
            --hover-color: #1d4b6f;
            --accent-color: #ffd700;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }

        .institutional-nav {
            background-color: var(--primary-blue);
            color: white;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled {
            padding: 0.25rem 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .main-nav .navbar-brand img {
            height: 50px;
            transition: all 0.3s ease;
        }

        .main-nav.scrolled .navbar-brand img {
            height: 40px;
        }

        .main-nav .nav-item {
            position: relative;
            margin: 0 0.5rem;
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .main-nav .nav-item:nth-child(1) .nav-link:hover,
        .main-nav .nav-item:nth-child(1) .nav-link:focus,
        .main-nav .nav-item:nth-child(1) .nav-link.active {
            background-color: var(--hover-inicio);
        }

        .main-nav .nav-item:nth-child(2) .nav-link:hover,
        .main-nav .nav-item:nth-child(2) .nav-link:focus,
        .main-nav .nav-item:nth-child(2) .nav-link.active {
            background-color: var(--hover-colecciones);
        }

        .main-nav .nav-item:nth-child(3) .nav-link:hover,
        .main-nav .nav-item:nth-child(3) .nav-link:focus,
        .main-nav .nav-item:nth-child(3) .nav-link.active {
            background-color: var(--hover-comunidades);
        }

        .main-nav .nav-item:nth-child(4) .nav-link:hover,
        .main-nav .nav-item:nth-child(4) .nav-link:focus,
        .main-nav .nav-item:nth-child(4) .nav-link.active {
            background-color: var(--hover-investigacion);
        }

        .main-nav .nav-item:nth-child(5) .nav-link:hover,
        .main-nav .nav-item:nth-child(5) .nav-link:focus,
        .main-nav .nav-item:nth-child(5) .nav-link.active {
            background-color: var(--hover-acerca);
        }

        .main-nav .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            min-width: 200px;
            padding: 1rem;
            margin: 0.5rem 0 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .main-nav .nav-item:hover .dropdown-menu,
        .main-nav .nav-item .dropdown-menu.show {
            display: block;
            animation: fadeInUp 0.3s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 20px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .main-nav .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            clear: both;
            font-weight: 500;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            border-radius: 0.25rem;
            transition: all 0.2s ease-in-out;
        }

        .main-nav .dropdown-item:hover,
        .main-nav .dropdown-item:focus {
            color: var(--primary-blue);
            text-decoration: none;
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .main-nav .dropdown-item i {
            margin-right: 0.5rem;
            font-size: 1.1em;
            color: var(--primary-blue);
        }

        .hero-section {
            position: relative;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .feature-card {
            position: relative;
            overflow: hidden;
            min-height: 400px;
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            transition: all 0.3s ease;
        }

        .feature-card:hover::before {
            background: rgba(0,0,0,0.7);
        }

        .feature-card-content {
            position: relative;
            z-index: 1;
            padding: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feature-card h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .feature-card p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .news-section {
            background-color: var(--secondary-blue);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .news-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .news-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .carousel-item h5 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .carousel-item p {
            font-size: 1.1rem;
        }

        .carousel-indicators {
            bottom: -40px;
        }

        .carousel-indicators button {
            background-color: rgba(255,255,255,0.5);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background-color: white;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-light {
            background-color: rgba(255,255,255,0.9);
            color: var(--primary-blue);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-light:hover {
            background-color: white;
            color: var(--hover-color);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s;
        }

        .btn-light:hover::before {
            left: 100%;
        }

        .secondary-hero {
            position: relative;
            height: 400px;
            overflow: hidden;
            margin-top: 4rem;
        }

        .secondary-hero .carousel-item {
            height: 400px;
            background-size: cover;
            background-position: center;
        }

        .secondary-hero .carousel-caption {
            background-color: rgba(0,0,0,0.7);
            padding: 2rem;
            border-radius: 10px;
        }

        .stats-item {
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .stats-item:hover {
            background-color: rgba(255,255,255,0.2);
            transform: translateY(-3px);
        }

        .stats-item strong {
            font-size: 1.5rem;
            display: block;
            margin-bottom: 0.25rem;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 4rem;
        }

        footer h5 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        footer ul {
            padding-left: 0;
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
            justify-content: start;
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
                <li class="nav-item"><a href="#" class="nav-link">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="main-nav sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <a class="navbar-brand" href="#">
                    <img src="/placeholder.svg?height=50&width=200" alt="Logo Repositorio" height="50">
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Inicio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-home"></i> Página Principal</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-newspaper"></i> Novedades</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Colecciones</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-book"></i> Tesis</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i> Artículos</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-book-open"></i> Libros</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Comunidades</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-university"></i> Facultades</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users"></i> Grupos de Investigación</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Investigación</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-project-diagram"></i> Proyectos</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-signature"></i> Publicaciones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Acerca de</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-history"></i> Historia</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users"></i> Equipo</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Contacto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Search -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Repositorio Académico Digital</h1>
            <p class="hero-subtitle">Descubre y comparte conocimiento académico</p>
            <form class="search-form">
                <div class="input-group input-group-lg">
                    <input type="search" class="form-control search-input" placeholder="Buscar documentos, tesis, artículos...">
                    <button class="btn btn-primary search-btn" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Students Column -->
                <div class="col-md-4">
                    <div class="feature-card" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="feature-card-content">
                            <div>
                                <h2 class="floating">Estudiantes</h2>
                                <p>Accede a recursos académicos y comparte tu investigación con la comunidad universitaria.</p>
                            </div>
                            <a href="#" class="btn btn-light">Crear cuenta <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Column -->
                <div class="col-md-4">
                    <div class="news-section h-100">
                        <h2 class="floating">Noticias y Eventos</h2>
                        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <h5><i class="fas fa-book me-2"></i>Nueva colección disponible</h5>
                                    <p>Accede a la última colección de tesis doctorales en ciencias de la computación.</p>
                                </div>
                                <div class="carousel-item">
                                    <h5><i class="fas fa-cogs me-2"></i>Actualización del sistema</h5>
                                    <p>Nuevas funcionalidades de búsqueda avanzada y filtros personalizados.</p>
                                </div>
                                <div class="carousel-item">
                                    <h5><i class="fas fa-calendar-alt me-2"></i>Próximo evento</h5>
                                    <p>Taller de escritura académica el 15 de julio. ¡Inscríbete ahora!</p>
                                </div>
                            </div>
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="2"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resources Column -->
                <div class="col-md-4">
                    <div class="feature-card" style="background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                        <div class="feature-card-content">
                            <div>
                                <h2 class="floating">Recursos</h2>
                                <p>Explora nuestra extensa colección de recursos académicos de alta calidad.</p>
                                <div class="mt-4">
                                    <div class="stats-item">
                                        <strong>50,000+</strong>
                                        <span>Documentos</span>
                                    </div>
                                    <div class="stats-item">
                                        <strong>120</strong>
                                        <span>Colecciones</span>
                                    </div>
                                    <div class="stats-item">
                                        <strong>10,000+</strong>
                                        <span>Usuarios</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-light">Explorar recursos <i class="fas fa-search ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Secondary Hero Section with Carousel -->
    <section class="secondary-hero">
        <div id="secondaryHeroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="container d-flex align-items-center justify-content-center h-100">
                        <div class="carousel-caption text-start">
                            <h2 class="display-4 mb-4">Nueva Colección de Tesis</h2>
                            <p class="lead mb-4">Explora las últimas investigaciones de nuestros estudiantes</p>
                            <a href="#" class="btn btn-primary btn-lg">Ver Colección</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="container d-flex align-items-center justify-content-center h-100">
                        <div class="carousel-caption text-start">
                            <h2 class="display-4 mb-4">Próximo Evento Académico</h2>
                            <p class="lead mb-4">Conferencia Internacional de Investigación - 15 de Julio</p>
                            <a href="#" class="btn btn-primary btn-lg">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#secondaryHeroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#secondaryHeroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i>contacto@repositorio.edu</li>
                        <li><i class="fas fa-phone me-2"></i>(123) 456-7890</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Calle Universidad 123, Ciudad</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fas fa-shield-alt me-2"></i>Política de Privacidad</a></li>
                        <li><a href="#"><i class="fas fa-file-contract me-2"></i>Términos de Uso</a></li>
                        <li><a href="#"><i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <p class="text-center mb-0">&copy; 2023 Repositorio Académico Digital. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.main-nav .nav-item');
        let clickedItem = null;

        function closeAllMenus() {
            navItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                const menu = item.querySelector('.dropdown-menu');
                link.classList.remove('active');
                menu.classList.remove('show');
            });
        }

        function openMenu(item) {
            const link = item.querySelector('.nav-link');
            const menu = item.querySelector('.dropdown-menu');
            link.classList.add('active');
            menu.classList.add('show');
        }

        navItems.forEach(item => {
            const link = item.querySelector('.nav-link');
            const menu = item.querySelector('.dropdown-menu');
            
            // Manejar el hover
            item.addEventListener('mouseenter', function() {
                if (clickedItem && clickedItem !== item) {
                    // Si hay un ítem clickeado y no es este, lo cerramos
                    closeAllMenus();
                    clickedItem = null;
                }
                openMenu(item);
            });

            item.addEventListener('mouseleave', function() {
                if (!clickedItem || clickedItem !== item) {
                    closeAllMenus();
                }
            });

            // Manejar el clic
            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (clickedItem === item) {
                    // Si hacemos clic en el mismo ítem, lo cerramos
                    closeAllMenus();
                    clickedItem = null;
                } else {
                    // Si hacemos clic en un nuevo ítem, cerramos el anterior y abrimos este
                    closeAllMenus();
                    openMenu(item);
                    clickedItem = item;
                }
            });
        });

        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-nav')) {
                closeAllMenus();
                clickedItem = null;
            }
        });

        // Animación para las estadísticas
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
                    const statsItems = entry.target.querySelectorAll('.stats-item strong');
                    statsItems.forEach(item => {
                        const finalValue = parseInt(item.innerText.replace(/\D/g,''));
                        animateValue(item, 0, finalValue, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.feature-card:last-child');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Efecto de scroll en la navegación principal
        const mainNav = document.querySelector('.main-nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                mainNav.classList.add('scrolled');
            } else {
                mainNav.classList.remove('scrolled');
            }
        });
    });
    </script>
</body>
</html>

