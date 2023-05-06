<?php
//INICIAMOS UNA SESION PARA GUARDAR MENSAJES

session_start();

$conn=mysqli_connect(
    'localhost',
    'root',
    '',
    'mysql_crud'
);

?>