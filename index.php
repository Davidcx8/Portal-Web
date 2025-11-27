<?php
/**
 * Página de inicio - Portal de Librería Online
 */
require_once 'includes/header.php';
?>

<div class="container">
    <!-- Hero Section -->
    <div class="page-title">
        <h1><i class="bi bi-book-half me-3"></i>Bienvenido a Librería Online</h1>
        <p class="lead">Explora nuestra colección de libros y conoce a nuestros autores destacados</p>
    </div>
    
    <!-- Info Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-book-fill display-1 text-primary"></i>
                    </div>
                    <h3 class="card-title">Catálogo de Libros</h3>
                    <p class="card-text">Descubre nuestra amplia selección de libros de diferentes géneros y categorías.</p>
                    <a href="libros.php" class="btn btn-primary">
                        Ver Libros <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-people-fill display-1 text-success"></i>
                    </div>
                    <h3 class="card-title">Nuestros Autores</h3>
                    <p class="card-text">Conoce a los talentosos escritores que hacen posible nuestra colección.</p>
                    <a href="autores.php" class="btn btn-success">
                        Ver Autores <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-envelope-fill display-1 text-info"></i>
                    </div>
                    <h3 class="card-title">Contáctanos</h3>
                    <p class="card-text">¿Tienes preguntas o sugerencias? Estamos aquí para ayudarte.</p>
                    <a href="contacto.php" class="btn btn-info text-white">
                        Contactar <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Features -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><i class="bi bi-star-fill me-2"></i>¿Por qué elegirnos?</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <i class="bi bi-check-circle-fill text-success display-4"></i>
                            <h5 class="mt-2">Calidad Garantizada</h5>
                            <p class="text-muted">Libros cuidadosamente seleccionados</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <i class="bi bi-lightning-charge-fill text-warning display-4"></i>
                            <h5 class="mt-2">Acceso Rápido</h5>
                            <p class="text-muted">Consulta nuestro catálogo en segundos</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <i class="bi bi-search text-primary display-4"></i>
                            <h5 class="mt-2">Búsqueda Fácil</h5>
                            <p class="text-muted">Encuentra lo que buscas rápidamente</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <i class="bi bi-headset text-info display-4"></i>
                            <h5 class="mt-2">Soporte 24/7</h5>
                            <p class="text-muted">Estamos aquí para ayudarte</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
