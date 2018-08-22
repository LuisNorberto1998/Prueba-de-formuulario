<!DOCTYPE html>
<html>
    <head>
        <title>Loguear</title>
    </head>
    <body>
        <?php
            try
                {
                #Las conexiones se establecen creando instancias de la clase base PDO. El constructr acepta parametros para especificar el origen de la base de datos (concido como DSN) y, opcionalmente, el nombre de usuario y la contraseña (si la hubiera).
                $conMySQL = new PDO("mysql:host=localhost; port=3306; dbname=prubeaformulario","root","");
                # PDO::setAttribute - Establece un atributo.
                $conMySQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conMySQL->exec("SET CHARACTER SET UTF8");
                $sentenciaSQL = "SELECT * FROM usuarios WHERE usuario = :login AND contra = :passw";
                # PDO::prepare - Prepara una sentencia para su ejecucion y devuelve un objeto sentencia.
                $sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
                # htmlspecialchars - convierte caracteres especiales en  entidades HTML.
                # addslashes - Escapa un string con barras invertidas.
                $log=htmlspecialchars(addslashes($_POST["email"]));
                $pas=htmlspecialchars(addslashes($_POST["password"]));
                # PDOStatement:execute - Ejecuta una sentencia preparada.
                $sentenciaPrep->execute(array(":login"=>$log, "passw"=>$pas));
                # PDOStatement::rowCount - Devuelve el numero de filas afectadas por la ultima sentencia SQL.
                $numRegistros = $sentenciaPrep->rowCount();
                if ($numRegistros !=0)
                {
                    session_start();
                    $_SESSION["user"]=$_POST["email"];
                    header("Location:zona-vip.php");
                }
                else
                {
                    #header - Enviar sin format HTTP.
                    header("Location:login.html");
                }
            }
        catch(Exception $e)
        {
            #die o exit - Imprime un mensaje y termina el script anual
            die("Error: " . $e->getMessage());
        }
        finally{    $conMySQL = null;   }
        ?>          
    </body>
</html>