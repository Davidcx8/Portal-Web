<?php
/**
 * Página de Libros - Muestra el listado completo de libros
 * Utiliza PDO para consultar la base de datos
 */
require_once 'config/db.php';
require_once 'includes/header.php';

// Consultar libros con información de autores usando JOIN
try {
    $sql = "SELECT 
                t.id_titulo,
                t.titulo,
                t.tipo,
                t.id_pub,
                t.precio,
                t.avance,
                t.total_ventas,
                t.notas,
                t.fecha_pub,
                CONCAT(a.nombre, ' ', a.apellido) as nombre_autor,
                a.id_autor
            FROM titulos t
            LEFT JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo
            LEFT JOIN autores a ON ta.id_autor = a.id_autor
            ORDER BY t.titulo ASC";
    
    $stmt = $pdo->query($sql);
    $libros = $stmt->fetchAll();
    $totalLibros = count($libros);
    
} catch (PDOException $e) {
    $error = "Error al consultar los libros: " . $e->getMessage();
    $libros = [];
    $totalLibros = 0;
}
?>

<div class="container">
    <!-- Page Title -->
    <div class="page-title">
        <h1><i class="bi bi-book me-3"></i>Catálogo de Libros</h1>
        <p class="lead">Explora nuestra colección de <?php echo $totalLibros; ?> libros disponibles</p>
    </div>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($totalLibros > 0): ?>
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
                           placeholder="Buscar por título, autor, tipo..."
                           onkeyup="filterTable('searchInput', 'librosTable')">
                </div>
            </div>
        </div>
        
        <!-- Books Table -->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>
                    Listado Completo
                    <span class="badge bg-light text-dark float-end"><?php echo $totalLibros; ?> libros</span>
                </h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="librosTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Ventas</th>
                                <th>Publicación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($libros as $libro): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-primary"><?php echo htmlspecialchars($libro['id_titulo']); ?></span>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($libro['titulo']); ?></strong>
                                    <?php if ($libro['notas']): ?>
                                        <br><small class="text-muted"><?php echo htmlspecialchars(substr($libro['notas'], 0, 50)) . '...'; ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($libro['nombre_autor']): ?>
                                        <i class="bi bi-person-fill me-1"></i>
                                        <?php echo htmlspecialchars($libro['nombre_autor']); ?>
                                    <?php else: ?>
                                        <span class="text-muted">No disponible</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    $badgeClass = 'bg-secondary';
                                    if ($libro['tipo'] == 'business') $badgeClass = 'bg-info';
                                    elseif ($libro['tipo'] == 'psychology') $badgeClass = 'bg-warning';
                                    elseif ($libro['tipo'] == 'trad_cook') $badgeClass = 'bg-success';
                                    ?>
                                    <span class="badge <?php echo $badgeClass; ?>">
                                        <?php echo htmlspecialchars($libro['tipo'] ?? 'N/A'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($libro['precio']): ?>
                                        <strong class="text-success">$<?php echo number_format($libro['precio'], 2); ?></strong>
                                    <?php else: ?>
                                        <span class="text-muted">N/A</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($libro['total_ventas']): ?>
                                        <i class="bi bi-graph-up text-success me-1"></i>
                                        <?php echo number_format($libro['total_ventas']); ?>
                                    <?php else: ?>
                                        <span class="text-muted">0</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($libro['fecha_pub']): ?>
                                        <small><?php echo date('Y-m-d', strtotime($libro['fecha_pub'])); ?></small>
                                    <?php else: ?>
                                        <span class="text-muted">N/A</span>
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
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-book-fill display-4 text-primary"></i>
                        <h3 class="mt-2"><?php echo $totalLibros; ?></h3>
                        <p class="text-muted">Total de Libros</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-tag-fill display-4 text-success"></i>
                        <h3 class="mt-2">
                            <?php 
                            $tipos = array_unique(array_column($libros, 'tipo'));
                            echo count($tipos); 
                            ?>
                        </h3>
                        <p class="text-muted">Tipos/Categorías</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-currency-dollar display-4 text-warning"></i>
                        <h3 class="mt-2">
                            $<?php 
                            $precioPromedio = array_sum(array_filter(array_column($libros, 'precio'))) / max(1, count(array_filter(array_column($libros, 'precio'))));
                            echo number_format($precioPromedio, 2); 
                            ?>
                        </h3>
                        <p class="text-muted">Precio Promedio</p>
                    </div>
                </div>
            </div>
        </div>
        
    <?php else: ?>
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h3>No hay libros disponibles</h3>
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
