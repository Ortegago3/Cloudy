<?php include("templates/cabecera.php"); 

    include 'admin/config/db.php';
    $conn = conexion();
    $archivos = "SELECT * FROM archivos WHERE usuario='correo@correo.com'";
?>

    <article class="archivos">
        <div class="boton-subir">
            <a href="subir.php">
                <div class="boton-contenido">
                    <i class="fa-solid fa-angle-up"></i><b>Subir</b>
                </div>
            </a>
        </div>
        
        <div class="archivos-usuario container">
            <?php $resultado = mysqli_query($conn, $archivos);

            while($row=mysqli_fetch_assoc($resultado)) {
            ?>
           <div><?php echo $row["ruta"] ?></div>
            <?php } mysqli_free_result($resultado);?>
        </div>
    </article>    

        
<?php include("templates/pie.php"); ?>

