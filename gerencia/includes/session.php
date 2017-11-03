<?php

@session_start(); //Valida la sesión iniciada

//Si no esta declarada se redirige a index
if(!isset($_SESSION['nombre'])) header('Location: ../index.php');


?>