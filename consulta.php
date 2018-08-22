<html>
    <head>
        <link type="text/css" rel="stylesheet" href="diseno.css">
        <title>Consultas</title>
 </head>
    <body>    
        <?php
        $bd_host="localhost";
        $bd_user="root";
        $bd_pass="";
        $bd_name="prubeaformulario";
        $conectar=mysqli_connect($bd_host,$bd_user,$bd_pass,$bd_name);
            if (mysqli_connect_errno())
            {
                # mysqli_connect_error - Devuelve una cadena con la descripcion del ultimo error de conexion
                printf("Fallo la contexion: %s/n", mysqli_connect_error());
                exit();
            }
            
            # mysqli_set_chatser - Establece el conjunto de caracteres prederterminado del cliente
            
            mysqli_set_charset($conectar, "utf8");
            $consultar = 'SELECT * FROM cliente';
            
            # my sqli_query - Realiza una consulta a a base de datos
            
            if ($resultado = mysqli_query($conectar, $consultar))
            {
                # mysqli_fetch_row - Obtener una fila de resultados como un array enumerado
                printf("<table width='1166' border='1' id='tab'>
                               <tr>
                                 <th width='19'>Nombre</th>
                                 <th width='61'>Direccion</th>
                                 <th width='157'>Telefono</th>
                                 <th width='221'>E-mail</th>
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
                # mysqli_free_result - Libera la memoria asociada a un resultado
                mysqli_free_result($resultado);
            }
            # mysqli_close - Cierra una conexión previamente abierta a una base de datos
            mysqli_close($conectar);
        ?>
    </body>
</html>