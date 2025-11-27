<?php
/**
 * Página de Autores - Muestra el listado completo de autores
 * Utiliza PDO para consultar la base de datos
 */
require_once 'config/db.php';
require_once 'includes/header.php';

// Consultar autores con conteo de libros
try {
    $sql = "SELECT 
                a.id_autor,
                a.apellido,
                a.nombre,
                a.telefono,
                a.direccion,
                a.ciudad,
                a.estado,
                a.pais,
                a.codigo_postal,
                COUNT(DISTINCT ta.id_titulo) as total_libros
            FROM autores a
            LEFT JOIN titulo_autor ta ON a.id_autor = ta.id_autor
            GROUP BY a.id_autor
            ORDER BY a.apellido ASC, a.nombre ASC";
    
    $stmt = $pdo->query($sql);
    $autores = $stmt->fetchAll();
    $totalAutores = count($autores);
    
} catch (PDOException $e) {
    $error = "Error al consultar los autores: " . $e->getMessage();
    $autores = [];
    $totalAutores = 0;
}
?>

<div class="container">
    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-people me-3"></i>Nuestros Autores</h1>
        <p class="lead">Conoce a los <?php echo $totalAutores; ?> autores destacados de nuestra colección</p>
    </div>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($totalAutores > 0): ?>
        <!-- Search Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" 
                           class="form-control" 
                           id="searchInput" 
                           placeholder="Buscar por nombre, ciudad, país..."
                           onkeyup="filterTable('searchInput', 'autoresTable')">
                </div>
            </div>
        </div>
        
        <!-- Authors Table -->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Listado Completo
                    <span class="badge bg-light text-dark float-end"><?php echo $totalAutores; ?> autores</span>
                </h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="autoresTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Contacto</th>
                                <th>Ubicación</th>
                                <th>Libros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($autores as $autor): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-success"><?php echo htmlspecialchars($autor['id_autor']); ?></span>
                                </td>
                                <td>
                                    <div>
                                        <strong class="d-block">
                                            <i class="bi bi-person-fill me-1"></i>
                                            <?php echo htmlspecialchars($autor['apellido'] . ', ' . $autor['nombre']); ?>
                                        </strong>
                                        <?php if ($autor['direccion']): ?>
                                            <small class="text-muted">
                                                <i class="bi bi-geo-alt-fill me-1"></i>
                                                <?php echo htmlspecialchars($autor['direccion']); ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($autor['telefono']): ?>
                                        <i class="bi bi-telephone-fill text-primary me-1"></i>
                                        <a href="tel:<?php echo htmlspecialchars($autor['telefono']); ?>">
                                            <?php echo htmlspecialchars($autor['telefono']); ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">No disponible</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($autor['ciudad'] || $autor['estado'] || $autor['pais']): ?>
                                        <div>
                                            <?php if ($autor['ciudad']): ?>
                                                <span class="badge bg-info">
                                                    <?php echo htmlspecialchars($autor['ciudad']); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if ($autor['estado']): ?>
                                                <span class="badge bg-secondary">
                                                    <?php echo htmlspecialchars($autor['estado']); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if ($autor['pais']): ?>
                                                <div class="mt-1">
                                                    <i class="bi bi-flag-fill me-1"></i>
                                                    <small><?php echo htmlspecialchars($autor['pais']); ?></small>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if ($autor['codigo_postal']): ?>
                                                <div class="mt-1">
                                                    <small class="text-muted">CP: <?php echo htmlspecialchars($autor['codigo_postal']); ?></small>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted">No disponible</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($autor['total_libros'] > 0): ?>
                                        <span class="badge bg-primary rounded-pill">
                                            <i class="bi bi-book-fill me-1"></i>
                                            <?php echo $autor['total_libros']; ?> 
                                            <?php echo $autor['total_libros'] == 1 ? 'libro' : 'libros'; ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary rounded-pill">Sin libros</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-4 text-success"></i>
                        <h3 class="mt-2"><?php echo $totalAutores; ?></h3>
                        <p class="text-muted">Total de Autores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-book-fill display-4 text-primary"></i>
                        <h3 class="mt-2">
                            <?php 
                            $totalLibrosAutores = array_sum(array_column($autores, 'total_libros'));
                            echo $totalLibrosAutores; 
                            ?>
                        </h3>
                        <p class="text-muted">Libros Totales</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-bar-chart-fill display-4 text-warning"></i>
                        <h3 class="mt-2">
                            <?php 
                            $promedioLibros = $totalAutores > 0 ? round($totalLibrosAutores / $totalAutores, 1) : 0;
                            echo $promedioLibros; 
                            ?>
                        </h3>
                        <p class="text-muted">Promedio por Autor</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-globe display-4 text-info"></i>
                        <h3 class="mt-2">
                            <?php 
                            $paises = array_unique(array_filter(array_column($autores, 'pais')));
                            echo count($paises); 
                            ?>
                        </h3>
                        <p class="text-muted">Países Representados</p>
                    </div>
                </div>
            </div>
        </div>
        
    <?php else: ?>
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h3>No hay autores disponibles</h3>
            <p>Por favor, importa la base de datos primero.</p>
        </div>
    <?php endif; ?>
</div>

<script>
// Implementar búsqueda en la tabla
function filterTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);
    const filter = input.value.toLowerCase();
    const rows = table.getElementsByTagName('tr');
    
    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName('td');
        let found = false;
        
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                found = true;
                break;
            }
        }
        
        row.style.display = found ? '' : 'none';
    }
}
</script>

<?php require_once 'includes/footer.php'; ?>
