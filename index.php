<?php
// Si existe la variable contra
if(isset($_POST["contra"]))
{
// asignamos a la variable usuariob el contenido del input usuario
//pasado por post
$usuariob=$_POST['usuario'];
// asignamos a la variable contrasenab el contenido del input contra
//pasado por post
$contrasenab=$_POST['contra'];
//Llamamos a la pagina db dentro del directorio paginas, la cual
//tiene el procedimiento de conexión a la base de datos
require('paginas/db.php');
/* asignamos a la variable conecta el resultado de la conexión a la bdd */
$conecta=conectar();
// realizamos una conulta para determinar si el usuario y contraseña xisten
$acceso="SELECT *from usuarios where usuario='$usuariob'and
contrasena='$contrasenab' ";
$correcto=0;
$resultado=mysqli_query($conecta,$acceso);
// realizamos el recorrido a la base de datos para encontrar el valor
// si se encuentra, la variable correcto vale 1. Guardamos en la variable
nombreusuario
// el valor deñ campo nombreusuario, en contra el valor del campo contrasena
y en
// usario el usuario.
while ($data = mysqli_fetch_assoc($resultado))
{
$nombreusuario=$data['nombreusuario'];
$contra=$data['contrasena'];
$usuario=$data['usuario'];
$correcto=1;
}

//cerramos la conexión a la base de datos.
mysqli_close($conecta);
//si se encontró el registro...
if($correcto == 1)
{
//Iniciamos la sesión...
session_start();
$_SESSION['nombreusuario']=$nombreusuario;
// abrimos la página (con javascript) principal del directorio paginas en la ventana actual
echo "<script
language='javascript'>window.location='/principal.php'</script>;";
}
// Si no se encontró el registro
else if($correcto == 0)
{
// abrimos la página (con javascript) index del directorio actual en la ventana actual 5
echo "<script
language='javascript'>window.location='index.php'</script>;";
}
}
?>
