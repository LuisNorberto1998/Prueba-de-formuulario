<!DOCTYPE html>
<html>
    <head>
        <title>Zona VIP</title>

          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
          <link rel="stylesheet" href="login.css" type="text/css"> 
    </head>
    <body>
        <?php 
            # session_start - Inciar una nueva sesion o reanudar la existente.
            session_start();
            #isset - Determina si una variable esta definida y no es NULL
            #$_SESSION - Variables de sesion.
            if(!isset($_SESSION["user"]))
            {
                # header - Enviar encabezado sin formato PHP
                header("Location:login.html");
            }
        ?>
        <div class="py-5 text-white opaque-overlay w-100 h-100" style="background-image: url('Imagenes/FondoPage.png');" >
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid d-block" src="Imagenes/logoprincipal.png" width="200 800 800" height="800"> </div>
                    <div class="col-md-6">
                        <h1>Zona VIP</h1>
                        <h2 class="text-gray-dark">StorePhone Doctor</h2>
                        <p class="lead mb-4">Descubre la magia de la Tecnologia</p>
                        <?php
                        # printf - Imprimir una cadena con formato
                        printf("Usuario: %s", $_SESSION["user"]);
                        ?>
                        <br><a href="cerrar-sesion.php">Cerrar Sesi&oacute;n</a>
                    </div>
          </div>
        </div>
      </div>
    </body>
</html>