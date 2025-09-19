# FactFront & FactBack

Este proyecto está compuesto por dos partes:

-   **fact-front**: Aplicación Angular (frontend)
-   **fact-back**: API backend desarrollada en Laravel (no PHP tradicional)

## Requisitos previos

-   Node.js y npm
-   Angular CLI
-   PHP >= 8.1
-   Composer
-   XAMPP (opcional, para Windows y Mac)

## Instalación y ejecución de fact-front (Angular)

1. Instala dependencias:
    ```bash
    cd Front/fact-front
    npm install
    ```
2. Ejecuta el servidor de desarrollo:
    ```bash
    ng serve
    ```
3. Accede a la app en [http://localhost:4200/](http://localhost:4200/)

## Instalación y ejecución de fact-back (Laravel)

### En Windows (XAMPP)

1. Instala XAMPP y asegúrate de que Apache y MySQL estén corriendo.
2. Clona el proyecto y ubica la carpeta `Back/fact-back` dentro de tu directorio de proyectos.
3. Instala dependencias de Laravel:
    ```bash
    cd Back/fact-back
    composer install
    ```
4. Copia el archivo de entorno:
    ```bash
    cp .env.example .env
    ```
5. Configura la conexión a la base de datos en `.env` (usualmente MySQL de XAMPP).
6. Genera la clave de la app:
    ```bash
    php artisan key:generate
    ```
7. Ejecuta migraciones y seeders:
    ```bash
    php artisan migrate --seed
    ```
8. Inicia el servidor de Laravel:
    ```bash
    php artisan serve
    ```
9. Accede a la API en [http://localhost:8000/](http://localhost:8000/)

### En Mac OS (comandos o XAMPP)

1. Instala PHP y Composer (puedes usar Homebrew):
    ```bash
    brew install php composer
    ```
2. (Opcional) Instala XAMPP y usa MySQL de XAMPP.
3. Instala dependencias de Laravel:
    ```bash
    cd Back/fact-back
    composer install
    ```
4. Copia el archivo de entorno:
    ```bash
    cp .env.example .env
    ```
5. Configura la conexión a la base de datos en `.env` (MySQL local o XAMPP).
6. Genera la clave de la app:
    ```bash
    php artisan key:generate
    ```
7. Ejecuta migraciones y seeders:
    ```bash
    php artisan migrate --seed
    ```
8. Inicia el servidor de Laravel:
    ```bash
    php artisan serve
    ```
9. Accede a la API en [http://localhost:8000/](http://localhost:8000/)

## Notas adicionales

-   Si usas XAMPP, asegúrate de que el puerto de MySQL y Apache no estén ocupados.
-   Puedes modificar la configuración de la base de datos en el archivo `.env`.
-   Para ejecutar pruebas en el backend:
    ```bash
    php artisan test
    ```
-   Para ejecutar pruebas en el frontend:
    ```bash
    ng test
    ```

## Recursos útiles

-   [Documentación Angular CLI](https://angular.dev/tools/cli)
-   [Documentación Laravel](https://laravel.com/docs)
