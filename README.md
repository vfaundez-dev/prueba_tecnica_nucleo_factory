# Prueba Tecnica - API Rest Notas
### Realizado para Nucleo Factory

## 🧾 Descripción

**Sencillo sistema api para la gestión de notas**

## 🛠️ Requisitos

- PHP >= 8.2
- Composer
- Laravel 12.x
- SQLite

## ⚙️ Instalación

1. **Clonar el repositorio:**

    ```bash
    git clone https://github.com/vfaundez-dev/sistema_reserva_restaurantes.git
    cd prueba_tecnica_nucleo_factory
    ```

2. **Instalar dependencias de PHP:**

    ```bash
    composer install
    ```

3. **Copia y configurar archivo .env:**

    ```bash
    cp .env.example .env
    ```

4. **Crea el archivo de base de datos SQLite:**

    ```bash
    echo > database/database.sqlite
    ```
    o

    ```bash
    touch database/database.sqlite
    ```

5. **Generar clave de aplicación:**

    ```bash
    php artisan key:generate
    ```

6. **Modificar las credenciales de la base de datos en el archivo `.env`:**

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=./database/database.sqlite
    ```

7. **Ejecutar migraciones y seeders:**

    ```bash
    php artisan migrate
    ```

8. **Levantar el servidor:**

    ```bash
    php artisan serve
    ```

## 📆 Rutas API

| Método    | Ruta                      | Descripción               |
|-----------|---------------------------|---------------------------|
| GET       | /api/notes                | Listar notas              |
| POST      | /api/notes                | Crear nueva nota          |
| GET       | /api/notes/{id}           | Ver detalles de una nota  |
| DELETE    | /api/notes/{id}           | Eliminar nota             |


## 🧪 Ejecución de tests

- **Para ejecutar todos los tests (unitarios y de feature):**

    ```bash
    php artisan test
    ```

---

💻 Desarrollado por **© 2025 Vladimir Faundez Hernández. Todos los derechos reservados.**
