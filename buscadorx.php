<html>
    <head>
        <title>Buscador</title>
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
                mysqli_set_charset($conectar, "utf8");
                $consultar= "SELECT * FROM cliente WHERE Nombre LIKE '%$busca%' ORDER BY Nombre";
                if ($resultado = mysqli_query($conectar, $consultar))
                {
                    printf("<table width='1166' border='1' id='tab'>
                               <tr>
                                 <td width='19'>Nombre</td>
                                 <td width='61'>Direccion</td>
                                 <td width='157'>Telefono</td>
                                 <td width='221'>E-mail</td>
                               </tr>");
                    while ($fila = mysqli_fetch_row($resultado))
                    {
                        printf(" 
                           <tr>
                               <td class='estilo-tabla' align='center'>%s</td>
                               <td class='estilo-tabla' align='center'>%s</td>
                               <td class='estilo-tabla' align='center'>%s</td>
                               <td class='estilo-tabla' align='center'>%s</td>
                           </tr>", $fila[0],$fila[1],$fila[2],$fila[3]);
                    }
                    printf("</table>");
                    mysqli_free_result($resultado);
                }
            }
            mysqli_close($conectar);
        ?>
        <p>&nbsp;</p>
        <p align="center"><a href="formulario.html" onclick="return confirm('¿Deseas volver a la pagina principal?')">Volver</a></p>
        <p align="center"><a href="formulario.html">Registrar nuevos clientes</a></p>
        <p align="center"><a href="perfil.php" >Perfil</a></p>

    </body>
</html>