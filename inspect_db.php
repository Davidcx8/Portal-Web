<?php
/**
 * Script de inspección de base de datos
 * Este archivo ayuda a verificar la estructura de la base de datos
 */

require_once 'config/db.php';

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Inspección de Base de Datos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        h2 { color: #666; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background: #4CAF50; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>📊 Inspección de Base de Datos - Librería</h1>";

try {
    // Listar todas las tablas
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<p class='success'>✓ Conexión exitosa a la base de datos</p>";
    echo "<h2>Tablas encontradas: " . count($tables) . "</h2>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li><strong>$table</strong></li>";
    }
    echo "</ul>";
    
    // Mostrar estructura de cada tabla
    foreach ($tables as $table) {
        echo "<h2>Estructura de: $table</h2>";
        echo "<table>";
        echo "<tr><th>Campo</th><th>Tipo</th><th>Nulo</th><th>Clave</th><th>Default</th><th>Extra</th></tr>";
        
        $stmt = $pdo->query("DESCRIBE `$table`");
        $columns = $stmt->fetchAll();
        
        foreach ($columns as $col) {
            echo "<tr>";
            echo "<td>" . $col['Field'] . "</td>";
            echo "<td>" . $col['Type'] . "</td>";
            echo "<td>" . $col['Null'] . "</td>";
            echo "<td>" . $col['Key'] . "</td>";
            echo "<td>" . ($col['Default'] ?? 'NULL') . "</td>";
            echo "<td>" . $col['Extra'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        
        // Contar registros
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM `$table`");
        $count = $stmt->fetch()['total'];
        echo "<p>Total de registros: <strong>$count</strong></p>";
    }
    
} catch (PDOException $e) {
    echo "<p class='error'>✗ Error: " . $e->getMessage() . "</p>";
}

echo "    </div>
</body>
</html>";
?>
