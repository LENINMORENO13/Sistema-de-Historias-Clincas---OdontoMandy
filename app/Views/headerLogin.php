<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Acceso - OdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d6efd;
            --primary-dark: #0a58ca;
            --light-blue: #e3f2fd;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(13, 110, 253, 0.8), rgba(13, 110, 253, 0.6)),
                url('https://images.unsplash.com/photo-1629909613654-28e377c37b09?q=80&w=2068&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 20px;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 2%, transparent 2%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 2%, transparent 2%),
                radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.1) 2%, transparent 2%);
            background-size: 300px 300px;
            z-index: 0;
        }

        .login-container {
            width: 100%;
            max-width: 500px;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            width: 100%;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .login-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), #0dcaf0);
            z-index: 2;
        }

        .logo-container {
            margin: 0 auto 1.2rem auto;
            text-align: center;
            position: relative;
        }

        .logo-wrapper {
            display: inline-block;
            position: relative;
            margin-bottom: 0.8rem;
        }

        .logo-background {
            width: 85px; /* Aumentado ligeramente para la imagen */
            height: 85px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 6px 15px rgba(13, 110, 253, 0.15);
            border: 2px solid rgba(13, 110, 253, 0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .logo-background:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.25);
        }

        .logo-img {
            width: 60%; /* Ajuste para que la imagen dental se vea bien */
            height: 60%;
            object-fit: contain;
        }

        .form-control {
            border: 1px solid #dee2e6;
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            width: 100%;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
            border-color: var(--primary-color);
            background-color: white;
        }

        .input-with-icon {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 2;
        }

        .input-with-icon .form-control {
            padding-left: 45px;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 2;
            padding: 5px;
        }

        .toggle-password:hover {
            color: var(--primary-color);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), #0a58ca);
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            width: 100%;
            margin-top: 0.5rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #0a58ca, var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .logo-background {
            animation: pulse 3s ease-in-out infinite;
        }

        .alert-custom {
            border-radius: 10px;
            border: none;
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid #dc3545;
            padding: 0.8rem 1rem;
            margin-bottom: 1.5rem;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        a.text-primary:hover {
            color: var(--primary-dark) !important;
            text-decoration: underline !important;
        }

        .system-version {
            position: fixed;
            bottom: 10px;
            right: 15px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.75rem;
            z-index: 1;
        }

        .security-footer {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #dee2e6;
        }

        .login-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 450px;
        }

        .login-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container { max-width: 90%; min-height: 500px; }
            .login-card { padding: 2rem 1.5rem; }
            .logo-background { width: 75px; height: 75px; }
            body { padding: 15px; }
        }

        @media (max-width: 576px) {
            .login-container { max-width: 95%; min-height: 480px; }
            .login-card { padding: 1.5rem; }
            .system-version { display: none; }
        }
    </style>
</head>

<body>


    <div class="login-container">
        <div class="login-card">
            <div class="login-content">
                <div class="login-header">
                    <div class="logo-container">
                        <div class="logo-wrapper">
                            <div class="logo-background">
                                <img src="https://cdn-icons-png.flaticon.com/512/3004/3004458.png"
                                     class="logo-img"
                                     alt="Logo Dental"
                                     onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-tooth-fill\' style=\'font-size: 2rem; color: #0d6efd;\'></i>'">
                            </div>
                        </div>
                        <h3 class="fw-bold text-dark mb-1" style="font-size: 1.5rem;">Dental Manager</h3>
                        <div class="welcome-message">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                <i class="bi bi-shield-check me-1"></i>Acceso seguro
                            </span>
                        </div>
                    </div>
                </div>

                <div class="login-body">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-custom d-flex align-items-center p-2 mb-3" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-6 text-danger"></i>
                            <div class="small"><?= session()->getFlashdata('error'); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success d-flex align-items-center p-2 mb-3" role="alert">
                            <i class="bi bi-check-circle-fill me-2 fs-6"></i>
                            <div class="small"><?= session()->getFlashdata('success'); ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/verificacionlogin') ?>" method="post" class="needs-validation" novalidate>
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="correo" class="form-label small fw-bold text-secondary mb-2">
                                <i class="bi bi-envelope me-1"></i>CORREO ELECTRÓNICO
                            </label>
                            <div class="input-with-icon">
                                <i class="bi bi-person"></i>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="ejemplo@consultorio.com" required
                                    autocomplete="username">
                            </div>
                            <div class="invalid-feedback small">Correo inválido.</div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="contrasena" class="form-label small fw-bold text-secondary">
                                    <i class="bi bi-key me-1"></i>CONTRASEÑA
                                </label>
                                <!-- <a href="#" class="small text-primary text-decoration-none fw-semibold"
                                   data-bs-toggle="modal" data-bs-target="#passwordModal">
                                    ¿Olvidaste tu contraseña?
                                </a> -->
                            </div>

                            <div class="password-container">
                                <input type="password" class="form-control" id="contrasena" name="contrasena"
                                    placeholder="••••••••" required
                                    autocomplete="current-password">
                                <button type="button" class="toggle-password" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback small">Contraseña requerida.</div>
                        </div>

                        <!-- <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                            <label class="form-check-label small text-muted" for="rememberMe">
                                <i class="bi bi-check2-circle me-1"></i>Recordar credenciales
                            </label>
                        </div> -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                INGRESAR AL SISTEMA
                                <span class="spinner-border spinner-border-sm ms-2 d-none" id="loadingSpinner"></span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="login-footer">
                    <div class="text-center mt-4 pt-3 border-top">
                        <span class="text-muted small">¿No tienes acceso?</span>
                        <a href="<?= base_url('admin/registrar') ?>"
                           class="text-primary small fw-bold text-decoration-none ms-1">
                            Solicitar credenciales
                        </a>
                    </div>

                    <div class="security-footer">
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">
                                    <i class="bi bi-shield-check text-success me-1"></i>
                                    Sistema seguro
                                </small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">
                                    <i class="bi bi-heart-pulse text-danger me-1"></i>
                                    Salud dental
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fs-6">
                        <i class="bi bi-key me-2"></i>Recuperar Contraseña
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body py-3">
                    <p class="small text-muted mb-2">Ingresa tu correo registrado.</p>
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-sm" placeholder="ejemplo@consultorio.com">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-sm btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Password
            const toggleBtn = document.getElementById('togglePassword');
            const pwdInput = document.getElementById('contrasena');
            if (toggleBtn && pwdInput) {
                toggleBtn.addEventListener('click', function() {
                    const type = pwdInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    pwdInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye');
                    this.querySelector('i').classList.toggle('bi-eye-slash');
                });
            }

            // Validación y Loading
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        const btn = form.querySelector('.btn-login');
                        const spinner = document.getElementById('loadingSpinner');
                        if (btn && spinner) {
                            btn.disabled = true;
                            spinner.classList.remove('d-none');
                        }
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            const emailInput = document.getElementById('correo');
            if(emailInput) setTimeout(() => emailInput.focus(), 300);
        });
    </script>
</body>
</html>