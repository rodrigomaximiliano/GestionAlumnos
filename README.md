## GestionAlumnos

CRUD para la gestión de alumnos realizada con PHP 8.1, Laravel 11 y VueJs 3.4.0.

## Instalación

Para comenzar, asegúrate de tener [Composer](https://getcomposer.org/) para las dependencias de PHP y [Node.js](https://nodejs.org/) con npm para las dependencias de JavaScript instalados en tu máquina. Además, necesitarás tener [XAMPP](https://www.apachefriends.org/index.html) o un servidor MySQL similar instalado para la base de datos.

1. Clona este repositorio:

    Instala las dependencias de PHP con Composer: composer install

2. Instala las dependencias de JavaScript con npm: npm install.

3.Configura la base de datos MySQL en el archivo .env.


4.Ejecuta las migraciones para crear las tablas en la base de datos: php artisan migrate


Una vez que hayas instalado las dependencias y configurado la base de datos, puedes ejecutar el servidor backend y frontend para comenzar a usar la aplicación.
Backend

Para iniciar el servidor backend, ejecuta el siguiente comando en la terminal: php artisan serve

Esto iniciará el servidor backend y podrás acceder a la API en http://localhost:8000.

Para compilar y ejecutar el frontend, ejecuta el siguiente comando en otra terminal: npm run dev
