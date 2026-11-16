# Sistema web de la Posta de Salud Comunitaria

Proyecto integrador de DSI406 Tecnología Backend (Laravel + PostgreSQL).

## Requisitos
- PHP 8.3 o superior con pdo_pgsql
- Composer 2
- PostgreSQL

## Instalación

1. Clonar el repositorio:
   git clone https://github.com/Lizbeth1707/posta-salud.git

2. Ingresar a la carpeta:
   cd posta-salud

3. Instalar dependencias:
   composer install

4. Crear el archivo de configuración:
   copy .env.example .env

5. Generar la clave:
   php artisan key:generate

6. Crear la base de datos posta_salud en PostgreSQL.

7. Ejecutar las migraciones:
   php artisan migrate

8. Iniciar el servidor:
   php artisan serve

## Autor
Nadia Lizbeth Cruz Cruz