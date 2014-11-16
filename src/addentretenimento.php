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
                    <li class="menu-item-divided pure-menu-selected"><a href="#">Adicionar Entretenimento</a></li>
                    <li><a href="listaentretenimento.php">Lista Entretenimento</a></li>
                    <li><a href="#">Buscar Usuários</a></li>
                    <li><a href="opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">

                <h2 class="content-subhead">Adicionar item a lista de entretenimento:</h2>
                <ul>
                    <li>
                        <form  action = "add/filme.php" > 
                            <p><button type="submit" class="pure-button">Filme</a></button></p>
                        </form>
                    </li>
                    <li>
                         <form  action = "add/jogo.php" >
                            <p><button type="submit" class="pure-button">Jogo</button></p>
                        </form>
                    </li>
                    <li>
                         <form  action = "add/esporte.php" >
                            <p><button type="submit" class="pure-button">Esporte</button></p>
                        </form>
                    </li>
                    <li>
                         <form  action = "add/outro.php" > 
                            <p><button type="submit" class="pure-button">Outro</button></p>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
