<?php 
    require ("adm/common.php");
    
    if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    $usuario = $_SESSION['usuario'];
    $nome = $usuario->getNome($db);

    if(isset($_POST["excluir_conta"])) {
        # delete account
        $id = $usuario->getID();
        $query_params = array(
            ':idusuario' => $id
        );


        $query = "DELETE FROM usuarioesportes WHERE IDUsuario = :idusuario";
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }


        $query = "DELETE FROM usuariooutros WHERE IDUsuario = :idusuario";
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        $query = "DELETE FROM usuariofilmes WHERE IDUsuario = :idusuario";
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        $query = "DELETE FROM usuariojogos WHERE IDUsuario = :idusuario";
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        $query = "DELETE FROM users WHERE ID = :idusuario";
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex);
        }

        session_destroy();
        header("Location: index.php"); 
        die("home.php"); 
    }
    if(isset($_POST["logout"])) {
        # efetua logout
        session_destroy();
        header("Location: index.php"); 
        die("home.php");
    }

?> 

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Never Alone &ndash; </title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="css/side-menu.css">
</head>

<body>
    <div id="layout">
        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>

        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <a class="pure-menu-heading" href="#">Never Alone</a>

                <ul>
                    <li ><a href="home.php">Página Inicial</a></li>
                    <li><a href="addentretenimento.php">Adicionar Entretenimento</a></li>
                    <li><a href="listaentretenimento.php">Lista Entretenimento</a></li>
                    <li><a href="buscarusuario.php">Buscar Usuários</a></li>
                    <li class="menu-item-divided pure-menu-selected"><a href="#">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">

                <h2 class="content-subhead">Opções:</h2>
                <form  method="post" id="logout" > 
                    <p><label>Sair do Never Alone :(<br></label><button type="submit" name="logout" class="pure-button">Sair</button></p>
                </form>
                <form  method="post" id="delete_account" > 
                    <p><label>Excluir Conta D:<br></label><button type="submit" name="excluir_conta" class="pure-button">Excluir</button></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
