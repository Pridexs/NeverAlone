<?php 
    require ("adm/common.php");
    
    if(empty($_SESSION['usuario'])) { 
        #header("Location: index.php"); 
        die("home.php"); 
    }

    $usuario = $_SESSION['usuario'];

    $nome = $usuario->getNome($db);
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
                    <li class="menu-item-divided pure-menu-selected"><a href="home.php">Página Inicial</a></li>
                    <li><a href="addentretenimento.php">Adicionar Entretenimento</a></li>
                    <li><a href="listaentretenimento.php">Lista Entretenimento</a></li>
                    <li><a href="buscarusuario.php">Buscar Usuários</a></li>
                    <li><a href="opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h1>Bem Vindo</h1>
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?>!</h2>
            </div>

            <div class="content">
                <h2 class="content-subhead">Informações:</h2>
                <p>
                    Bla bla bla.
                </p>

                <h2 class="content-subhead">Mais informações:</h2>
                <p>
                    Bla bla bla.
                </p>

                <div class="pure-g">
                    <div class="pure-u-1-4">
                        <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2875/9069037713_1752f5daeb.jpg" alt="Peyto Lake">
                    </div>
                    <div class="pure-u-1-4">
                        <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2813/9069585985_80da8db54f.jpg" alt="Train">
                    </div>
                    <div class="pure-u-1-4">
                        <img class="pure-img-responsive" src="http://farm6.staticflickr.com/5456/9121446012_c1640e42d0.jpg" alt="T-Shirt Store">
                    </div>
                    <div class="pure-u-1-4">
                        <img class="pure-img-responsive" src="http://farm8.staticflickr.com/7357/9086701425_fda3024927.jpg" alt="Mountain">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/ui.js"></script>

</body>
</html>
