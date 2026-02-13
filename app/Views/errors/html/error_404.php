<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página No Encontrada - OdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            font-family: 'Segoe UI', 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 2rem;
        }
        
        .error-icon {
            font-size: 5rem;
            color: var(--danger-color);
            margin-bottom: 1.5rem;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }
        
        .error-code {
            font-size: 6rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        
        .error-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .error-message {
            color: #6c757d;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        
        .error-details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 2rem;
            font-family: monospace;
            font-size: 0.9rem;
            color: #495057;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0b5ed7 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(13, 110, 253, 0.4);
        }
        
        .footer-text {
            margin-top: 2rem;
            color: #adb5bd;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <i class="bi bi-exclamation-triangle-fill error-icon"></i>
        <div class="error-code">404</div>
        <h1 class="error-title">Página No Encontrada</h1>
        
        <p class="error-message">
            La página que estás buscando no existe o ha sido movida.
        </p>
        
        <?php if (ENVIRONMENT !== 'production') : ?>
            <div class="error-details">
                <i class="bi bi-info-circle me-2"></i>
                <?= nl2br(esc($message)) ?>
            </div>
        <?php else : ?>
            <p class="text-muted small mb-4">
                La página que intentas acceder no está disponible en este momento.
            </p>
        <?php endif; ?>
        
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?= base_url('Inicio') ?>" class="btn btn-primary-custom text-white">
                <i class="bi bi-house-door me-2"></i>Volver al Inicio
            </a>
            <a href="javascript:history.back()" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Volver Atrás
            </a>
        </div>
        
        <p class="footer-text">
            <i class="bi bi-heart-pulse me-1"></i>Sistema Odontológico OdontoMandy
        </p>
    </div>
</body>
</html>
