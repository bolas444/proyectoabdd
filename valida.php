<?php
$usuariob=$_POST['usuario'];
$contrasenab=$_POST['contra'];
require('db.php');
$conecta=conectar();
$acceso="SELECT * from usuarios where usuario='$usuariob' and contrasena='$contrasenab' ";
$correcto=0;
$resultado=mysqli_query($conecta,$acceso);

while ($data = mysqli_fetch_assoc($resultado))
{
$contra=$data['contrasena'];
$usuario=$data['usuario'];
$correcto=1;
}

mysqli_close($conecta);
if($correcto == 1)
{
session_start();
$_SESSION['usuario']=$usuario;
echo "oa";
}
else if($correcto == 0)
{
echo "aios";
}

?>
