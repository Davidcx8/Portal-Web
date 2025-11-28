# Portal Web - Librería Online

Sistema de gestión para librería online con catálogo de libros, autores y formulario de contacto.

## Características

- Catálogo completo de libros con búsqueda en tiempo real
- Listado de autores con información de contacto
- Formulario de contacto funcional
- Diseño responsive con Bootstrap 5
- Validación de formularios (cliente y servidor)
- Uso de PDO para consultas seguras a base de datos

## Tecnologías

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5.3
- **Backend:** PHP 7.4+
- **Base de Datos:** MySQL 5.7+
- **Librerías:** Bootstrap Icons, Google Fonts (Inter)

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx) o XAMPP para desarrollo local

## Instalación

### 1. Base de Datos

Crear base de datos:
```sql
CREATE DATABASE libreria CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

Importar archivos SQL:
```bash
mysql -u root -p libreria < "Base Datos Libreria.sql"
mysql -u root -p libreria < "create_contacto.sql"
```

### 2. Configuración

Editar `config/db.php` con las credenciales de tu base de datos:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'libreria');
define('DB_USER', 'tu_usuario');
define('DB_PASS', 'tu_contraseña');
```

### 3. Despliegue

#### Desarrollo Local (XAMPP)
1. Copiar proyecto a `C:\xampp\htdocs\Portar-Web`
2. Iniciar Apache y MySQL
3. Acceder a `http://localhost/Portar-Web`

#### Producción (Hosting)
1. Subir archivos vía FTP
2. Importar base de datos en phpMyAdmin
3. Actualizar credenciales en `config/db.php`

## Estructura del Proyecto

```
Portar-Web/
├── assets/
│   ├── css/style.css
│   └── js/script.js
├── config/
│   └── db.php
├── includes/
│   ├── header.php
│   └── footer.php
├── index.php
├── libros.php
├── autores.php
├── contacto.php
├── inspect_db.php
├── Base Datos Libreria.sql
├── create_contacto.sql
└── README.md
```

## Páginas

- **index.php:** Página de inicio con navegación
- **libros.php:** Catálogo de libros con búsqueda y estadísticas
- **autores.php:** Listado de autores con datos de contacto
- **contacto.php:** Formulario de contacto
- **inspect_db.php:** Herramienta de verificación de conexión

## Base de Datos

### Tablas Principales
- `autores`: Información de autores
- `titulos`: Catálogo de libros
- `titulo_autor`: Relación entre libros y autores
- `contacto`: Mensajes del formulario de contacto

## Seguridad

- PDO con prepared statements (previene SQL Injection)
- Validación de datos en cliente y servidor
- Sanitización con `htmlspecialchars()` (previene XSS)
- Validación de emails con `filter_var()`

## Funcionalidades

### Catálogo de Libros
- Listado completo con información de autores
- Búsqueda en tiempo real
- Estadísticas (total, categorías, precio promedio)

### Listado de Autores
- Información completa de cada autor
- Conteo de libros por autor
- Datos de ubicación y contacto

### Formulario de Contacto
- Validación en tiempo real
- Almacenamiento en base de datos
- Feedback visual de éxito/error

## Licencia

Proyecto académico - ITLA

## Créditos

Desarrollado para el curso de Programación Web
