<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Authentic Learn - Home</title>
        <!-- Bootstrap 5.3.8 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="icon" href="https://www.authenticfarma.com/wp-content/uploads/2025/05/cropped-isotipo_color-scaled-1-32x32.png" sizes="32x32" />
        <link rel="icon" href="https://www.authenticfarma.com/wp-content/uploads/2025/05/cropped-isotipo_color-scaled-1-192x192.png" sizes="192x192" />                              
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

            <!-- Siempre cargamos Bootstrap y Bootstrap Icons desde CDN -->
        <link rel="stylesheet" href="/css/custom.css">
    </head>

    <body class="bg-light position-relative" style="overflow-x:hidden;">

        
        

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-4 sticky-top">
            <div class="container-fluid px-5">
                <a class="navbar-brand fw-bold " href="#" style="font-size:1.3rem; letter-spacing:-0.5px; font-family:'Inter',sans-serif;">
                    Authentic E-learning
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav mx-auto align-items-lg-center gap-lg-4">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-medium position-relative" href="#modulos" style="font-size:0.95rem;">
                                Cursos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-medium position-relative" href="#mentores" style="font-size:0.95rem;">
                                Mentores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-medium position-relative" href="#faq" style="font-size:0.95rem;">
                                Preguntas
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                        <li class="nav-item">
                            <a id="btnAcceder" class="btn btn-outline-secondary ms-lg-2 px-4 py-2 position-relative" href="javascript:void(0)" role="button" style="border-radius:15px;font-weight:600;font-size:0.95rem;">
                                Ingresar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success ms-lg-2 px-4 py-2 position-relative" href="{{ route('register') }}" style="border-radius:15px;font-weight:600;font-size:0.95rem;">
                                Regístrate
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="text-center position-relative header-bg" style="background-image: url('/images/fondo2.png'); background-size: cover; background-position: center center; background-repeat: no-repeat; min-height: 110vh; width: 100vw; margin-left: calc(-50vw + 50%); overflow: hidden;">
            <!-- Overlay para mejorar legibilidad del texto -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.1);"></div>
            
            <div class="position-relative d-flex align-items-center justify-content-center header-content " style="z-index: 2; min-height: 110vh; padding: 80px 0;">
                <div class="container py-5 ">
                    <h1 class="h2 fw-bold text-white mb-4 " style="line-height:1;font-family:'Inter',sans-serif;">
                        Desarrolla tus competencias técnicas:
                    </h1>
                    <h1 class="text-white mb-4" style="line-height:1;font-family:'Inter',sans-serif;">
                        + Aprende + Conéctate + Transforma
                    </h1>
                 
                    
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">
                        <a href="{{ route('register') }}" class="btn btn-pharma btn-lg px-5 py-3" style="border-radius:15px;">
                            Inscríbete ahora
                        </a>
                        <a href="/diagnostic" class="btn btn-diagnostic btn-lg ms-2 d-inline-flex align-items-center justify-content-center" id="btnDiagnostic" role="button">
                            <i class="bi bi-clipboard-check me-2" aria-hidden="true"></i>
                            Realizar diagnóstico
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="container py-5">

            <!-- Qué es Authentic Farma E-Learning -->
            <section class="mb-6">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="position-relative">
                            <!-- Fondo decorativo -->
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background:rgba(248,249,250,0.8);border-radius:16px;"></div>
                            <div class="card border-0 position-relative" style="background: #CFC8EF;backdrop-filter:blur(15px);border-radius:16px;overflow:hidden;">
                                <!-- Header de la sección -->
                                <div class="card-body text-center py-5 px-4">
                                    {{-- <div class="mb-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill fw-medium mb-3 badge-custom-large">
                                            <i class="bi bi-stars me-2"></i>Plataforma Líder
                                        </span>
                                    </div> --}}
                                    <h2 class="h2 fw-bold mb-4" style="font-family:'Inter',sans-serif;letter-spacing:-0.8px;color:#1e293b;">
                                        ¿Qué es <span class="text-dark">Authentic</span> E-Learning?
                                    </h2>
                                    <p class="lead text-dark mb-5 mx-auto" style="max-width:700px;line-height:1.7;font-size:1.1rem;">
                                        Una plataforma formativa diseñada para profesionales, estudiantes y empresas del sector farmacéutico y dispositivos médicos, con contenido de alto impacto, formación especializada y aprendizaje continuo.
                                    
                                    <!-- Cards de beneficios -->
                                    <div class="row g-4 mt-4">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="feature-card h-100 p-4 rounded-3 position-relative overflow-hidden">
                                                <div class="feature-bg"></div>
                                                <div class="position-relative z-1">
                                                    <div class="mb-3">
                                                        <div class="feature-icon bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                                            <i class="bi bi-mortarboard text-primary" style="font-size:1.5rem;"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fw-bold mb-2" style="color:#1e293b;">Formación Especializada</h5>
                                                    <p class="text-secondary small mb-0">En competencias proyectadas para los líderes del año 2030.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="feature-card h-100 p-4 rounded-3 position-relative overflow-hidden">
                                                <div class="feature-bg"></div>
                                                <div class="position-relative z-1">
                                                    <div class="mb-3">
                                                        <div class="feature-icon bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                                            <i class="bi bi-star-fill text-success" style="font-size:1.5rem;"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fw-bold mb-2" style="color:#1e293b;">Mentores con experiencia</h5>
                                                    <p class="text-secondary small mb-0">En la industria farmacéutica y dispositivos médicos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="feature-card h-100 p-4 rounded-3 position-relative overflow-hidden">
                                                <div class="feature-bg"></div>
                                                <div class="position-relative z-1">
                                                    <div class="mb-3">
                                                        <div class="feature-icon bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                                            <i class="bi bi-clock-history text-info" style="font-size:1.5rem;"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fw-bold mb-2" style="color:#1e293b;">Flexibilidad de horarios</h5>
                                                    <p class="text-secondary small mb-0">Modalidad 100% digital, aprende a tu ritmo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="feature-card h-100 p-4 rounded-3 position-relative overflow-hidden">
                                                <div class="feature-bg"></div>
                                                <div class="position-relative z-1">
                                                    <div class="mb-3">
                                                        <div class="feature-icon bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                                            <i class="bi bi-award text-warning" style="font-size:1.5rem;"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fw-bold mb-2" style="color:#1e293b;">Certificación</h5>
                                                    <p class="text-secondary small mb-0">Completa el 100% de los módulos y obtén tu reconocimiento.</p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <!-- Misión -->
                                    <div class="mt-5 p-4 rounded-3" style="background:rgba(248,249,250,0.9);border:1px solid rgba(0,87,184,0.1);">
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <i class="bi bi-target text-primary me-2" style="font-size:1.5rem;"></i>
                                            <h6 class="fw-bold mb-0 text-datk">Nuestro Mantra</h6>
                                        </div>
                                        <p class="text-secondary mb-0" style="line-height:1.6;">
                                            Estamos transformando la formación en la industria farmacéutica, de dispositivos médicos y dermocosméticos. <strong>¡Desarrolla tus competencias con expertos y contenido de alto impacto!</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Módulos / Contenido educativo profesional -->
            <section id="modulos" class="mb-6">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <!-- Header profesional -->
                        <div class="text-center mb-5">
                           
                            <h2 class="h2 fw-bold  mb-3" style="font-family:'Inter',sans-serif;letter-spacing:-0.8px;">
                                ¿Qué vas a <span class="">aprender</span>?
                            </h2>
                            {{-- <p class="lead text-white-50 mx-auto mb-4" style="max-width:700px;line-height:1.6;">
                                Desarrolla las competencias más demandadas en el sector farmacéutico
                            </p> --}}
                        </div>

                        <!-- Carrusel mejorado -->
                        <div class="position-relative" style="padding:2rem;border-radius:20px;">
                            <!-- Fondo decorativo del carrusel -->
                            <div class="position-absolute top-0 start-0 w-100 h-100"></div>
                            
                            <div class="position-relative">
                                <div class="row justify-content-center g-4">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="card border-0 shadow-lg rounded-4 h-100 mx-auto card-hover-effect" style="background: #B9DFF7;backdrop-filter:blur(15px);">
                                            <div class="card-body text-center p-4">
                                                <div class="mb-3">
                                                    <div class="icon-container d-inline-flex align-items-center justify-content-center rounded-circle  bg-opacity-15 mb-3" style="width:70px;height:70px;">
                                                        <i class="bi bi-graph-up" style="font-size:2.5rem;color:#0057b8;"></i>
                                                    </div>
                                                </div>
                                                <h5 class="card-title fw-bold text-dark mb-3">Power BI para la Gestión de Pacientes</h5>
                                                <ul class="mb-3 text-start" style="list-style:none;padding:0;">
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Introducción y preparación de datos</li>
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Modelados y Análisis de datos</li>
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Creación de Dashboards</li>
                                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Compartir y publicar</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="card border-0 shadow-lg rounded-4 h-100 mx-auto card-hover-effect" style="background: #CFEAD6;backdrop-filter:blur(15px);">
                                            <div class="card-body text-center p-4">
                                                <div class="mb-3">
                                                    <div class="icon-container d-inline-flex align-items-center justify-content-center rounded-circle  bg-opacity-15 mb-3" style="width:70px;height:70px;">
                                                        <i class="bi bi-lightning-fill" style="font-size:2.5rem;color:#00a86b;"></i>
                                                    </div>
                                                </div>
                                                <h5 class="card-title fw-bold text-dark mb-3">Power Automate para la Gestión de Pacientes</h5>
                                                <ul class="mb-3 text-start" style="list-style:none;padding:0;">
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Introducción y preparación de datos</li>
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Automatización de procesos clínicos</li>
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Integración de sistemas</li>
                                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Seguridad y Mejores prácticas</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información adicional -->
                            {{-- <div class="text-center mt-4">
                                <p class="text-white-50 small mb-0">
                                    <i class="bi bi-award me-2"></i>Certificación profesional al completar cada módulo
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
            <!-- Mentores / Facilitadores -->
            <section id="mentores" class="mb-6">
                <div class="text-center mb-5">
                    
                 
                    <h2 class="h3 fw-bold mb-3" style="font-family:'Inter',sans-serif;letter-spacing:-0.5px;">
                        Conoce a tus mentores
                    </h2>
                    <p class=" mx-auto" style="max-width:600px;">
                        Mentores con amplia experiencia liderando la transformación del talento en el sector farmacéutico
                    </p>
                </div>
                <div class="row justify-content-center g-4">
                    <!-- Angelica M. Santos R. -->
                    <div class="col-lg-3 col-md-6">
                        <div class=" text-center h-100 p-4 p-lg-4 rounded-4 position-relative overflow-hidden" style="background: #CFEAD6;backdrop-filter:blur(15px);border:1px solid rgba(0,87,184,0.1);box-shadow:0 8px 40px rgba(0,87,184,0.12);transition:all 0.4s ease;">
                            <div class="team-bg position-absolute top-0 start-0 w-100 h-100" style="background:rgba(248,249,250,0.5);transition:opacity 0.4s ease;"></div>
                            <div class="position-relative z-1">
                                <div class="mb-3">
                                    <div class="mentor-photo-container position-relative d-inline-block">
                                        <img src="/images/Mentora Angelica Santos .png" alt="Angelica M. Santos R." class="mentor-photo rounded-circle border border-primary border-opacity-20" style="width:100px;height:100px;object-fit:cover;">
                                        <div class=" position-absolute top-0 start-0 w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="background:rgba(0,87,184,0.1);">
                                            
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-2" style="color:#1e293b;font-size:1.1rem;">Angelica M. Santos R.</h5>
                                {{-- <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-semibold" style="font-size:0.75rem;">
                                    Co-Fundadora
                                </div> --}}
                                <p class="text-secondary small mb-3 lh-base" style="font-size:0.8rem;">
                                    <strong>Psicóloga</strong> + Especialista en Gestión Humana y Desarrollo Organizacional + Coach Ejecutivo + Master
                                </p>
                                <p class="text-muted small mb-2 mt-2" style="font-size:0.8rem;">
                                    Especialista en atracción del talento y transformación digital en RRHH.
                                </p>
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <div class="company-logos-container p-3 rounded-3" style="">
                                        <img src="/images/empresas angelica sin fondo.png" alt="Empresas Angelica Santos" class="img-fluid" style="max-height:145px;max-width:360px;object-fit:contain;filter:brightness(1.1) contrast(1.05);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Natalia Vergara -->
                    <div class="col-lg-3 col-md-6">
                        <div class=" text-center h-100 p-4 p-lg-4 rounded-4 position-relative overflow-hidden" style="background: #CFC8EF;backdrop-filter:blur(15px);border:1px solid rgba(0,87,184,0.1);box-shadow:0 8px 40px rgba(0,87,184,0.12);transition:all 0.4s ease;">
                            <div class="team-bg position-absolute top-0 start-0 w-100 h-100" style="background:rgba(248,249,250,0.5);transition:opacity 0.4s ease;"></div>
                            <div class="position-relative z-1">
                                <div class="mb-3">
                                    <div class="mentor-photo-container position-relative d-inline-block">
                                        <img src="/images/mentora Natalia vergara.png" alt="Natalia Vergara" class="mentor-photo rounded-circle border border-success border-opacity-20" style="width:100px;height:100px;object-fit:cover;">
                                        <div class=" position-absolute top-0 start-0 w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="background:rgba(0,168,107,0.1);">
                                            <i class="bi bi-brain text-success" style="font-size:1.5rem;"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-2" style="color:#1e293b;font-size:1.1rem;">Natalia Vergara</h5>
                                {{-- <div class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-3 fw-semibold" style="font-size:0.75rem;">
                                    Coach
                                </div> --}}
                                <p class="text-secondary small mb-3 lh-base" style="font-size:0.8rem;">
                                    <strong>Psicóloga</strong> + Especialista en Administración de Empresas
                                </p>
                                <p class="text-muted small mb-0" style="font-size:0.8rem;">
                                    Especialista en desarrollo empresarial y coaching profesional
                                </p>
                                <div class="d-flex align-items-center justify-content-center mb-3 mt-2">
                                    <div class="company-logos-container p-3 rounded-3" style="">
                                        <img src="/images/logos_empresa_nataalia_sin_fondo.png" alt="Empresas Natalia Vergara" class="img-fluid" style="max-height:145px;max-width:360px;object-fit:contain;filter:brightness(1.1) contrast(1.05);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Otoniel Fonseca -->
                    <div class="col-lg-3 col-md-6">
                        <div class=" text-center h-100 p-4 p-lg-4 rounded-4 position-relative overflow-hidden" style="background: #B9DFF7;backdrop-filter:blur(15px);border:1px solid rgba(0,87,184,0.1);box-shadow:0 8px 40px rgba(0,87,184,0.12);transition:all 0.4s ease;">
                            <div class="team-bg position-absolute top-0 start-0 w-100 h-100" style="background:rgba(248,249,250,0.5);transition:opacity 0.4s ease;"></div>
                            <div class="position-relative z-1">
                                <div class="mb-3">
                                    <div class="mentor-photo-container position-relative d-inline-block">
                                        <img src="/images/mentor Otoniel Fonseca.png" alt="Otoniel Fonseca" class="mentor-photo rounded-circle border border-info border-opacity-20" style="width:100px;height:100px;object-fit:cover;">
                                        <div class=" position-absolute top-0 start-0 w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="background:rgba(13,202,240,0.1);">
                                            
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-2" style="color:#1e293b;font-size:1.1rem;">Otoniel Fonseca</h5>
                                {{-- <div class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill mb-3 fw-semibold" style="font-size:0.75rem;">
                                    Co-Fundador
                                </div> --}}
                                <p class="text-secondary small mb-3 lh-base" style="font-size:0.8rem;">
                                    <strong>Ingeniero de Sistemas</strong> + Arquitecto de Software
                                </p>
                                <p class="text-muted small mb-0" style="font-size:0.8rem;">
                                    Arquitecto de soluciones tecnológicas para plataformas digitales especializadas
                                </p>
                                <div class="d-flex align-items-center justify-content-center mb-3 mt-2">
                                    <div class="company-logos-container p-3 rounded-3" style="">
                                        <img src="/images/empresas_oto_sin_fondo.png" alt="Empresas Otoniel" class="img-fluid" style="max-height:185px;max-width:380px;object-fit:contain;filter:brightness(1.1) contrast(1.05);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class=" text-center h-100 p-4 p-lg-4 rounded-4 position-relative overflow-hidden" style="background: #CFEAD6;backdrop-filter:blur(15px);border:1px solid rgba(0,87,184,0.1);box-shadow:0 8px 40px rgba(0,87,184,0.12);transition:all 0.4s ease;">
                            <div class="team-bg position-absolute top-0 start-0 w-100 h-100" style=""></div>
                            <div class="position-relative z-1">
                                <div class="mb-3">
                                    <div class="mentor-photo-container position-relative d-inline-block">
                                        <img src="/images/mentora Carolina huertas.png" alt="Carolina Huertas" class="mentor-photo rounded-circle border border-info border-opacity-20" style="width:100px;height:100px;object-fit:cover;transition:all 0.3s ease;">
                                        <div class="photo-overlay position-absolute top-0 start-0 w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="background:rgba(13,202,240,0.1);opacity:0;transition:opacity 0.3s ease;">
                                            
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-2" style="color:#1e293b;font-size:1.1rem;">Carolina Huertas</h5>
                                {{-- <div class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill mb-3 fw-semibold" style="font-size:0.75rem;">
                                    Co-Fundador
                                </div> --}}
                                <p class="text-secondary small mb-3 lh-base" style="font-size:0.8rem;">
                                    <strong>Zootecnista + Especialista en Finanzas + Magister en Administración Financiera</strong>
                                </p>
                                <p class="text-muted small mb-0" style="font-size:0.8rem;">
                                    Liderazgo en modelos de negocios sostenibles
                                </p>
                                <div class="d-flex align-items-center justify-content-center mb-3 mt-2">
                                    <div class="company-logos-container p-4 rounded-3" >
                                        <img src="/images/empresas_carolina_sin_fondo.png" alt="Empresas Carolina Huertas" class="img-fluid" style="max-height:180px;max-width:420px;object-fit:contain;filter:brightness(1.1) contrast(1.05);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats del equipo -->
                {{-- <div class="row justify-content-center mt-5">
                    <div class="col-lg-10">
                        <div class="p-4 rounded-4 text-center" style="background:rgba(255,255,255,0.9);backdrop-filter:blur(15px);border:1px solid rgba(0,87,184,0.08);box-shadow:0 4px 25px rgba(0,87,184,0.1);">
                            <div class="row text-center g-4">
                                <div class="col-6 col-md-3">
                                    <div class="stat-item">
                                        <h3 class="fw-bold text-primary mb-1">3</h3>
                                        <p class="small text-muted mb-0">Co-Fundadores</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="stat-item">
                                        <h3 class="fw-bold text-success mb-1">15+</h3>
                                        <p class="small text-muted mb-0">Años de Experiencia</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="stat-item">
                                        <h3 class="fw-bold text-info mb-1">100+</h3>
                                        <p class="small text-muted mb-0">Profesionales Formados</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="stat-item">
                                        <h3 class="fw-bold text-warning mb-1">5+</h3>
                                        <p class="small text-muted mb-0">Especializaciones</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </section>
            <!-- FAQ / Preguntas frecuentes -->
            <section id="faq" class="mb-6">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <!-- Header de la sección -->
                        <div class="text-center mb-5">
                           
                            <h2 class="h2 fw-bold mb-3 " style="font-family:'Inter',sans-serif;letter-spacing:-0.8px;">
                                Preguntas <span class="">Frecuentes</span>
                            </h2>
                            <p class="lead  mx-auto" style="max-width:600px;line-height:1.6;">
                                Resolvemos las dudas más comunes para que puedas comenzar tu formación sin inconvenientes
                            </p>
                        </div>

                        <!-- FAQ Cards -->
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class=" h-100 p-4 rounded-3 position-relative" style="background: #CFEAD6;">
                                    <div class="faq-number">01</div>
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 mb-3" style="width:50px;height:50px;">
                                            <i class="bi bi-clock text-primary" style="font-size:1.2rem;"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3" style="color:#1e293b;">¿Cuánto tiempo tengo para completar los módulos?</h5>
                                    <p class="text-secondary mb-0" style="line-height:1.6;">
                                        Puedes avanzar a tu ritmo. La plataforma es flexible y 100% digital.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" h-100 p-4 rounded-3 position-relative" style="background: #CFC8EF;">
                                    <div class="faq-number">02</div>
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 mb-3" style="width:50px;height:50px;">
                                            <i class="bi bi-book-fill text-success" style="font-size:1.2rem;"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3" style="color:#1e293b;">¿Necesito tener experiencia previa en sector farmacéutico y dispositivos médicos?</h5>
                                    <p class="text-secondary mb-0" style="line-height:1.6;">
                                        Si, los contenidos están diseñados para niveles intermedios de conocimiento
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" h-100 p-4 rounded-3 position-relative" style="background: #B9DFF7;">
                                    <div class="faq-number">03</div>
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-10 mb-3" style="width:50px;height:50px;">
                                            <i class="bi bi-key text-info" style="font-size:1.2rem;"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3" style="color:#1e293b;">¿Cómo accedo a la plataforma Authentic E-learning?</h5>
                                    <p class="text-secondary mb-0" style="line-height:1.6;">
                                        Al registrarte, recibirás acceso automático directo y soporte personalizado para comenzar inmediatamente. 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" h-100 p-4 rounded-3 position-relative" style="background: #CFEAD6;">
                                    <div class="faq-number">04</div>
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 mb-3" style="width:50px;height:50px;">
                                            <i class="bi bi-headset text-warning" style="font-size:1.2rem;"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3" style="color:#1e293b;">Soporte / contacto técnico</h5>
                                    <p class="text-secondary mb-0" style="line-height:1.6;">
                                        Puedes contactarnos en cualquier momento a través de WhatsApp para soporte y te responderemos en las 24 horas siguientes.
                                    </p>
                                </div>
                            </div>
                        </div>

        
                    </div>
                </div>
            </section>

            <!-- Llamada a la acción simplificada -->
            <section class="text-center mb-6">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="py-5 px-4">
                            <h2 class="h2 fw-bold  mb-4" style="font-family:'Inter',sans-serif;">
                                ¿Listo para impulsar tu carrera en farma y desarrollar tus power skills?
                            </h2>
                            
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">
                                <a href="{{ route('register') }}" class="btn btn-pharma btn-lg px-5 py-3" style="border-radius:15px;">
                                    <i class="bi bi-arrow-right-circle me-2"></i>Comenzar ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <a href="https://wa.me/573334002303" target="_blank" class="position-fixed" style="bottom:30px;right:30px;z-index:9999;text-decoration:none;">
            <span class="d-flex align-items-center justify-content-center bg-success text-white rounded-circle shadow-lg" style="width:60px;height:60px;font-size:2rem;">
                <i class="bi bi-whatsapp"></i>
            </span>
        </a>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <footer class="border-0 mt-5 pt-5 pb-4" style="background: #2d3748;">
            <div class="container">
                <div class="row justify-content-between align-items-start">
                    <div class="col-md-5 mb-4">
                        <div class="fw-bold mb-3 text-white" style="font-family:'Inter',sans-serif;font-size:1.3rem;">
                            <i class="bi bi-capsule me-2 text-primary"></i>Authentic Farma
                        </div>
                        <p class="text-white-50 small mb-3" style="line-height:1.6;">
                            Transformando la formación en la industria farmacéutica con contenido especializado y aprendizaje continuo.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="https://co.linkedin.com/company/authenticfarma" class="text-white-50 hover-text-primary transition-all" style="font-size:1.3rem;transition:color 0.3s ease;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            {{-- <a href="#" class="text-white-50 hover-text-primary transition-all" style="font-size:1.3rem;transition:color 0.3s ease;">
                                <i class="bi bi-twitter"></i>
                            </a> --}}
                            <a href="https://www.instagram.com/authentic_farma/" class="text-white-50 hover-text-primary transition-all" style="font-size:1.3rem;transition:color 0.3s ease;">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://wa.me/573334001541" target="_blank" class="text-white-50 hover-text-success transition-all" style="font-size:1.3rem;transition:color 0.3s ease;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                        
                        <!-- Logos del patrocinio -->
                        {{-- <div class="mt-4">
                            <div class="text-white-50 small mb-2 fw-medium">
                                <i class="bi bi-award me-2 text-primary"></i>Patrocinado por CCB
                            </div>
                            <div class="d-flex gap-2 align-items-center justify-content-start flex-wrap">
                                <img src="/images/patrocinador-1.png" alt="Patrocinio CCB" class="img-fluid opacity-75 logo-responsive" style="max-height:50px;max-width:120px;object-fit:contain;">
                                <!-- Logo Clúster Farma+ CCB -->
                                <img src="/images/cluster.png" alt="Clúster Farma+ CCB" class="img-fluid opacity-75 logo-responsive" style="max-height:50px;max-width:140px;object-fit:contain;">
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-2 mb-4">
                        <h6 class="fw-semibold text-white mb-3">
                            <i class="bi bi-mortarboard me-2 text-primary"></i>Formación
                        </h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#modulos" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Módulos
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Certificaciones
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Mentores
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-4">
                        <h6 class="fw-semibold text-white mb-3">
                            <i class="bi bi-building me-2 text-primary"></i>Empresa
                        </h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Acerca de
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Contacto
                                </a>
                            </li>
                            {{-- <li class="mb-2">
                                <a href="#" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                                    <i class="bi bi-arrow-right me-2"></i>Blog
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h6 class="fw-semibold text-white mb-3">
                            <i class="bi bi-telephone me-2 text-primary"></i>Contacto
                        </h6>
                        <div class="text-white-50 small mb-2 d-flex align-items-center">
                            <i class="bi bi-envelope me-2 text-primary"></i>
                            <a href="mailto:info@authenticfarma.com" class="text-white-50 text-decoration-none hover-text-white" style="transition:color 0.3s ease;">
                                administrativo@authentic.com.co
                            </a>
                        </div>
                        <div class="text-white-50 small mb-3 d-flex align-items-center">
                            <i class="bi bi-whatsapp me-2 text-success"></i>
                            <a href="https://wa.me/573334001541" target="_blank" class="text-white-50 text-decoration-none hover-text-white" style="transition:color 0.3s ease;">
                                +57 333 4002303
                            </a>
                        </div>
                        <div class="text-white-50 small mb-3 d-flex align-items-center">
                            <i class="bi bi-geo-alt me-2 text-primary"></i>
                            <span>Colombia</span>
                        </div>
                        
                        <!-- Información del líder Clúster Farma+ CCB -->
                        <hr style="border-color:rgba(255,255,255,0.2); margin: 1rem 0 0.75rem 0;">
                        {{-- <div class="mb-2">
                            <div class="fw-semibold text-white small mb-1">
                                <i class="bi bi-award me-2 text-primary"></i>Proyecto financiado por:
                            </div>
                            <div class="text-white-50 small mb-1">Clúster Farma+ CCB</div>
                        </div> --}}
                        {{-- <div class="text-white-50 small mb-2">Líder Iniciativa Cluster Farmacéutico</div>
                        <div class="fw-semibold text-white small mb-1">Miguel Angel Bustos Uribe</div>
                        <div class="text-white-50 small d-flex align-items-center">
                            <i class="bi bi-envelope me-2 text-primary"></i>
                            <a href="mailto:Miguel.bustos@ccb.org.co" class="text-white-50 text-decoration-none hover-text-white" style="transition:color 0.3s ease;">
                                Miguel.bustos@ccb.org.co
                            </a>
                        </div> --}}
                    </div>
                </div>

                <hr class="my-4" style="border-color:rgba(255,255,255,0.2);">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="text-white-50 small d-flex align-items-center">
                            <i class="bi bi-c-circle me-2"></i>
                            {{ date('Y') }} Authentic Farma. Todos los derechos reservados.
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="{{ route('policies-data.index') }}" class="text-white-50 text-decoration-none small me-3 hover-text-white" style="transition:color 0.3s ease;">
                            <i class="bi bi-shield-check me-1"></i>Política de Privacidad
                        </a>
                        <a href="{{ route('policies-data.index') }}" class="text-white-50 text-decoration-none small hover-text-white" style="transition:color 0.3s ease;">
                            <i class="bi bi-file-text me-1"></i>Términos de Uso
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/custom.js"></script>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar clic en botón "Acceder"
            const btnAcceder = document.getElementById('btnAcceder');
            if (btnAcceder) {
                btnAcceder.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Mostrar toast informativo
                    if (typeof Toastify !== 'undefined') {
                        Toastify({
                            text: "🚀 ¡La plataforma estará habilitada pronto!",
                            duration: 6000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#28a745",
                            stopOnFocus: true,
                            className: "toast-info-fixed",
                            offset: {
                                x: 20,
                                y: 20
                            }
                        }).showToast();
                    } else {
                        // Fallback si Toastify no está disponible
                        alert('La plataforma estará habilitada desde el 15 de octubre de 2025');
                    }
                });
            }
            
        });
        </script>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        
        <style>
            .toastify {
                z-index: 99999 !important;
                position: fixed !important;
                box-shadow: 0 8px 32px rgba(0, 87, 184, 0.3) !important;
                border-radius: 12px !important;
                font-size: 1rem !important;
                font-weight: 600 !important;
                padding: 16px 20px !important;
                max-width: 400px !important;
            }
            
            .toast-info-fixed {
                animation: slideInRight 0.3s ease-out !important;
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            /* Estilos responsivos para header en móviles */
            @media (max-width: 768px) {
                .header-bg {
                    background-size: cover !important;
                    background-position: center top !important;
                    min-height: 100vh !important;
                    background-attachment: scroll !important;
                }
                
                .header-content {
                    min-height: 100vh !important;
                    padding: 40px 15px !important;
                }
                
                .display-5 {
                    font-size: 2rem !important;
                    line-height: 1.3 !important;
                }
                
                .badge-custom-large {
                    font-size: 0.9rem !important;
                    padding: 10px 16px !important;
                }
            }
            
            @media (max-width: 576px) {
                .header-bg {
                    background-position: center center !important;
                    min-height: 100vh !important;
                }
                
                .header-content {
                    padding: 30px 10px !important;
                }
                
                .display-5 {
                    font-size: 1.8rem !important;
                }
                
                /* Logos responsivos para móviles */
                .logo-responsive {
                    max-height: 35px !important;
                    max-width: 80px !important;
                    flex-shrink: 1 !important;
                }
                
                /* Contenedor de logos en móvil */
                .d-flex.gap-2.align-items-center {
                    gap: 0.5rem !important;
                    justify-content: center !important;
                }
            }
            
            @media (max-width: 480px) {
                .logo-responsive {
                    max-height: 30px !important;
                    max-width: 70px !important;
                }
            }
            
            /* Estilos personalizados para badges principales */
            .badge-custom-large {
                font-size: 1rem !important;
                font-weight: 600 !important;
                padding: 12px 20px !important;
            }
            
            .badge-custom-xl {
                font-size: 1.2rem !important;
                font-weight: 600 !important;
                padding: 14px 24px !important;
            }

            /* Estilos para el botón diagnóstico */
            .btn-diagnostic {
                border-radius: 14px;
                padding: 0.85rem 1.2rem;
                font-weight: 700;
                color: #ffffff;
                background: linear-gradient(90deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
                border: 1px solid rgba(255,255,255,0.18);
                box-shadow: 0 10px 30px rgba(0,0,0,0.22);
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
            }

            .btn-diagnostic i {
                font-size: 1.05rem;
                opacity: 0.98;
            }

            .btn-diagnostic:hover, .btn-diagnostic:focus {
                transform: translateY(-4px);
                background: rgba(255,255,255,0.20);
                text-decoration: none;
                box-shadow: 0 14px 40px rgba(0,0,0,0.28);
            }

            @media (max-width: 576px) {
                .btn-diagnostic {
                    width: 100%;
                    justify-content: center;
                }
            }
        </style>
        
        @if(session('success'))
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 6000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#28a745",
                    stopOnFocus: true,
                    className: "toast-info-fixed",
                    offset: {
                        x: 20,
                        y: 20
                    }
                }).showToast();
            </script>
        @endif

        @if(session('error'))
            <script>
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 4000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#dc3545",
                    stopOnFocus: true,
                    className: "toast-error"
                }).showToast();
            </script>
        @endif
    </body>
</html>
