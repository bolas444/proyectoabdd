<?php
function conectar()
{
$vincular = mysqli_connect("localhost","root","123456789","proyectobdd");

if (mysqli_connect_errno())
{
echo "Error de conexion: " . mysqli_connect_error();
}
return $vincular;
}
conectar();