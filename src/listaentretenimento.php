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

    $listaFilmes = $usuario->getListaFilmes($db);
    $listaJogos = $usuario->getListaJogos($db);
    $listaEsportes = $usuario->getListaEsportes($db);
    $listaOutros = $usuario->getListaOutros($db);
?> 

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Never Alone &ndash; </title>

    <link rel="stylesheet" href="add/css/grid_sytles.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="css/side-menu.css">

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script  type="text/javascript" src="add/js/data-ajax-handler.js"></script>
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
                    <li class="menu-item-divided pure-menu-selected"><a href="listaentretenimento.php">Lista Entretenimento</a></li>
                    <li><a href="buscarusuario.php">Buscar Usuários</a></li>
                    <li><a href="opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">
                <h2 class="content-subhead">Lista de Entretenimento:</h2>
                <h3>Filmes:</h3>
                <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                    <thead>
                        <tr>
                            <th class="ui-state-default">Nome</th>
                            <th class="ui-state-default">Tipo</th>
                            <th class="ui-state-default">Tema</th>
                            <th class="ui-state-default">Ano</th>
                            <th class="ui-state-default">Remover</th>
                        </tr>
                    </thead>
                    <tbody id="results-list">
                        <?php foreach($listaFilmes as $row): ?>
                            <?php echo ('<tr id="' . $row['ID'] . '">') ; ?>
                            <?php echo ('<td>' . $row['nome'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['tipo'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['tema'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['ano'] . '</td>'); ?>
                            <?php echo ('<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="remover(\'filmes\', this.value)">-</button</center></td></tr>'); ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <h3>Jogos:</h3>
                <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                    <thead>
                        <tr>
                            <th class="ui-state-default">Nome</th>
                            <th class="ui-state-default">Tipo</th>
                            <th class="ui-state-default">Qtd Participantes</th>
                            <th class="ui-state-default">Tema</th>
                            <th class="ui-state-default">Remover</th>
                        </tr>
                    </thead>
                    <tbody id="results-list">
                        <?php foreach($listaJogos as $row): ?>
                            <?php echo ('<tr id="' . $row['ID'] . '">') ; ?>
                            <?php echo ('<td>' . $row['nome'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['tipoJogo'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['qtdParticipantes'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['temaJogo'] . '</td>'); ?>
                            <?php echo ('<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="remover(\'jogos\', this.value)">-</button</center></td></tr>'); ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <h3>Esportes:</h3>
                <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                    <thead>
                        <tr>
                            <th class="ui-state-default">Nome</th>
                            <th class="ui-state-default">Qtd Participantes</th>
                            <th class="ui-state-default">Remover</th>
                        </tr>
                    </thead>
                    <tbody id="results-list">
                        <?php foreach($listaEsportes as $row): ?>
                            <?php echo ('<tr id="' . $row['ID'] . '">') ; ?>
                            <?php echo ('<td>' . $row['nome'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['qtdParticipantes'] . '</td>'); ?>
                            <?php echo ('<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="remover(\'esportes\', this.value)">-</button</center></td></tr>'); ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <h3>Outros:</h3>
                <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                    <thead>
                        <tr>
                            <th class="ui-state-default">Nome</th>
                            <th class="ui-state-default">Dados Adicionais</th>
                            <th class="ui-state-default">Remover</th>
                        </tr>
                    </thead>
                    <tbody id="results-list">
                        <?php foreach($listaOutros as $row): ?>
                            <?php echo ('<tr id="' . $row['ID'] . '">') ; ?>
                            <?php echo ('<td>' . $row['nome'] . '</td>'); ?>
                            <?php echo ('<td>' . $row['dadosAdicionais'] . '</td>'); ?>
                            <?php echo ('<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="remover(\'outros\', this.value)">-</button</center></td></tr>'); ?>
                        <?php endforeach ?>
                    </tdy>
                </table>
                <p id="saida"></p>
            </div>
        </div>
    </div>
</body>
</html>
