<?php 

include("templates/cabecera.php");

include("admin/config/db.php");

$conn = conexion();
if (isset($_POST['submit'])){
    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
        
        $directorio = "../Archivos/";
        $nombre = ($_FILES['archivo']['name']);
        $subir = $directorio . $nombre;
        $fecha = date("y/m/d");

        if(move_uploaded_file($_FILES['archivo']['tmp_name'], $subir)){

            $query = "INSERT INTO archivos(usuario, fecha, ruta) VALUES ('correo@correo.com', '$fecha', '$subir')";

            if(mysqli_query($conn, $query)){
                echo "<script src='css/redireccionar.js'></script>";
            }

        }


    }
}

?>

    <script>window</script>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <div class="subir">
            <label for="archivo">
                <i class="fa-solid fa-upload"></i> <br><br><br>
                <b id="subir">Cargar un archivo desde el ordenador.</b>
            </label>
            <input type="file" id="archivo" name="archivo">
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Subir">    
        </div>

    </form>

<?php include("templates/pie.php")?>