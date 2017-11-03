<?php

@session_start(); //Valida la sesión iniciada

//Si no existe sesión iniciada, se redirecciona al Login
if(!isset($_SESSION['nombre'])) header('Location: ../index.php');

?>