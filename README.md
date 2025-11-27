# 📚 Portal Web - Librería Online

## 🎯 Estado del Proyecto

**✅ PROYECTO COMPLETO Y FUNCIONAL**

Todo el código está desarrollado, testeado y listo para desplegar.

---

## 📂 Estructura del Proyecto

```
Portar-Web/
├── assets/
│   ├── css/style.css              # Estilos personalizados
│   └── js/script.js               # JavaScript para validación
├── config/
│   └── db.php                     # Configuración PDO
├── includes/
│   ├── header.php                 # Navbar y head
│   └── footer.php                 # Footer
├── index.php                      # Página de inicio
├── libros.php                     # Catálogo de libros
├── autores.php                    # Listado de autores
├── contacto.php                   # Formulario de contacto
├── inspect_db.php                 # Herramienta de verificación
├── Base Datos Libreria.sql        # Base de datos principal
├── create_contacto.sql            # Tabla de contacto
├── INSTRUCCIONES_DESPLIEGUE.md    # ⭐ LEE ESTO PRIMERO
└── README.md                      # Este archivo
```

---

## ✨ Características Implementadas

### Backend (PHP + MySQL)
- ✅ **PDO** para todas las consultas (seguro contra SQL Injection)
- ✅ **Prepared statements** en inserts y updates
- ✅ **Validación doble**: cliente (JavaScript) y servidor (PHP)
- ✅ **Manejo de errores** robusto
- ✅ **JOIN queries** optimizados
- ✅ **Compatible con InfinityFree** (PHP 7.4+, MySQL 5.7+)

### Frontend
- ✅ **Bootstrap 5.3** responsive
- ✅ **Diseño moderno** con gradientes y animaciones
- ✅ **Búsqueda en tiempo real** sin recargar página
- ✅ **Validación de formularios** con feedback visual
- ✅ **100% en español**

### Páginas
- ✅ **Inicio**: Landing page con navegación
- ✅ **Libros**: Listado completo con búsqueda y estadísticas
- ✅ **Autores**: Listado con información de contacto
- ✅ **Contacto**: Formulario funcional que guarda en BD

---

## 🚀 Próximos Pasos (Tu Responsabilidad)

### 1. Desplegar en InfinityFree
```
- Crear cuenta
- Subir archivos
- Importar base de datos
- Configurar credenciales
```

### 2. Subir a CodeSandbox
```
- Crear sandbox PHP
- Subir código fuente
- Compartir enlace
```

### 3. Entregar Enlaces
```
- URL de InfinityFree (sitio funcional)
- URL de CodeSandbox (código fuente)
```

**📖 SIGUE LAS INSTRUCCIONES EN:** `INSTRUCCIONES_DESPLIEGUE.md`

---

## 🔧 Configuración Local (Opcional)

Si quieres probar localmente antes de desplegar:

### Requisitos
- XAMPP (Apache + MySQL + PHP)
- Navegador web

### Pasos
1. Copiar proyecto a `C:\xampp\htdocs\Portar-Web`
2. Iniciar Apache y MySQL en XAMPP
3. Crear base de datos `libreria` en phpMyAdmin
4. Importar `Base Datos Libreria.sql`
5. Importar `create_contacto.sql`
6. Abrir: `http://localhost/Portar-Web`

---

## 📊 Base de Datos

### Tablas Principales
- **autores**: Información de autores
- **titulos**: Catálogo de libros
- **titulo_autor**: Relación N:M entre libros y autores
- **contacto**: Mensajes del formulario

### Configuración
- Charset: `utf8mb4`
- Motor: InnoDB / MyISAM
- Compatible con MySQL 5.7+

---

## 🔒 Seguridad

### Protecciones Implementadas
- ✅ **SQL Injection**: Bloqueado con prepared statements
- ✅ **XSS**: Bloqueado con `htmlspecialchars()`
- ✅ **Validación de datos**: En cliente y servidor
- ✅ **Sanitización**: `trim()` y `filter_var()` para emails

---

## 📝 Requerimientos Cumplidos

| # | Requerimiento | Estado |
|---|---------------|--------|
| 1 | Base de datos importable | ✅ |
| 2 | Plantilla Bootstrap | ✅ |
| 3 | Todo en español | ✅ |
| 4 | Tecnología PHP | ✅ |
| 5 | Listado de libros | ✅ |
| 6 | Listado de autores | ✅ |
| 7 | Formulario de contacto | ✅ |
| 8 | Tabla contacto | ✅ |
| 9 | Guardar en BD | ✅ |
| 10 | Usar PDO | ✅ |
| 11 | CSS y JavaScript | ✅ |
| 12 | Servidor público | 🔄 Pendiente |
| 13 | CodeSandbox | 🔄 Pendiente |

---

## 💡 Notas Importantes

### Para InfinityFree
- El host de BD **NO es "localhost"**
- Usa el que te proporcionen (ej: `sql200.infinityfree.com`)
- Actualiza `config/db.php` con las credenciales correctas

### Para CodeSandbox
- La base de datos **NO funcionará** (es normal)
- Es solo para revisión de código
- Asegúrate de que sea **público** (Anyone with link can view)

---

## 📞 Ayuda

Si tienes problemas durante el despliegue:

1. **Revisa:** `INSTRUCCIONES_DESPLIEGUE.md` (solución de problemas)
2. **Verifica:** Credenciales en `config/db.php`
3. **Prueba:** `inspect_db.php` para verificar conexión

---

## 🎓 Créditos

**Proyecto Final - Programación Web**
- Instituto: ITLA
- Curso: Programación Web
- Proyecto: Portal de Librería Online

---

## 📄 Licencia

Proyecto académico para fines educativos.

---

**IMPORTANTE:** Lee `INSTRUCCIONES_DESPLIEGUE.md` para completar el despliegue paso a paso.
