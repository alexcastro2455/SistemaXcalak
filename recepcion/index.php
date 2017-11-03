<?php include('includes/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Hotel Xcalak | Recepción</title>
    <link href="css/bootstrap.css" rel="stylesheet"><!--Hoja de estilos de bootstrap-->
    <link rel="stylesheet" href="css/stylesheet.css"><!--Hoja de estilos extra-->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css"> <!--Iconos-->
    <link rel="stylesheet" type="text/css" href="css/cssMenuAdmin.css">
    <link rel="shortcut icon" href="img/book.png"><!--Icono de pestaña-->
</head>
<body style="background: #e5e5e5;">
  
  <?php include('includes/navbar_r.php'); ?>

    <section class="container-fluid">
    
      <div class="row"><!--Fecha y usuario-->
        <div class="col-md-5 col-md-offset-2">
          <h3><b>Fecha:</b> <?php echo date('d/M/Y'); ?></h3>
        </div>
        <div class="col-md-4">
          <h3><b>Bienvenido <?php echo $_SESSION['nombre']; ?></b></h3>
        </div>
      </div><!--Fecha y usuario-->

      <br><!--Espacio-->
      <br><!--Espacio-->

      <div class="row"><!--Icono y titulo de seccion-->
        <div align="center">          
          <div>
            <img src="img/book.png" class="iconPresentation">
          </div>
          <br><!--Espacio-->
          <label class="labelPresentation">RECEPCIÓN<label/>
        </div>
      </div><!--Icono y titulo de seccion-->
     
    </section>

    <!--Mensaje de cerrar sesion-->
    <div class="modal fade" id="logOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div align="center" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><b>PARECE QUE YA TE VAS...</b></h4>
          </div>
          <div align="center" class="modal-body">
            <h4>¿Realmente deseas salir?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <a href="includes/salir.php" type="button" class="btn btn-danger">Salir</a>
          </div>
        </div>
      </div>
    </div>

    <!--Pie de página-->
    <?php include('includes/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>