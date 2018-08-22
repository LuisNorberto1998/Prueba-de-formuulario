<html>
    <head>
        <title> Prueba </title>
 </head>
    <body>
        <?php
            $bd_host="localhost";
            $bd_user="root";
            $bd_pass="";
            $bd_name="prubeaformulario";
            $busca="";
            $busca=htmlspecialchars($_POST['busqueda']);
            $conectar=mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name);
            if (mysqli_connect_errno())
            {
                # mysqli_connect_error - Devuelve una cadena con la descripcion del ultimo error de conexion
                printf("Fallo la contexion: %s/n", mysqli_connect_error());
                exit();
            }
            else if ($busca!=""){
                $consultar= "SELECT * FROM cliente WHERE Nombre LIKE '%$busca%'";
                if ($resultado = mysqli_query($conectar, $consultar))
                {
                    printf("<table><tr><th>Nombre</th> <th>Direccion</th> <th>Telefono</th> <th>E-mail</th></tr>");
                    while ($fila = mysqli_fetch_row($resultado))
                    {
                        printf("<tr><td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td></tr>", $fila[0],$fila[1],$fila[2],$fila[3]);
                    }
                    printf("</table>");
                    mysqli_free_result($resultado);
                }
            }
            mysqli_close($conectar);
        ?>
        <p>&nbsp;</p>
        <p align="center"><a href="clientes.php" onclick="return confirm('¿Realmente deseas eliminar este articulo?')">Volver</a></p>
        <p align="center"><a href="registro.php">Registrar nuevos clientes</a></p>
        <p align="center"><a href="perfil.php" >Perfil</a></p>

    </body>
</html>