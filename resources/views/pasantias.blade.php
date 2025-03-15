<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasantías - Repositorio Académico Digital</title>
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
            --card-shadow: 0 4px 6px rgba(0,0,0,0.1);
            --card-hover-shadow: 0 10px 20px rgba(0,0,0,0.15);
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .hero-section {
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
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

        .document-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        .document-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .document-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-blue);
        }

        .document-card-text {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .document-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background-color: rgba(0,0,0,0.02);
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .document-card-meta {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .document-card-meta i {
            margin-right: 0.25rem;
            color: var(--primary-blue);
        }

        .document-card-meta span {
            margin-right: 1rem;
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

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }

        .filters {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            position: sticky;
            top: 100px;
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

        .form-check-input:checked {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
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

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 30px;
        }

        .badge-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .company-logo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--primary-blue);
            margin-right: 1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
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
                <a class="navbar-brand" href="index.html">
                    <img src="/placeholder.svg?height=50&width=200" alt="Logo Repositorio" height="50">
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="colecciones.html" class="nav-link active">Colecciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Comunidades</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Investigación</a>
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
            <h1 class="hero-title">Pasantías</h1>
            <p class="hero-subtitle">Explora informes y proyectos desarrollados durante experiencias profesionales en empresas e instituciones</p>
            <form class="search-form">
                <div class="input-group input-group-lg">
                    <input type="search" class="form-control search-input" placeholder="Buscar pasantías...">
                    <button class="btn btn-primary search-btn" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-md-3">
                <div class="filters">
                    <h4>Filtros</h4>
                    <div class="mb-3">
                        <h5 class="h6">Sector</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterTecnologia">
                            <label class="form-check-label" for="filterTecnologia">
                                Tecnología
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterSalud">
                            <label class="form-check-label" for="filterSalud">
                                Salud
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterEducacion">
                            <label class="form-check-label" for="filterEducacion">
                                Educación
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterFinanzas">
                            <label class="form-check-label" for="filterFinanzas">
                                Finanzas
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="h6">Duración</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter3Meses">
                            <label class="form-check-label" for="filter3Meses">
                                3 meses
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter6Meses">
                            <label class="form-check-label" for="filter6Meses">
                                6 meses
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter12Meses">
                            <label class="form-check-label" for="filter12Meses">
                                12 meses
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="h6">Año</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter2023">
                            <label class="form-check-label" for="filter2023">
                                2023
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter2022">
                            <label class="form-check-label" for="filter2022">
                                2022
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filter2021">
                            <label class="form-check-label" for="filter2021">
                                2021
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="h6">Carrera</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterIngenieria">
                            <label class="form-check-label" for="filterIngenieria">
                                Ingeniería
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterAdministracion">
                            <label class="form-check-label" for="filterAdministracion">
                                Administración
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterComunicacion">
                            <label class="form-check-label" for="filterComunicacion">
                                Comunicación
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Grid -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <!-- Document Card 1 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Desarrollo de Sistema de Gestión de Inventario</h5>
                                </div>
                                <p class="document-card-text">Informe sobre el desarrollo e implementación de un sistema de gestión de inventario para una empresa de distribución, utilizando tecnologías web modernas.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Tecnología</span>
                                    <span class="badge bg-secondary">6 meses</span>
                                    <span class="badge bg-info">2023</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Carlos Mendoza</span>
                                    <span><i class="fas fa-building"></i> TechSolutions Inc.</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <!-- Document Card 2 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Estrategia de Marketing Digital para Productos Farmacéuticos</h5>
                                </div>
                                <p class="document-card-text">Desarrollo e implementación de una estrategia de marketing digital para una línea de productos farmacéuticos, con énfasis en redes sociales y SEO.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Salud</span>
                                    <span class="badge bg-secondary">3 meses</span>
                                    <span class="badge bg-info">2022</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Ana Martínez</span>
                                    <span><i class="fas fa-building"></i> FarmaSalud S.A.</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <!-- Document Card 3 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Análisis Financiero y Optimización de Costos</h5>
                                </div>
                                <p class="document-card-text">Estudio y análisis de la estructura de costos de una empresa manufacturera, con propuestas de optimización y mejora de la eficiencia financiera.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Finanzas</span>
                                    <span class="badge bg-secondary">6 meses</span>
                                    <span class="badge bg-info">2023</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Roberto Sánchez</span>
                                    <span><i class="fas fa-building"></i> Industrial Global Corp.</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <!-- Document Card 4 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Desarrollo de Plataforma E-learning para Escuelas</h5>
                                </div>
                                <p class="document-card-text">Diseño y desarrollo de una plataforma de aprendizaje en línea para instituciones educativas, con funcionalidades de gestión de contenidos y seguimiento de estudiantes.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Educación</span>
                                    <span class="badge bg-secondary">12 meses</span>
                                    <span class="badge bg-info">2022</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Laura Gómez</span>
                                    <span><i class="fas fa-building"></i> EduTech Solutions</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <!-- Document Card 5 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Implementación de Sistema de Gestión de Calidad</h5>
                                </div>
                                <p class="document-card-text">Desarrollo e implementación de un sistema de gestión de calidad basado en la norma ISO 9001:2015 para una empresa de manufactura de componentes electrónicos.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Tecnología</span>
                                    <span class="badge bg-secondary">6 meses</span>
                                    <span class="badge bg-info">2021</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Miguel Torres</span>
                                    <span><i class="fas fa-building"></i> ElectroComp S.A.</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <!-- Document Card 6 -->
                    <div class="col">
                        <div class="document-card">
                            <div class="document-card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Logo Empresa" class="company-logo">
                                    <h5 class="document-card-title mb-0">Desarrollo de Campaña de Comunicación Institucional</h5>
                                </div>
                                <p class="document-card-text">Planificación y ejecución de una campaña de comunicación institucional para mejorar la imagen corporativa y fortalecer la relación con los stakeholders.</p>
                                <div class="mb-2">
                                    <span class="badge badge-primary">Comunicación</span>
                                    <span class="badge bg-secondary">3 meses</span>
                                    <span class="badge bg-info">2023</span>
                                </div>
                            </div>
                            <div class="document-card-footer">
                                <div class="document-card-meta">
                                    <span><i class="fas fa-user"></i> Sofía Ramírez</span>
                                    <span><i class="fas fa-building"></i> Global Communications</span>
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul>
                        <li><i class="fas fa-envelope me-2"></i>contacto@repositorio.edu</li>
                        <li><i class="fas fa-phone me-2"></i>(123) 456-7890</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Calle Universidad 123, Ciudad</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul>
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
        // Efecto de scroll en la barra de navegación
        const mainNav = document.querySelector('.main-nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                mainNav.classList.add('scrolled');
            } else {
                mainNav.classList.remove('scrolled');
            }
        });

        // Animación para las tarjetas de documentos
        const documentCards = document.querySelectorAll('.document-card');
        documentCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('fade-in');
        });

        // Funcionalidad de filtrado
        const filterCheckboxes = document.querySelectorAll('.filters input[type="checkbox"]');
        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Aquí iría la lógica de filtrado real
                // Por ahora, solo mostramos un mensaje en consola
                console.log(`Filtro ${this.id} cambiado a: ${this.checked}`);
                
                // Simulación de filtrado con animación
                documentCards.forEach(card => {
                    card.style.opacity = '0.5';
                    card.style.transform = 'scale(0.95)';
                });
                
                setTimeout(() => {
                    documentCards.forEach(card => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    });
                }, 500);
            });
        });
    });
    </script>
</body>
</html>

