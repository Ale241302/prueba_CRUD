# prueba_CRUD
Pureba Tecnica Jorge Casierra

Prueba Técnica - CRUD de Gestión de Usuarios
Este proyecto de prueba técnica fue desarrollado por Jorge Casierra para demostrar habilidades en la implementación de un CRUD (Crear, Leer, Actualizar, Eliminar) para la gestión de usuarios.

Descripción del Proyecto
El proyecto trata sobre la gestión de usuarios, proporcionando las siguientes funcionalidades:

Crear: Permite agregar nuevos usuarios al sistema.
Modificar: Permite actualizar la información de usuarios existentes.
Eliminar: Permite eliminar usuarios del sistema.
Inactivar: Cambia el estado de un usuario a "Inactivo", lo que impide que pueda iniciar sesión en el sistema.
Activar: Cambia el estado de un usuario de "Inactivo" a "Activo", permitiendo que pueda iniciar sesión nuevamente.
Inicio de Sesión: Implementa un sistema de inicio de sesión seguro para los usuarios.
Gestión de Sesión: Administra la inactividad del usuario en el sitio, cerrando automáticamente la sesión si no hay actividad durante un cierto período de tiempo, o si se pierde la conexión o se cierra el navegador.
Sistema de Log: Registra las acciones realizadas por los usuarios en el sistema para fines de auditoría y seguimiento.
Estructura del Proyecto
El proyecto se estructura de la siguiente manera:

api: Contiene los archivos PHP para el backend del sistema, incluyendo el archivo de conexión a la base de datos y los scripts para realizar operaciones CRUD.
assets: Almacena archivos estáticos como imágenes, hojas de estilo CSS y scripts JavaScript.
bd: Contiene el archivo SQL para la creación de la base de datos y las tablas necesarias.
README.md: Este archivo que proporciona información sobre el proyecto y su uso.
Configuración y Uso
Configuración de la Base de Datos: Ejecuta el script SQL proporcionado en la carpeta bd para crear la base de datos y las tablas necesarias en tu servidor MySQL.

Configuración del Proyecto: Modifica los detalles de conexión a la base de datos en los archivos PHP dentro de la carpeta api para que coincidan con los de tu servidor MySQL.

Despliegue del Proyecto: Sube todos los archivos del proyecto a tu servidor web o hosting. Asegúrate de que los permisos de los archivos y carpetas sean correctos para garantizar su funcionamiento.

Acceso al Sistema: Una vez desplegado, accede al sistema a través de tu navegador web. Si es la primera vez, utiliza el sistema de registro para crear una cuenta de usuario. Luego, inicia sesión con tus credenciales para acceder a las funcionalidades del sistema.

Tecnologías Utilizadas
Lenguajes de Programación: PHP (MVC), HTML, CSS, JavaScript
Base de Datos: MySQL
