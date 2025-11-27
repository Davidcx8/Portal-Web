# Portal Web - Librería Online 📚

Portal web para consultar libros y autores disponibles en una librería online, desarrollado con PHP, MySQL, HTML, CSS y JavaScript.

## 🎯 Características

- ✅ Catálogo completo de libros con información detallada
- ✅ Listado de autores con su información de contacto
- ✅ Formulario de contacto funcional
- ✅ Diseño responsive con Bootstrap 5
- ✅ Búsqueda en tiempo real en tablas
- ✅ Validación de formularios (cliente y servidor)
- ✅ Uso de PDO para todas las consultas a la base de datos
- ✅ Interfaz moderna con gradientes y animaciones

## 📋 Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx) o XAMPP/WAMP para desarrollo local

## 🚀 Instalación

### 1. Clonar o descargar el proyecto

```bash
git clone <tu-repositorio>
cd Portar-Web
```

### 2. Configurar la base de datos

1. Crear una base de datos llamada `libreria`:
```sql
CREATE DATABASE libreria CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

2. Importar el archivo de base de datos:
```bash
mysql -u root -p libreria < "Base Datos Libreria.sql"
```

3. Importar la tabla de contacto:
```bash
mysql -u root -p libreria < create_contacto.sql
```

### 3. Configurar la conexión a la base de datos

Editar el archivo `config/db.php` con tus credenciales:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'libreria');
define('DB_USER', 'root');        // Tu usuario de MySQL
define('DB_PASS', '');            // Tu contraseña de MySQL
```

### 4. Configurar el servidor web

#### Opción A: XAMPP/WAMP
1. Copiar el proyecto a la carpeta `htdocs` (XAMPP) o `www` (WAMP)
2. Iniciar Apache y MySQL
3. Acceder a `http://localhost/Portar-Web`

#### Opción B: Servidor PHP integrado
```bash
cd Portar-Web
php -S localhost:8000
```
Acceder a `http://localhost:8000`

### 5. Verificar la instalación

Acceder a `http://localhost/Portar-Web/inspect_db.php` para verificar que la base de datos está correctamente configurada.

## 📂 Estructura del Proyecto

```
Portar-Web/
├── assets/
│   ├── css/
│   │   └── style.css          # Estilos personalizados
│   └── js/
│       └── script.js          # JavaScript para validación y UX
├── config/
│   └── db.php                 # Configuración PDO
├── includes/
│   ├── header.php             # Encabezado y navbar
│   └── footer.php             # Pie de página
├── index.php                  # Página de inicio
├── libros.php                 # Listado de libros
├── autores.php                # Listado de autores
├── contacto.php               # Formulario de contacto
├── inspect_db.php             # Herramienta de inspección de BD
├── Base Datos Libreria.sql    # Base de datos inicial
├── create_contacto.sql        # Tabla de contacto
└── README.md                  # Este archivo
```

## 🔧 Uso

### Página de Inicio
- Vista general del portal
- Acceso rápido a todas las secciones

### Catálogo de Libros (`libros.php`)
- Muestra todos los libros disponibles
- Información de autor, precio, tipo, ventas
- Búsqueda en tiempo real
- Estadísticas del catálogo

### Autores (`autores.php`)
- Lista completa de autores
- Información de contacto y ubicación
- Cantidad de libros por autor
- Búsqueda y filtrado

### Contacto (`contacto.php`)
- Formulario de contacto validado
- Los mensajes se guardan en la base de datos
- Validación cliente y servidor
- Información de contacto de la librería

## 🛠️ Tecnologías Utilizadas

- **Frontend:**
  - HTML5
  - CSS3 (con Custom Properties)
  - JavaScript (Vanilla)
  - Bootstrap 5.3
  - Bootstrap Icons

- **Backend:**
  - PHP 7.4+
  - PDO (PHP Data Objects)

- **Base de Datos:**
  - MySQL 5.7+

## 📊 Base de Datos

### Tablas principales:
- `autores`: Información de autores
- `titulos`: Catálogo de libros
- `titulo_autor`: Relación libros-autores
- `contacto`: Mensajes de contacto

## 🎨 Características de Diseño

- Diseño responsive (mobile-first)
- Gradientes modernos y atractivos
- Animaciones suaves
- Tarjetas con efecto hover
- Navegación intuitiva
- Modo oscuro en navbar y footer

## 🔒 Seguridad

- Uso de PDO con prepared statements
- Validación de datos en cliente y servidor
- Escapado de HTML con `htmlspecialchars()`
- Filtrado de correos electrónicos
- Manejo de errores sin exponer información sensible

## 📝 Licencia

Este proyecto fue desarrollado como proyecto final para el curso de Programación Web.

## 👤 Autor

Desarrollado para el curso de Programación Web - ITLA

## 🤝 Contribuir

Este es un proyecto académico. Si encuentras algún bug o tienes sugerencias, no dudes en utilizar el formulario de contacto.

---

**Nota:** Recuerda cambiar las credenciales de la base de datos en `config/db.php` antes de publicar en producción.
