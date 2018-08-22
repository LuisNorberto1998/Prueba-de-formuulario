<html>
    <head>
        <title>Nuevo cliente</title>
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
        
        $mysqli=mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name);
            if (mysqli_connect_errno())
            {
                # mysqli_connect_error - Devuelve una cadena con la descripcion del ultimo error de conexion
                printf("Fallo la contexion: %s/n", mysqli_connect_error());
                exit();
            }
            
        # mysqli_set_chatser - Establece el conjunto de caracteres prederterminado del cliente
        mysqli_set_charset($mysqli, "utf8");
        $sql = "INSERT INTO cliente (Nombre,Direccion,Telefono,Email) VALUES ('$nombre', '$direccion', '$telefono', '$email')";
        $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
        echo "¡Gracias! Hemos recibido sus datos.\n";
        mysqli_close($mysqli);
        ?>
        <p align="center"><a href="formulario.html" onclick="return confirm('¿Realmente deseas regresar?')">Volver</a></p>
        
    </body>
</html>