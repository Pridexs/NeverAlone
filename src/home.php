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
    <link rel="stylesheet" href="css/marketing.css">
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
                <h2 class="content-subhead">Simples assim</h2>
                <p>
                    Esta é a página inicial do Never Alone! Você pode agora navegar à vontade, cadastrar seus hobbies, seus filmes favoritos, jogos, tudo
                    aquilo que caracterize você. O trabalho pesado pode deixar por nossa conta ;)<br/><br/> Caso ainda estejas com dúvidas, basta seguir as
                    instruções abaixo.<br/>Boa aventura!
                </p>

                <div class="pure-g divTuto">
                    <div class="pure-u-1-4 textTuto">
                        <img class="pure-img-responsive" src="img/common/editar.png" alt="editar">
                        <p align="justify">
                            <strong>Passo 1</strong><br/>
                            Adicione seus interesses! No menú ao lado você pode facilmente adicionar um entretenimento,
                            e caso ele não exista em nosso banco de dados, você pode adicionar um novo!
                        </p>
                    </div>
                    <div class="pure-u-1-4 textTuto">
                        <img class="pure-img-responsive" src="img/common/buscar.png" alt="buscar">
                        <p align="justify">
                            <strong>Passo 2</strong><br/>
                            Chegou a grande hora! Clicando em selecionando "Buscar Usuários" no menú, nós moveremos montanhas para achar o maior número
                            de usuários que tenham interesses em comum com o seu! Caso você venha a adicionar algum entretenimento após, basta realizar 
                            uma nova busca!
                        </p>
                    </div>
                    <div class="pure-u-1-4 textTuto">
                        <img class="pure-img-responsive" src="img/common/adicionar.png" alt="adicionar">
                        <p align="justify">
                            <strong>Passo 3</strong><br/>
                            Pronto! Você acaba de achar uma pessoa com interesse semelhante ao seu! Tudo isso em apenas 3 passos! Entre em contato e aproveite!
                        </p>
                    </div>
                    <div class="pure-u-1-4 textTuto">
                        <img class="pure-img-responsive" src="img/common/meet.png" alt="encontrar">
                        <p align="justify">
                            <strong>Ei, pera aí!</strong><br/>
                            Conheça essa pessoa, marque um encontro, saia, se divirta. Nós apenas criamos uma ferramenta,
                             não se esqueça que a vida não é só aqui na internet!
                             Aproveite!
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/ui.js"></script>

</body>
</html>
