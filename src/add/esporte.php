<?php 
    require ("../adm/common.php");
    
    if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    $usuario = $_SESSION['usuario'];
    $nome = $usuario->getNome($db);

?> 

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Never Alone &ndash;</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="../css/side-menu.css">
    <link rel="stylesheet" href="css/grid_sytles.css">


    <script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script  type="text/javascript" src="js/jquery-search.js"></script>
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
                    <li ><a href="../home.php">Página Inicial</a></li>
                    <li class="menu-item-divided pure-menu-selected"><a href="../addentretenimento.php">Adicionar Entretenimento</a></li>
                    <li><a href="#">Excluir Entretenimento</a></li>
                    <li><a href="#">Buscar Usuários</a></li>
                    <li><a href="../opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">
                <h2 class="content-subhead">Adicionar um Esporte na lista de entretenimento:</h2>
                <div id="dataTable">

                    <div class="ui-grid ui-widget ui-widget-content ui-corner-all">

                        <div class="ui-grid-header ui-widget-header ui-corner-top clearfix">

                            <div class="header-left">
                                <!-- Left side of table header -->
                            </div>

                            <div class="header-right">
                                Busca: <input style="width:150px;" id="searchData" type="text"></div>
                            </div>

                        <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                            <thead>
                                <tr>
                                    <th class="ui-state-default">Nome</th>
                                    <th class="ui-state-default">Quantidade Participantes</th>
                                    <th class="ui-state-default">Adicionar</th>
                                </tr>
                            </thead>
                            <tbody id="results"></tbody>
                        </table>
                        <div class="ui-grid-footer ui-widget-header ui-corner-bottom">
                            <div class="grid-results">Resultados </div>
                        </div>
                    </div>
                    <p id="saida"></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
