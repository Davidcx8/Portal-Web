# Instrucciones de Despliegue

## Despliegue en InfinityFree

### 1. Crear Cuenta
1. Visitar https://www.infinityfree.com
2. Registrarse y verificar email
3. Crear nuevo sitio web
4. Elegir subdominio

### 2. Base de Datos
1. En panel de control, ir a "MySQL Databases"
2. Crear nueva base de datos: `libreria`
3. Anotar credenciales:
   - Database Name
   - MySQL Host
   - MySQL User
   - MySQL Password

### 3. Importar Datos
1. Abrir phpMyAdmin
2. Seleccionar base de datos creada
3. Importar `Base Datos Libreria.sql`
4. Importar `create_contacto.sql`

### 4. Subir Archivos
**Opción A - File Manager:**
1. En panel, abrir "File Manager"
2. Navegar a `/htdocs`
3. Subir todos los archivos del proyecto

**Opción B - FTP:**
1. Usar FileZilla
2. Conectar con credenciales FTP
3. Copiar archivos a `/htdocs`

### 5. Configurar Conexión
Editar `config/db.php`:
```php
define('DB_HOST', 'sql200.infinityfree.com'); // Tu MySQL Host
define('DB_NAME', 'epiz_xxxxx_libreria');     // Tu Database Name
define('DB_USER', 'epiz_xxxxx');              // Tu MySQL User
define('DB_PASS', 'tu_contraseña');           // Tu Password
```

### 6. Verificar
- Abrir: `http://tudominio.infinityfreeapp.com/inspect_db.php`
- Debe mostrar "Conexión exitosa"
- Probar todas las páginas
- Verificar formulario de contacto

## Despliegue en CodeSandbox

### 1. Crear Proyecto
1. Ir a https://codesandbox.io
2. Crear nuevo Sandbox (template PHP)

### 2. Subir Archivos
1. Arrastrar todos los archivos al panel izquierdo
2. Esperar carga completa

### 3. Compartir
1. Click en "Share"
2. Seleccionar "Anyone with the link can view"
3. Copiar enlace

## Solución de Problemas

### Error de Conexión
- Verificar credenciales en `config/db.php`
- Confirmar que base de datos existe
- Revisar que MySQL Host no sea "localhost"

### No se Muestran Datos
- Verificar importación de archivos SQL
- Revisar en phpMyAdmin que tablas tengan datos
- Consultar `inspect_db.php` para ver errores

### Formulario no Guarda
- Confirmar que tabla `contacto` existe
- Verificar permisos de tabla
- Revisar logs de error en panel de hosting

## Notas Importantes

- InfinityFree: El host NO es "localhost", usar el proporcionado
- CodeSandbox: Base de datos no funcionará (solo para revisión de código)
- Credenciales: Guardar en lugar seguro todos los datos de acceso
