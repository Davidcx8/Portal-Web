<?php
/**
 * Configuración de conexión a base de datos usando PDO
 * 
 * INSTRUCCIONES:
 * - Ajuste las constantes según su configuración local
 * - Por defecto usa localhost, root sin contraseña (típico de XAMPP)
 */

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'libreria');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Función para obtener la conexión PDO
 * @return PDO|null
 */
function getConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // En producción, registrar el error sin mostrarlo
        error_log("Error de conexión: " . $e->getMessage());
        die("Error al conectar con la base de datos. Por favor contacte al administrador.");
    }
}

// Crear la conexión global
$pdo = getConnection();
?>
