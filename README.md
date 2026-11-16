
# Sistema web de la Posta de Salud Comunitaria

Proyecto integrador de DSI406 Tecnología Backend (Laravel + PostgreSQL).

## Requisitos

- PHP 8.3 o superior con pdo_pgsql
- Composer 2
- PostgreSQL

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone https://github.com/Lizbeth1707/posta-salud.git
   ```

2. Ingresar a la carpeta:

   ```bash
   cd posta-salud
   ```

3. Instalar dependencias:

   ```bash
   composer install
   ```

4. Crear el archivo de configuración:

   ```bash
   copy .env.example .env
   ```

5. Generar la clave:

   ```bash
   php artisan key:generate
   ```

6. Crear la base de datos `posta_salud` en PostgreSQL.

7. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

8. Iniciar el servidor:

   ```bash
   php artisan serve
   ```

## Datos de prueba

Para reconstruir la base de datos y cargar automáticamente los datos de prueba, ejecutar:

```bash
php artisan migrate:fresh --seed
```

**Importante:** Este comando elimina las tablas y los datos existentes antes de volver a crearlos.

### Usuarios de acceso

| Usuario | Rol | Contraseña |
|---|---|---|
| admin@posta.test | administrador | password |
| medico@posta.test | personal_medico | password |
| recepcion@posta.test | recepcion | password |

## Autor

Nadia Lizbeth Cruz Cruz
