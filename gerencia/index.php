<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<body>
  
  <div class="">
    <div class="row">
        <!-- //////////////////////////////////////////////// -->
        <!-- //////////////////////////////////////////////// -->
        <!-- Mi menu -->
        <div class="">
          <?php include('includes/menu.php'); ?>
        </div>
    
      <!-- longitud de mi segunda parte de la págia -->
      <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8 affix-content" style="margin-top:70px;">
            <div class="container">
                <!--  row 1 -->
                <div class="row">

                  <div class="col-md-6">
                    <h3><label>Puesto: <span><?php echo $_SESSION['puesto']; ?><span/></label></h3>
                    <h3><?php echo date('d - M - Y'); ?></h3>
                  </div>
                  <div class="col-md-6">
                    <h3><label>Bienvenido <span><span/><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></label></h3>
                  </div>

                </div>

                <!--  row 1 -->
                <div class="row">
                  
                  <div class="col-md-8">
                      <center class="">
                        <span class="glyphicon glyphicon-user iconPresentation"></span>
                        <br>
                        <label class="label label-default labelPresentation"><?php echo $_SESSION['puesto']; ?><label/>
                      </center>
                  </div>

                </div>
            </div>
        </section>
    </div>

  </div>
    <!--Pie de página-->
    <?php include('includes/footer.php'); ?>

</body>
</html>