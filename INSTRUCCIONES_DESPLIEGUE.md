# 🚀 INSTRUCCIONES DE DESPLIEGUE

## 📌 CONTEXTO

Este proyecto está **100% completo y funcional**. Tu trabajo es desplegarlo en:
1. **InfinityFree** (hosting gratuito - sitio público funcional)
2. **CodeSandbox** (solo código fuente para revisión)

**Tiempo estimado:** 20-30 minutos

---

## ✅ LO QUE YA ESTÁ HECHO

- ✓ Todo el código PHP desarrollado y testeado
- ✓ Base de datos lista para importar
- ✓ Validaciones funcionando (cliente + servidor)
- ✓ Diseño responsive completado
- ✓ PDO configurado correctamente
- ✓ Compatible con InfinityFree

**Solo falta:** Subirlo a los servidores mencionados.

---

## 📋 PASO 1: DESPLEGAR EN INFINITYFREE

### 1.1. Crear Cuenta y Sitio

```
1. Ir a: https://www.infinityfree.com
2. Click en "Sign Up" (crear cuenta)
3. Ingresar correo y contraseña
4. Verificar email
5. Click en "Create Account" para crear tu primer sitio
6. Elegir un subdominio (ejemplo: libreria-itla.infinityfreeapp.com)
7. Completar setup
```

### 1.2. Crear Base de Datos MySQL

```
1. Entrar al panel de control (cPanel)
2. Buscar "MySQL Databases"
3. Click en "Create Database"
4. Nombre: libreria
5. Click en "Create Database"

IMPORTANTE - ANOTAR:
- Database Name: (ejemplo: epiz_12345678_libreria)
- MySQL Host: (ejemplo: sql200.infinityfree.com)
- MySQL User: (ejemplo: epiz_12345678)
- MySQL Password: [la que creaste]
```

### 1.3. Importar Base de Datos

```
1. En el panel de control, buscar "phpMyAdmin"
2. Click para abrir phpMyAdmin
3. Seleccionar tu base de datos (epiz_xxxxx_libreria)
4. Click en pestaña "Importar"
5. Click en "Seleccionar archivo"
6. Subir: Base Datos Libreria.sql
7. Click en "Continuar"
8. Esperar a que termine la importación
9. Repetir para: create_contacto.sql
10. Verificar que aparezcan todas las tablas
```

### 1.4. Subir Archivos al Servidor

**Opción A - File Manager (Recomendado):**

```
1. En panel de control, click en "File Manager"
2. Navegar a carpeta: htdocs
3. Click en "Upload"
4. Seleccionar TODOS los archivos del proyecto:
   - assets/ (carpeta completa)
   - config/ (carpeta completa)
   - includes/ (carpeta completa)
   - *.php (todos los archivos PHP)
   - *.sql (ambos archivos)
   - *.md (todos los documentos)
5. Esperar a que termine la subida
```

**Opción B - FTP (Alternativa):**

```
1. Descargar FileZilla: https://filezilla-project.org
2. En panel de InfinityFree, obtener credenciales FTP
3. Conectar con FileZilla
4. Copiar todos los archivos a /htdocs
```

### 1.5. Configurar Conexión a Base de Datos

```
1. En File Manager, abrir: htdocs/config/db.php
2. Editar estas líneas con TUS credenciales:

   define('DB_HOST', 'sql200.infinityfree.com');    // Tu MySQL Host
   define('DB_NAME', 'epiz_xxxxx_libreria');        // Tu Database Name
   define('DB_USER', 'epiz_xxxxx');                 // Tu MySQL User
   define('DB_PASS', 'tu_contraseña_aqui');         // Tu Password

3. Click en "Save Changes"
```

### 1.6. Verificar que Todo Funciona

```
1. Abrir en navegador: http://tudominio.infinityfreeapp.com/inspect_db.php

   Debe mostrar:
   ✓ "Conexión exitosa a la base de datos"
   ✓ Lista de todas las tablas
   ✓ Cantidad de registros

   Si hay error:
   ❌ Verificar credenciales en config/db.php
   ❌ Verificar que la base de datos fue importada

2. Probar todas las páginas:
   - http://tudominio.infinityfreeapp.com/index.php
   - http://tudominio.infinityfreeapp.com/libros.php
   - http://tudominio.infinityfreeapp.com/autores.php
   - http://tudominio.infinityfreeapp.com/contacto.php

3. Probar formulario de contacto:
   - Llenar formulario completamente
   - Click en "Enviar Mensaje"
   - Debe mostrar mensaje de éxito
   - Verificar en phpMyAdmin → tabla "contacto" que se guardó

4. Probar búsqueda:
   - En página de libros, escribir en barra de búsqueda
   - Debe filtrar en tiempo real
```

### 1.7. Copiar Enlace para Entregar

```
URL a entregar: http://tudominio.infinityfreeapp.com
(Anotar para el paso final)
```

---

## 📋 PASO 2: SUBIR A CODESANDBOX

### 2.1. Crear Proyecto

```
1. Ir a: https://codesandbox.io
2. Click en "Sign in"
3. Usar GitHub o crear cuenta
4. Click en "Create Sandbox"
5. Buscar "PHP" en templates
6. Seleccionar "PHP" template
7. Click en crear
```

### 2.2. Subir Archivos

```
1. En el panel izquierdo de CodeSandbox
2. Seleccionar TODOS los archivos del proyecto desde tu PC
3. Arrastrar y soltar en el panel izquierdo
4. Esperar a que termine la carga

Archivos a subir:
- assets/ (carpeta completa)
- config/ (carpeta completa)
- includes/ (carpeta completa)
- index.php
- libros.php
- autores.php
- contacto.php
- inspect_db.php
- Base Datos Libreria.sql
- create_contacto.sql
- README.md
```

### 2.3. Compartir

```
1. Click en botón "Share" (arriba a la derecha)
2. En "Who has access" seleccionar:
   "Anyone with the link can view"
3. Click en "Copy Link"
4. Anotar enlace para entregar
```

**NOTA IMPORTANTE:**
- La base de datos NO funcionará en CodeSandbox (es normal)
- CodeSandbox es SOLO para que el profesor vea el código
- El sitio funcional está en InfinityFree

---

## 📋 PASO 3: ENTREGAR

### Enlaces a Proporcionar:

```
1. SITIO FUNCIONAL (InfinityFree):
   http://tudominio.infinityfreeapp.com

2. CÓDIGO FUENTE (CodeSandbox):
   https://codesandbox.io/s/xxxxx
```

---

## 🔧 SOLUCIÓN DE PROBLEMAS

### Error: "Error al conectar con la base de datos"

```
Solución:
1. Verificar credenciales en config/db.php
2. Asegurar que DB_HOST es el correcto (NO "localhost")
3. Verificar que la base de datos existe en phpMyAdmin
```

### Error: "No se muestran los libros/autores"

```
Solución:
1. Verificar en phpMyAdmin que las tablas tienen datos
2. Confirmar que se importó "Base Datos Libreria.sql"
3. Revisar inspect_db.php para ver errores
```

### Error: "El formulario no guarda los datos"

```
Solución:
1. Verificar que tabla "contacto" existe
2. Confirmar que se importó "create_contacto.sql"
3. Revisar permisos de la tabla en phpMyAdmin
```

### InfinityFree: "Cuenta suspendida" o "Sitio no carga"

```
Solución:
1. Esperar 5-10 minutos (puede tardar en activarse)
2. Verificar que el dominio esté activo en el panel
3. Revisar que los archivos estén en /htdocs
```

---

## ✅ CHECKLIST FINAL

**Antes de entregar, verificar:**

- [ ] Sitio en InfinityFree abre correctamente
- [ ] Página de libros muestra datos
- [ ] Página de autores muestra datos
- [ ] Formulario de contacto guarda en base de datos
- [ ] Búsqueda funciona en libros y autores
- [ ] Código subido a CodeSandbox
- [ ] Enlaces copiados y listos para entregar

---

## 📞 RECURSOS

- **InfinityFree:** https://www.infinityfree.com
- **CodeSandbox:** https://codesandbox.io
- **FileZilla (FTP):** https://filezilla-project.org

---

## 💡 TIPS IMPORTANTES

1. **Base de datos en InfinityFree:**
   - El host NO es "localhost"
   - Usa el que te dan (ejemplo: sql200.infinityfree.com)

2. **Credenciales:**
   - Anota TODO en un lugar seguro
   - Las necesitarás para config/db.php

3. **CodeSandbox:**
   - Solo es para revisión de código
   - No te preocupes si no funciona la BD allí

4. **Tiempo:**
   - InfinityFree puede tardar unos minutos en activarse
   - Ten paciencia si no carga inmediatamente

---

**¡ÉXITO CON EL DESPLIEGUE!** 🚀

El código está perfecto. Solo síguelas instrucciones paso a paso.
