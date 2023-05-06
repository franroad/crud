<?php
include("db.php");

if(isset($_POST['enviar']))
{
    
    $nom=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $dep=$_POST['departamento'];
    $fecha_nac=date('Y-m-d',strtotime($_POST['fecha_nac']));
    echo"$fecha_nac";


    $query="INSERT INTO empleados(nombre,apellido,departamento,fecha_nac) 
    values('$nom','$ape','$dep','$fecha_nac')";
    $result=mysqli_query($conn,$query);

 if(!$result){
     die("ERROR");
 }

    $_SESSION['mensaje']='REGISTRO AÑADIDO CON EXITO';
    //bootsrap succes es verde
    $_SESSION['message_type']='success';

    //se muestra de nuevo el inicio
    header("Location: index.php");
}


?>