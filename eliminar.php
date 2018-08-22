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
        $email=htmlspecialchars($_POST['correo']);
        
        $conectar=mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name);
            if (mysqli_connect_errno())
            {
                # mysqli_connect_error - Devuelve una cadena con la descripcion del ultimo error de conexion
                printf("Fallo la contexion: %s/n", mysqli_connect_error());
                exit();
            }
            
        # mysqli_set_chatser - Establece el conjunto de caracteres prederterminado del cliente
        mysqli_set_charset($conectar, "utf8");
        $eliminar = "DELETE FROM cliente WHERE Email = '$email'";
        if($resultado = mysqli_query($conectar, $eliminar))
        {
            if(mysqli_affected_rows($conectar) == 0)
            {
                printf("El Email no existe");
            }
            else
            {
                printf("Se ha(n) eliminado %u registro(s)", mysqli_affected_rows($conectar));
            }
        }
        else
        {
            printf("ERROR al eliminar de la base de datos");
        }
        mysqli_close($conectar);
        ?>
        <p align="center"><a href="consulta.php" onclick="return confirm('¿Realmente deseas regresar?')">Volver</a></p>
        
    </body>
</html>