Tomatoes fue realizado para agregar productos en carrito, eliminarlos de mis compras o mis ventas, agregar productos y listarlos.

Esta web está desarrollada con bootstrap y Jquery, usando el modelo de MVC (modelo, vista, controlador) para una mayor facilidad de desarrollo.

No es necesario instalar dichas herramientas, están se llaman con un link CDN.

El back-end esta desarrollado en PHP con conexión a MySQL utilizando Xampp con gestor.

El proyecto se encuentra en el respositorio de github  https://github.com/GiissGuarin/tomates-proyect.git

Para abrir el proyecto, la carpeta de este debe ubicarse dentro de la carpeta xampp/htdocs. Luego de esto el Xampp debe ser ejecutado activando los puertos correspondientes para el servidor apache y el mysql.

Dentro de la carpeta del proyecto se encontrará el archivo de la base de datos bdtomates.sql, para proceder a instalarla abrimos el phpMyAdmin, creamos una base de datos nueva con el mismo nombre que tiene nuestra base de datos(bdtomates), luego de creada nos dirigimos a la pestaña de importar y seleccionamos el archivo. 

La ruta para abrir el proyecto es: https://localhost/Tomates-proyect/index.php

Esta web posee dos usuarios principales:
admin con clave 123
cliente con clave 123

El usuario admin tendrá privilegios como vendedor tales como agregar productos  para vender, poder ver su inventario y sus ventas realizadas; y el usuario cliente tendrá solo algunas vistas disponibles tales como la vista principal y el listado de sus compras.

En la pantalla principal se encuentra la vista con las cards de cada producto disponible, con su respectivo input para añadir cantidad y un carrito que contabilizara tus compras.
En el navbar(barra superior) podrás encontrar los links que redirigen a cada pestaña del sitio web.

En "deliver products" encontrarás el formulario para publicar un producto. Al publicar, se te redirigirá a "my inventity" para q puedas visualizar todos los productos que has publicado.

En la opción "my shopping" podrás visualizar la lista de todas tus compras, cada opción tiene un botón para cancelar la compra.

En la opción "my sales" podrás seguir todas tus ventas realizadas con la opción de cancelar la compra, con la garantía de que tus productos ya vendidos volverán a tu inventario.
