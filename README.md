# ¡AVISO! Portando funciones mysql* a mysqli*

Privatekeys utiliza funciones obsoletas para conectarse con bases de datos (mysql*) como mysql_connect o mysql_query.

Estas funciones ya no existen desde PHP7, estoy trabajando en portarlo para que trabaje con las funciones actuales "mysqli*"

Si utilizas Privatekeys a menudo, tienes algo de tiempo y conocimientos de PHP tu ayuda es más que bienvenida.

AVISO: Hasta que no esté portado a mysqli privatekeys no funcionará con PHP7.

# ¿Qué es privatekeys?

Privatekeys es un gestor de contraseñas via web, está pensado para instalarse en un servidor propio como si de un CMS se 
tratase, está escrito en PHP y Mariadb,es bastante simple, almacena un listado de pares tipo "servicio:clave". 

Para las contraseñas para acceder a cada cuenta, se usa sha1 como método hashing, y para almacenar las contraseñas en la 
base de datos, se cifran con aes.

# ¿Cómo instalo privatekeys en mi propio servidor web?

1. La instalación es muy sencilla, primero, creamos una base de datos en blanco en mysql/mariadb (podemos usar una 
interfaz sencilla como phpmyadmin)
2. Entrar al servidor por ssh como root y crear la carpeta "/etc/privatekeys", usando el comando "mkdir /etc/privatekeys"
3. Darle permisos 700 a dicha carpeta, para ello usamos el comando "chmod 700 /etc/privatekeys/"
4. Convertir al usuario de apache en propietario de dicha carpeta con el comando "chown www-data /etc/privatekeys" 
(cambiar www-data por otro en caso de que apache utilice otro usuario)
5. Extraer el fichero comprimido y subir la carpeta "privatekeys" a tu servidor
6. Entrar desde cualquier navegador a la carpeta /install de privatekeys, ejemplo "http://tuweb.com/privatekeys/install
7. Rellenar tranquilamente el formulario de instalación PRESTANDO ATENCIÓN A CADA CAMPO
8. En caso de que nos muestre un mensaje de que la instalación ha sido completada, borramos la carpeta /install de 
privatekeys (por seguridad, este paso es muy importante).
9. Paso más importante, disfruta de privatekeys

NOTA: Cuando acabemos de instalar privatekeys, por defecto, no existe ningún usuario, para crearlo simplemente usa el 
enlace de registro abajo del formulario de login.

En cualquier momento puedes cambiar los datos de la instalación (nombre de la base de datos, clave de administración 
etc...) editando el fichero "/etc/privatekeys/privatekeys.ini"

# ¿Puede gestionar varios usuarios?

Claro, y usa hashing sha1 para guardar la clave de login de cada usuario. Además durante el proceso se le pedirá una clave 
de administración, esta clave permitirá crear usuarios nuevos accediendo a "tuservidorweb.com/privatekeys/registro.html"

# ¿Y como puedo borrar usuarios?

Desgraciadamente privatekeys aún no soporta borrar usuarios de una manera tan sencilla como añadirlos, por lo que deberías 
eliminarlo manualmente. Ten en cuenta que privatekeys tiene una tabla donde guarda la información de login de cada usuario 
(deberías eliminar la fila correspondiente a dicho usuario) y una tabla también para cada usuario donde guarda los pares 
"servicio:clave", deberías eliminar también dicha tabla correspondiente al usuario.

Si quieres contribuir a privatekeys, añadir esta funcionalidad sería un buen sitio por donde empezar.

# ¿Es software libre?

Sí, privatekeys se distribuye bajo los términos de la GPLv3.
