
   <?php
   include("db.php")
   ?>
   <?php include("includes/header.php")?>

   <?php include("includes/footer.php")?>
   
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['mensaje'])){?>

           <!-- codigo bootstrp para el boton -->
            <div class="alert alert-<?php echo $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php session_unset();} ?>
            
            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    

                    
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control"
                        placeholder="NOMBRE">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control"
                        placeholder="APELLIDO">
                    </div>
                    <div class="form-group">
                        <input type="text" name="departamento" class="form-control"
                        placeholder="DEPARTAMENTO">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha_nac" class="form-control"
                        placeholder="YYYY-MM-DD">
                    </div>
                    <input type="submit" class="btn btn-primary"
                    name="enviar" value="SUSCRIBIR">
                    
                </form>
            
            </div>


        
         </div>

        <div class="col-md-8">
            <!-- para que nos devuelva la consulta en una tabla -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DEPARTAMENTO</th>
                    <th>FECHA NACIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $query= "SELECT * FROM empleados";
                        $result=mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)){?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['departamento'] ?></td>
                            <td><?php echo $row['fecha_nac'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id'];?>"class="btn btn-info">
                                    <i class="fas fa-user-edit"> MODIFICAR</i>
                                </a>
                            </td>
                            <td>
                                <a href="eliminar.php?id=<?php echo $row['id'];?>"class="btn btn-danger">
                                <i class="fas fa-user-slash"><span style="color:black"> ELIMINAR</span></i>
                                </a>
                            </td>


                        </tr>

                        <?php }?>
                </tbody>

            </table>


        </div>

    </div>

</div>
       
