<?php

	require('..\..\adm\common.php');
	if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    $value = $_GET["value"];
    $tabela = $_GET["tabela"];
    $usuario = $_SESSION['usuario'];
    $id = $usuario->getID();

    $query = "";
    if($tabela === "filmes") {
    	// Checar se ja foi adicionado
    	$query_aux = "SELECT * FROM usuariofilmes WHERE IDUsuario = :ID1 AND IDFilme = :ID2";
        $query = "DELETE FROM usuariofilmes WHERE IDUsuario = :ID1 AND IDFilme = :ID2";
    } else if ($tabela === "jogos") {
    	$query_aux = "SELECT * FROM usuariojogos WHERE IDUsuario = :ID1 AND IDJogo = :ID2";
        $query = "DELETE FROM usuariojogos WHERE IDUsuario = :ID1 AND IDJogo = :ID2";
    } else if ($tabela === "esportes") {
    	$query_aux = "SELECT * FROM usuarioesportes WHERE IDUsuario = :ID1 AND IDEsporte = :ID2";
        $query = "DELETE FROM usuarioesportes WHERE IDUsuario = :ID1 AND IDEsporte = :ID2";
    } else {
    	$query_aux = "SELECT * FROM usuariooutros WHERE IDUsuario = :ID1 AND IDOutro = :ID2";
        $query = "DELETE FROM usuariooutros WHERE IDUsuario = :ID1 AND IDOutro = :ID2";
    }

    $query_params = array(
    	':ID1' => $id,
    	':ID2' => $value
    );
    
    try {
        $stmt_aux = $db->prepare($query_aux); 
        $result_aux = $stmt_aux->execute($query_params); 
    } catch(PDOException $ex) { 
        die("Failed to run query." . $ex); 
    }

    if($stmt_aux->rowCount() == 0) {
    	echo ("Esse elemento já foi removido!");
    } else {
	    try {
	        $stmt = $db->prepare($query); 
	        $result = $stmt->execute($query_params); 
	    } catch(PDOException $ex) { 
	        die("Failed to run query." . $ex); 
	    }
    	echo("Removido com sucesso!");
    }

?>