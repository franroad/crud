<?php
include("db.php");

if (isset($_GET['id'])){
$id=$_GET['id'];
$query = "DELETE FROM empleados WHERE id=$id";
$result=mysqli_query($conn, $query); 

if(!$result){
    die("ERROR");
    }
$_SESSION['mensaje'] ='REGISTRO ELIMINADO CORRECTAMENTE';
$_SESSION['message_type'] ='danger';
header("Location: index.php");
}
?>