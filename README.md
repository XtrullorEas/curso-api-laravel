# 🚀 Curso API RESTful con Laravel desde 0

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red.svg" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
</p>

## 📋 Descripción

Este proyecto es un **curso completo de API RESTful con Laravel desde cero**. Aprenderás a construir una API robusta y escalable utilizando las mejores prácticas de desarrollo, incluyendo autenticación JWT, autorización con roles y permisos, relaciones de modelos complejas, y mucho más.

## 🎯 Objetivos del Curso

- ✅ Construir una API RESTful completa con Laravel
- ✅ Implementar autenticación JWT (JSON Web Tokens)
- ✅ Sistema de roles y permisos con Spatie
- ✅ Manejo de relaciones de base de datos complejas
- ✅ Validación de datos y manejo de errores
- ✅ Buenas prácticas de desarrollo de APIs
- ✅ Documentación de endpoints

## 🛠️ Tecnologías Utilizadas

- **Laravel 12.x** - Framework PHP
- **PHP 8.2+** - Lenguaje de programación
- **SQLite** - Base de datos
- **JWT Auth** - Autenticación con tokens
- **Spatie Laravel Permission** - Sistema de roles y permisos
- **Laravel Sanctum** - Autenticación API adicional
- **Pest PHP** - Framework de testing

## 📁 Estructura del Proyecto

```
curso-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/Api/
│   │   │   ├── AuthController.php          # Autenticación JWT
│   │   │   ├── UserController.php          # Gestión de usuarios
│   │   │   ├── PostController.php          # Gestión de posts
│   │   │   ├── CategoryController.php      # Gestión de categorías
│   │   │   ├── TaskController.php          # Gestión de tareas
│   │   │   ├── PermissionController.php    # Gestión de permisos
│   │   │   └── RoleController.php          # Gestión de roles
│   │   ├── Requests/                       # Validaciones de formularios
│   │   └── Resources/                      # Transformadores de respuestas
│   ├── Models/
│   │   ├── User.php                        # Modelo de usuario
│   │   ├── Post.php                        # Modelo de posts
│   │   ├── Category.php                    # Modelo de categorías
│   │   ├── Tag.php                         # Modelo de etiquetas
│   │   ├── Task.php                        # Modelo de tareas
│   │   └── Api.php                         # Modelo base para API
│   └── Policies/
│       └── PostPolicy.php                 # Políticas de autorización
├── database/
│   ├── migrations/                         # Migraciones de base de datos
│   ├── factories/                          # Factories para testing
│   └── seeders/                           # Seeders para datos iniciales
└── routes/
    └── api.php                            # Rutas de la API
```

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP 8.2 o superior
- Composer
- XAMPP (para Windows) o similar

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/XtrullorEas/curso-api-laravel.git
   cd curso-api-laravel
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar el archivo de entorno**
   ```bash
   copy .env.example .env
   ```

4. **Generar la clave de aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Configurar JWT**
   ```bash
   php artisan jwt:secret
   ```

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

## 📚 Contenido del Curso

### Módulo 1: Fundamentos de APIs RESTful
- ¿Qué es una API RESTful?
- Métodos HTTP (GET, POST, PUT, DELETE)
- Códigos de estado HTTP
- Estructura de respuestas JSON

### Módulo 2: Configuración del Proyecto Laravel
- Instalación de Laravel
- Configuración de base de datos
- Estructura de directorios
- Configuración de rutas API

### Módulo 3: Modelos y Migraciones
- Creación de modelos Eloquent
- Migraciones de base de datos
- Relaciones entre modelos (One-to-Many, Many-to-Many)
- Factories y Seeders

### Módulo 4: Controladores API
- Creación de controladores de API
- Métodos de controlador RESTful
- Validación de datos de entrada
- Manejo de errores y excepciones

### Módulo 5: Autenticación JWT
- Configuración de JWT Auth
- Registro de usuarios
- Login y logout
- Middleware de autenticación
- Refresh de tokens

### Módulo 6: Autorización y Roles
- Instalación de Spatie Laravel Permission
- Creación de roles y permisos
- Asignación de roles a usuarios
- Middleware de autorización

### Módulo 7: Relaciones Avanzadas
- Modelos con relaciones complejas
- Eager Loading
- Consultas optimizadas
- Filtrado y búsqueda

### Módulo 8: Recursos y Transformadores
- Laravel API Resources
- Transformación de datos
- Paginación de resultados
- Metadatos de respuesta

### Módulo 9: Mejores Prácticas
- Versionado de APIs
- Documentación con herramientas
- Manejo de errores consistente
- Optimización de rendimiento

## 🔗 Endpoints Principales

### Autenticación
```
POST   /api/auth/register    # Registro de usuario
POST   /api/auth/login       # Inicio de sesión
POST   /api/auth/logout      # Cerrar sesión
POST   /api/auth/refresh     # Renovar token
POST   /api/auth/me          # Datos del usuario autenticado
```

### Usuarios
```
GET    /api/users            # Listar usuarios
POST   /api/users            # Crear usuario
GET    /api/users/{id}       # Mostrar usuario
PUT    /api/users/{id}       # Actualizar usuario
DELETE /api/users/{id}       # Eliminar usuario
```

### Posts
```
GET    /api/posts            # Listar posts
POST   /api/posts            # Crear post
GET    /api/posts/{id}       # Mostrar post
PUT    /api/posts/{id}       # Actualizar post
DELETE /api/posts/{id}       # Eliminar post
POST   /api/posts/{id}/tags  # Asignar etiquetas a post
```

### Categorías
```
GET    /api/categories       # Listar categorías
POST   /api/categories       # Crear categoría
GET    /api/categories/{id}  # Mostrar categoría
PUT    /api/categories/{id}  # Actualizar categoría
DELETE /api/categories/{id}  # Eliminar categoría
```

### Tareas
```
GET    /api/tasks            # Listar tareas
POST   /api/tasks            # Crear tarea
GET    /api/tasks/{id}       # Mostrar tarea
PUT    /api/tasks/{id}       # Actualizar tarea
DELETE /api/tasks/{id}       # Eliminar tarea
```

### Roles y Permisos
```
GET    /api/roles            # Listar roles
POST   /api/roles            # Crear rol
GET    /api/permissions      # Listar permisos
POST   /api/permissions      # Crear permiso
```

## 🔒 Seguridad

Este proyecto implementa varias capas de seguridad:

- **Autenticación JWT** con expiración de tokens
- **Autorización basada en roles y permisos**
- **Validación de datos** en todos los endpoints
- **Protección CSRF** para formularios web
- **Rate limiting** para prevenir abuso de API
- **Sanitización de datos** de entrada

## 👨‍💻 Autor

**XtrullorEas**
- GitHub: [@XtrullorEas](https://github.com/XtrullorEas)

## 🙏 Agradecimientos

- [Coders Free](https://codersfree.com/cursos/aprende-a-crear-una-api-restful-con-laravel) por el excelente Curso