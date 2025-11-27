<?php
/**
 * Página de Contacto
 * Muestra formulario y procesa el envío usando PDO
 */
require_once 'config/db.php';
require_once 'includes/header.php';

$mensaje = '';
$tipoMensaje = '';

// Procesar envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $asunto = trim($_POST['asunto'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');
    
    // Validación básica del lado del servidor
    $errores = [];
    
    if (empty($nombre) || strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres";
    }
    
    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Por favor ingrese un correo electrónico válido";
    }
    
    if (empty($asunto) || strlen($asunto) < 5) {
        $errores[] = "El asunto debe tener al menos 5 caracteres";
    }
    
    if (empty($comentario) || strlen($comentario) < 10) {
        $errores[] = "El comentario debe tener al menos 10 caracteres";
    }
    
    if (empty($errores)) {
        try {
            // Insertar en la base de datos usando PDO
            $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario, fecha) 
                    VALUES (:nombre, :correo, :asunto, :comentario, NOW())";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':correo' => $correo,
                ':asunto' => $asunto,
                ':comentario' => $comentario
            ]);
            
            $mensaje = "¡Gracias por contactarnos! Tu mensaje ha sido enviado exitosamente. Te responderemos pronto.";
            $tipoMensaje = "success";
            
            // Limpiar variables
            $nombre = $correo = $asunto = $comentario = '';
            
        } catch (PDOException $e) {
            $mensaje = "Error al enviar el mensaje: " . $e->getMessage();
            $tipoMensaje = "danger";
        }
    } else {
        $mensaje = implode("<br>", $errores);
        $tipoMensaje = "danger";
    }
}
?>

<div class="container">
    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-envelope me-3"></i>Contáctanos</h1>
        <p class="lead">¿Tienes alguna pregunta o sugerencia? Estamos aquí para ayudarte</p>
    </div>
    
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-<?php echo $tipoMensaje; ?> alert-dismissible fade show" role="alert">
            <i class="bi bi-<?php echo $tipoMensaje === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill'; ?> me-2"></i>
            <?php echo $mensaje; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Formulario de Contacto</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="contacto.php" id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">
                                    <i class="bi bi-person-fill me-1"></i>Nombre Completo *
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nombre" 
                                       name="nombre" 
                                       value="<?php echo htmlspecialchars($nombre ?? ''); ?>"
                                       placeholder="Ej: Juan Pérez"
                                       required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="correo" class="form-label">
                                    <i class="bi bi-envelope-fill me-1"></i>Correo Electrónico *
                                </label>
                                <input type="email" 
                                       class="form-control" 
                                       id="correo" 
                                       name="correo" 
                                       value="<?php echo htmlspecialchars($correo ?? ''); ?>"
                                       placeholder="Ej: juan@ejemplo.com"
                                       required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="asunto" class="form-label">
                                <i class="bi bi-tag-fill me-1"></i>Asunto *
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="asunto" 
                                   name="asunto" 
                                   value="<?php echo htmlspecialchars($asunto ?? ''); ?>"
                                   placeholder="Ej: Consulta sobre disponibilidad de libros"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="comentario" class="form-label">
                                <i class="bi bi-chat-dots-fill me-1"></i>Comentario *
                            </label>
                            <textarea class="form-control" 
                                      id="comentario" 
                                      name="comentario" 
                                      rows="6" 
                                      placeholder="Escribe tu mensaje aquí..."
                                      required><?php echo htmlspecialchars($comentario ?? ''); ?></textarea>
                            <small class="text-muted">Mínimo 10 caracteres</small>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-send-fill me-2"></i>Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Información de Contacto</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6><i class="bi bi-geo-alt-fill text-danger me-2"></i>Dirección</h6>
                        <p class="text-muted mb-0">Calle Principal #123<br>Ciudad, País</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6><i class="bi bi-telephone-fill text-success me-2"></i>Teléfono</h6>
                        <p class="text-muted mb-0">(123) 456-7890</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6><i class="bi bi-envelope-fill text-primary me-2"></i>Email</h6>
                        <p class="text-muted mb-0">info@libreria.com</p>
                    </div>
                    <hr>
                    <div>
                        <h6><i class="bi bi-clock-fill text-warning me-2"></i>Horario</h6>
                        <p class="text-muted mb-0">
                            Lunes - Viernes: 9:00 AM - 6:00 PM<br>
                            Sábado: 10:00 AM - 2:00 PM<br>
                            Domingo: Cerrado
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-question-circle-fill me-2"></i>¿Necesitas Ayuda?</h5>
                </div>
                <div class="card-body">
                    <p>Nuestro equipo de soporte está disponible para ayudarte con:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Consultas sobre libros</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Información de autores</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Sugerencias</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Reportar problemas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
