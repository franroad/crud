<?php
include("db.php");

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query="SELECT * FROM empleados where id=$id";
    $result=mysqli_query($conn, $query);

    if(mysqli_num_rows($result)!=0){
        $result=mysqli_fetch_array($result);
        $nombre=$result['nombre'];
        $apellido=$result['apellido'];
        $departamento=$result['departamento'];
        $fecha_nac=$result['fecha_nac'];
        echo $fecha_nac;
    }



}
if(isset($_POST['actualizar'])) {
    echo'peticion recibida';
    $id= $_GET['id'];
    $nom=$_POST['nombre'];
    $ape=$_POST['apellido'];
    $dep=$_POST['departamento'];
    $fecha_nac=date('Y-m-d',strtotime($_POST['fecha_nac']));
    echo"$fecha_nac";

    $query="UPDATE empleados set nombre='$nom',apellido='$ape',departamento='$dep',fecha_nac='$fecha_nac'
    WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['mensaje']='REGISTRO ACTUALIZADO';
    //bootsrap succes es verde
    $_SESSION['message_type']='warning';

    //los mensajes antes del header

    header("Location:index.php");


}

?>

<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
         <div class="col.md-4 mx-auto">
            <div class=" .card.card-body">
                 <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                     <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre;?>"
                        class="form-control" placeholder="NOMBRE">
                     </div>
                     <div class="form-group">
                        <input type="text" name="apellido" value="<?php echo $apellido;?>"
                        class="form-control" placeholder="APELLIDO">
                     </div>
                     <div class="form-group">
                        <input type="text" name="departamento" value="<?php echo $departamento;?>"
                        class="form-control" placeholder="DEPARTAMENTO">
                     </div>
                     <div class="form-group">
                        <input type="date" name="fecha_nac" value="<?php echo $fecha_nac;?>"
                        class="form-control" placeholder="FECHA">
                     </div>
                     <button class="btn btn-primary"  name="actualizar">
                         Actualizar

                    </button>
                

                 </form>
            </div>
         </div>
    </div>

</div>


<?php include("includes/footer.php")?>


<!--$query="INSERT INTO empleados(nombre,apellido,departamento,fecha_nac) 
    values('$nom','$ape','$dep','$fecha_nac')";
    $result=mysqli_query($conn,$query);