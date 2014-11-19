<?php 
    require ("../adm/common.php");
    
    if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    $usuario = $_SESSION['usuario'];
    $nome = $usuario->getNome($db);
    $registered = false;

    // Cadastro de Filme
    if(!empty($_POST)) {
        $nome_parametro = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $tema = $_POST['tema'];
        $data = $_POST['ano'];

        $query = "INSERT INTO Filmes (`nome`, `tipo`, `ano`, `tema`) VALUES (:nome, :tipo, :ano, :tema)";
        $query_params = array(
            ':nome' => $nome_parametro,
            ':tipo' => $tipo,
            ':ano' => $data,
            ':tema' => $tema
        );
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }
    }

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


    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script  type="text/javascript" src="js/data-ajax-handler.js"></script>
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
                    <li><a href="../listaentretenimento.php">Lista Entretenimento</a></li>
                    <li><a href="../buscarusuario.php">Buscar Usuários</a></li>
                    <li><a href="../opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">
                <h2 class="content-subhead">Adicionar um Filme na lista de entretenimento:</h2>
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
                                    <th class="ui-state-default">Tipo</th>
                                    <th class="ui-state-default">Tema</th>
                                    <th class="ui-state-default">Ano</th>
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
                    <p>Não encontrou o que queria ? <button id="buttonshow" class="pure-button" onClick="toggleForm()" >Adicione!</button></p>
                    <div id="cadastroform">
                        <form method="post" id="registerForm"> 
                            <p class="contact"><label for="nome">Nome</label></p> 
                            <input id="name" name="nome" placeholder="Nome" required="" tabindex="1" type="text">

                            <p class="contact"><label for="nome">Tipo</label></p> 
                            <input id="name" name="tipo" placeholder="Tipo" required="" tabindex="1" type="text"> 

                            <p class="contact"><label for="nome">Tema</label></p> 
                            <input id="name" name="tema" placeholder="Tema" required="" tabindex="1" type="text"> 
                             
                            <p class="contact"><label for="nome">Ano</label></p> 
                            <input type="number" name="ano">

                            <input class="pure-button" name="submit" id="submit" tabindex="5" value="Registrar!" type="submit">
                        </form>
                    </div>
                    <?php if($registered) echo '<p>Registrado com sucesso!</p>'; ?>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#cadastroform").toggle();
    });

    function toggleForm() {
        $("#cadastroform").toggle();
    }
    
</script>

</body>
</html>
