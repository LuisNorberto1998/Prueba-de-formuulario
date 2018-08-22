<html>
    <head>
        <title>Eliminar registros - PHP con MySQL</title>
 </head>
    <body>
        <?php
        $bd_host="localhost";
        $bd_user="root";
        $bd_pass="";
        $bd_name="prubeaformulario";
        $nombre = htmlspecialchars($_POST['nombre']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $email = htmlspecialchars ($_POST['email']);
        
        $conectar=mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name);
            if (mysqli_connect_errno())
            {
                # mysqli_connect_error - Devuelve una cadena con la descripcion del ultimo error de conexion
                printf("Fallo la contexion: %s/n", mysqli_connect_error());
                exit();
            }
            
        # mysqli_set_chatser - Establece el conjunto de caracteres prederterminado del cliente
        mysqli_set_charset($conectar, "utf8");
        $modificar = "UPDATE cliente SET Nombre='$nombre', Direccion='$direccion', Telefono='$telefono' WHERE Email = '$email'";
        if($resultado = mysqli_query($conectar, $modificar))
        {
            if(mysqli_affected_rows($conectar) == 0)
            {
                printf("El Usuario no existe");
            }
            else
            {
                printf("Se ha(n) modificado %u registro(s)", mysqli_affected_rows($conectar));
            }
        }
        else
        {
            printf("ERROR al modificar la base de datos");
        }
        mysqli_close($conectar);
        ?>
        <p align="center"><a href="consulta.php" onclick="return confirm('¿Realmente deseas regresar?')">Volver</a></p>
        
    </body>
</html>