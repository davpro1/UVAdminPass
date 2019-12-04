<!DOCTYPE html>

<html>
<head>
<title>UVAdminPasswords</title>
<meta http-equiv="Refresh" content="5;url=index.html">
<link rel="stylesheet" href="../css/estilos.css">
<link rel="shortcut icon" href="../favicon.png">
</head>
<body>

<?php

if((!$user_bd=$_POST['user_bd']) or (!$pass_bd=$_POST['pass_bd']) or (!$name_bd=$_POST['name_bd']) or (!$pass_registration=$_POST['pass_registration']) or (!$pass_cifrado=$_POST['pass_cifrado'])) {
die("<h1>Por favor rellene todos los campos</h1>");
}

$pass_registration=sha1($pass_registration);


if(!file_exists("/etc/uvadminpasswords/uvadminpasswords.ini")) {} else {

die("<h1>Instalación existente detectada</h1>");
}

fopen("/etc/uvadminpasswords/uvadminpasswords.ini", "w");

if(!file_exists("/etc/uvadminpasswords/uvadminpasswords.ini")) {

die("<h1>No se ha podido crear fichero /etc/uvadminpasswords/uvadminpasswords.ini</h1>");
}


$conexion=mysql_connect("localhost", $user_bd, $pass_bd);
if(!$conexion) {
unlink("/etc/uvadminpasswords/uvadminpasswords.ini");
die("<h1>No se pudo conectar con la base de datos</h1>");

}

$bd=mysql_select_db($name_bd, $conexion);

if(!$bd) {
unlink("/etc/uvadminpasswords/uvadminpasswords.ini");
die("<h1>Problemas seleccionando la base de datos</h1>");

}

$crear_tabla="create table users (nombre VARCHAR(30),clave VARCHAR(100), tabla VARCHAR(35))";
$crear_tabla_consulta=mysql_query($crear_tabla, $conexion);

if(!$crear_tabla_consulta) {
unlink("/etc/uvadminpasswords/uvadminpasswords.ini");
die("<h1>Error creando tabla de usuarios</h1>");

}

$archivo=fopen("/etc/uvadminpasswords/uvadminpasswords.ini", "a");

fputs($archivo, "user_bd = $user_bd\n");
fputs($archivo, "pass_bd = $pass_bd\n");
fputs($archivo, "name_bd = $name_bd\n");
fputs($archivo, "pass_registration = $pass_registration\n");
fputs($archivo, "pass_cifrado = $pass_cifrado\n");

fclose($archivo);
echo "<h1>¡Instalacion Completa!</h1>";
echo "<h2>No olvide borrar la carpeta /install</h2>";
?>
</body>
</html>
