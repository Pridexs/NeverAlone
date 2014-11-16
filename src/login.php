<?php
	require ("adm/common.php");

	if(empty($_SESSION['user'])) { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    }

    $usuario = new Usuario($_SESSION['user']['email'], $_SESSION['user']['id']);
    $_SESSION['usuario'] = $usuario;

    header("Location: home.php"); 
    die("Redirecting to home.php"); 
?>