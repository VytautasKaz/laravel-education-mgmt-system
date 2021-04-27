## Description

Basic education system manager built with Laravel framework. **Registration and login are required to get access to create/update/delete features.**

## Launch instructions:

-   If you do not have composer installed on your system, install it (installation instructions [here](https://getcomposer.org/download)).
-   Clone this repository or download it as a ZIP package.
-   Open it with Visual Studio Code or your preferred code editor.
-   Create a fresh schema in you MySql server.
-   Rename **'.env.example'** file to **'.env'** inside of the project's root directory and configure the database information.
-   Using GitBash, CMD or other terminal in your code editor:
    -   if composer is installed locally: run **php <'path to composer.phar file location'>/composer.phar install**
    -   if composer is installed on your system globally: run **composer install**
-   Run **php artisan key:generate**
-   Run **php artisan migrate** to create tables.
-   Run **php artisan db:seed** to fill tables with data.
-   Run **php artisan serve**
-   Follow the link that appears in the terminal after running 'php artisan serve'.

## Author:

[Vytautas K.](https://github.com/VytautasKaz)
