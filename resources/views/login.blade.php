<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Repositorio Académico Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-blue: #2d5d86;
            --secondary-blue: #428bca;
            --hover-color: #1d4b6f;
            --accent-color: #ffd700;
            --success-color: #28a745;
            --error-color: #dc3545;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
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

        .login-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            margin-top: 2rem;
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .login-title {
            color: var(--primary-blue);
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.2rem rgba(66, 139, 202, 0.25);
            background-color: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);
            transition: all 0.6s;
        }

        .btn-primary:hover:before {
            left: 100%;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .login-options a {
            color: var(--secondary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-options a:hover {
            color: var(--hover-color);
            text-decoration: underline;
        }

        .social-login {
            margin-top: 2rem;
        }

        .social-login-btn {
            width: 100%;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .social-login-btn:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .social-login-btn i {
            margin-right: 0.75rem;
            font-size: 1.2em;
        }

        .btn-google {
            background-color: #DB4437;
            border-color: #DB4437;
            color: white;
        }

        .btn-facebook {
            background-color: #4267B2;
            border-color: #4267B2;
            color: white;
        }

        .btn-twitter {
            background-color: #1DA1F2;
            border-color: #1DA1F2;
            color: white;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            margin-bottom: 2rem;
        }

        .logo-container img {
            max-height: 100%;
            transition: all 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        .input-group-text {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        footer h5 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        footer ul {
            padding-left: 0;
        }

        footer ul li {
            margin-bottom: 0.5rem;
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
            transform: translateY(-3px);
        }

        .social-icons i {
            font-size: 1.2rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 2rem;
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

    <div class="container">
        <div class="logo-container">
            <img src="/placeholder.svg?height=80&width=300" alt="Logo Repositorio" class="img-fluid">
        </div>
    </div>

    <!-- Login Section -->
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container fade-in">
                        <h2 class="login-title">Iniciar Sesión</h2>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf <!-- Token CSRF -->

                            <!-- Campo de correo electrónico -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <!-- Campo de contraseña -->
                            <div class="mb-4">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>

                            <!-- Opciones de inicio de sesión -->
                            <div class="login-options mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                    <label class="form-check-label" for="rememberMe">
                                        Recordarme
                                    </label>
                                </div>
                                <a href="#">¿Olvidaste tu contraseña?</a>
                            </div>

                            <!-- Botón de inicio de sesión -->
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                        </div>
                        <div class="social-login">
                            <p class="text-center mb-3">O inicia sesión con:</p>
                            <button class="btn social-login-btn btn-google">
                                <i class="fab fa-google"></i> Google
                            </button>
                            <button class="btn social-login-btn btn-facebook">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </button>
                            <button class="btn social-login-btn btn-twitter">
                                <i class="fab fa-twitter"></i> Twitter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> contacto@repositorio.edu</li>
                        <li><i class="fas fa-phone"></i> (123) 456-7890</li>
                        <li><i class="fas fa-map-marker-alt"></i> Calle Universidad 123, Ciudad</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Política de Privacidad</a></li>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Términos de Uso</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> Preguntas Frecuentes</a></li>
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
            <p class="text-center mb-0">&copy; 2025 Repositorio Académico Digital. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            // Animación para los campos de formulario
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-5px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                });
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Efecto hover para los botones de redes sociales
            const socialIcons = document.querySelectorAll('.social-icons a');
            socialIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) rotate(5deg)';
                });
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) rotate(0)';
                });
            });
        });
    </script>
</body>

</html>