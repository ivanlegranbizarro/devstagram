# Devstagram

Devstagram es un proyecto web inspirado en Instagram, desarrollado con Laravel, Livewire y Tailwind. El objetivo del proyecto es permitir a los desarrolladores compartir sus publicaciones y conectarse con otros miembros de la comunidad.

## Tecnolog铆as utilizadas

- Laravel: un framework de PHP para el desarrollo de aplicaciones web.
- Livewire: una biblioteca de PHP para construir interfaces de usuario interactivas con Laravel (y sin JavaScript 馃槣).
- Tailwind: un framework de CSS para dise帽ar interfaces de usuario personalizadas.

## Funcionalidades

- Registro e inicio de sesi贸n de usuarios
- Publicaci贸n de proyectos con una imagen, t铆tulo y descripci贸n
- Listado de proyectos publicados por los usuarios seguidos
- Sistema de likes para los proyectos
- Paginaci贸n para los listados de proyectos
- Perfil de usuario con informaci贸n personal y listado de proyectos publicados
- B煤squeda de usuarios y proyectos

## Instalaci贸n y configuraci贸n

Para instalar y configurar el proyecto, sigue los siguientes pasos:

1. Clona el repositorio desde GitHub:

`git clone https://github.com/ivanlegranbizarro/devstagram.git`


2. Crea un archivo `.env` a partir del archivo `.env.example` y configura las variables de entorno necesarias para tu entorno de desarrollo (por ejemplo, la conexi贸n a la base de datos).


3. Instala las dependencias del proyecto con Composer:

`composer install`


4. Ejecuta las migraciones de la base de datos para crear las tablas necesarias:

`php artisan migrate`


5. Genera una clave de aplicaci贸n para Laravel:

`php artisan key:generate`


6. Inicia el servidor de desarrollo de Laravel:

`php artisan serve`


7. Abre el proyecto en tu navegador y comienza a utilizarlo en `http://localhost:8000`.


## Cr茅ditos

Este proyecto ha sido desarrollado por [Iv谩n Legr谩n Bizarro], siguiendo muy de cerca el curso de Udemy (https://www.udemy.com/course/curso-laravel-crea-aplicaciones-y-sitios-web-con-php-y-mvc/), al que se le han a帽adido modificaciones libres, como la paginaci贸n con LiveWire.
