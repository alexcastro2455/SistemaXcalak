<?php

@session_start(); //Valida la sesión iniciada
session_destroy(); //Destruye la sesión
header('Location: ../index.php'); //Redirecciona automáticamente al login

?>