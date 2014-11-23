<?php
    function buscaUsuariosEmComum($idusuario, $db, $raio) {

        $query = "SELECT id, email, nome, estado, cidade, dataNasc, sexo, numeroCelular, pais FROM users uf WHERE (EXISTS (SELECT * from usuariofilmes u1 join (SELECT * from usuariofilmes WHERE IDUsuario = :idUsuario) AS u2 ON u1.IDusuario != u2.IDUsuario AND u1.IDFilme = u2.IDFilme WHERE uf.id = u1.IDUsuario AND uf.estado = (SELECT estado FROM users WHERE users.id = u2.IDUsuario)) OR EXISTS (SELECT * from usuariojogos u1 join (SELECT * from usuariojogos WHERE IDUsuario = :idUsuario) AS u2 ON u1.IDusuario != u2.IDUsuario AND u1.IDJogo = u2.IDJogo WHERE uf.id = u1.IDUsuario AND uf.estado = (SELECT estado FROM users WHERE users.id = u2.IDUsuario )) OR EXISTS (SELECT * from usuarioesportes u1 join (SELECT * from usuarioesportes WHERE IDUsuario = :idUsuario) AS u2 ON u1.IDusuario != u2.IDUsuario AND u1.IDEsporte = u2.IDEsporte WHERE uf.id = u1.IDusuario AND uf.estado = (SELECT estado FROM users WHERE users.id = u2.IDUsuario)) OR EXISTS (SELECT * from usuariooutros u1 join (SELECT * from usuariooutros WHERE IDUsuario = :idUsuario) AS u2 ON u1.IDusuario != u2.IDUsuario AND u1.IDOutro = u2.IDOutro WHERE uf.id = u1.IDUsuario)) AND uf." . $raio . " = (SELECT " . $raio ." FROM users uc WHERE uc.id = :idUsuario)";

        $query_params = array(
            ':idUsuario' => $idusuario
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    function getFilmesEmComum($db, $idusuario, $idusuario2) {

        $query = "SELECT id, nome FROM filmes WHERE id in (SELECT uf1.IDFilme FROM usuariofilmes uf1 JOIN (SELECT IDFilme FROM usuariofilmes WHERE IDUsuario = :idUsuario2) AS uf2 ON uf1.IDFilme = uf2.IDFilme WHERE uf1.IDUsuario = :idUsuario)";
        $query_params = array(
            ':idUsuario2' => $idusuario2,
            ':idUsuario' => $idusuario
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    function getEsportesEmComum($db, $idusuario, $idusuario2) {
        $query = "SELECT id, nome FROM esportes WHERE id in (SELECT uj1.IDEsporte FROM usuarioesportes uj1 JOIN (SELECT IDEsporte FROM usuarioesportes WHERE IDUsuario = :idUsuario2) AS uj2 ON uj1.IDEsporte = uj2.IDEsporte WHERE uj1.IDUsuario = :idUsuario)";
        $query_params = array(
            ':idUsuario2' => $idusuario2,
            ':idUsuario' => $idusuario
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    function getJogosEmComum($db, $idusuario, $idusuario2) {
        $query = "SELECT id, nome FROM jogos WHERE id in (SELECT uj1.IDJogo FROM usuariojogos uj1 JOIN (SELECT IDJogo FROM usuariojogos WHERE IDUsuario = :idUsuario2) AS uj2 ON uj1.IDJogo = uj2.IDJogo WHERE uj1.IDUsuario = :idUsuario)";
        $query_params = array(
            ':idUsuario2' => $idusuario2,
            ':idUsuario' => $idusuario
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    function getOutrosEmComum($db, $idusuario, $idusuario2) {
        $query = "SELECT id, nome FROM outros WHERE id in (SELECT uj1.IDOutro FROM usuariooutros uj1 JOIN (SELECT IDOutro FROM usuariooutros WHERE IDUsuario = :idUsuario2) AS uj2 ON uj1.IDOutro = uj2.IDOUtro WHERE uj1.IDUsuario = :idUsuario)";
        $query_params = array(
            ':idUsuario2' => $idusuario2,
            ':idUsuario' => $idusuario
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            $registered = true;
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    require ("adm/common.php");
    
    if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    $usuario = $_SESSION['usuario'];
    $nome = $usuario->getNome($db);
    $usuarioID = $usuario->getID();

    if(isset($_POST["buscar"])) {
        $raio = $_POST['raio'];
        $usuariosEmComum = buscaUsuariosEmComum($usuarioID, $db, $raio);
    }

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <li><a href="listaentretenimento.php">Lista Entretenimento</a></li>
                    <li class="meno-item-divided pure-menu-selected"><a href="buscarusuario.php">Buscar Usuários</a></li>
                    <li><a href="opcoes.php">Opções</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2><?php echo htmlentities($nome, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="content">
                <h2 class="content-subhead">Buscar Usuários:</h2>
                <p>Selecione o raio da buscar:</p>
                <form method="post">
                <fieldset> 
                    <select class="select-style" name="raio">
                    <option value="cidade">Cidade</option>
                    <option value="estado">Estado</option>
                    <option value="pais" >Pais</option>
                    </select>
                </fieldset>
                <button type="submit" name="buscar" class="pure-button">Buscar</button>
                </form>
                
                <?php if(isset($usuariosEmComum)): ?>
                    <?php foreach($usuariosEmComum as $row): ?>
                        
                        <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                            <thead>
                                <tr>
                                    <th class="ui-state-default">Nome</th>
                                    <th class="ui-state-default">Email</th>
                                    <th class="ui-state-default">Estado</th>
                                    <th class="ui-state-default">Cidade</th>
                                    <th class="ui-state-default">Data Nascimento</th>
                                    <th class="ui-state-default">Sexo</th>
                                    <th class="ui-state-default">No Celular</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                    <tr <?php echo ("id = \"" . $row['id'] .  "\"") ?>>
                                        <th class="ui-state-default"><?php echo $row['nome']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['email']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['estado']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['cidade']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['dataNasc']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['sexo']; ?></th>
                                        <th class="ui-state-default"><?php echo $row['numeroCelular']; ?></th>
                                    </tr>
                            </tbody>
                        </table>
                        <p>Mostrar os interesses em comum com <?php echo($row['nome']) ?> <button <?php echo("id=\"" . $row['id'] . "\"") ?> >+</button> </p>
                        <div class="escondido body" <?php echo("id=\"escondido" . $row['id'] . "\"") ?>>
                            <?php if($filmes = getFilmesEmComum($db, $usuarioID, $row['id']) and isset($filmes)): ?>
                                <p>Interesses em comum em filmes:</p>
                                     <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                                        <thead>
                                            <tr>
                                                <th class="ui-state-default">Nome</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($filmes as $row1): ?>
                                                <tr <?php echo ("id = \"" . $row1['id'] .  "\"") ?>>
                                                    <th class="ui-state-default"><?php echo $row1['nome']; ?></th>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                
                            <?php endif ?>
                            <?php if($jogos = getJogosEmComum($db, $usuarioID, $row['id']) and isset($jogos)): ?>
                                <p>Interesses em comum em jogos:</p>
                                     <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                                        <thead>
                                            <tr>
                                                <th class="ui-state-default">Nome</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($jogos as $row1): ?>
                                                <tr <?php echo ("id = \"" . $row1['id'] .  "\"") ?>>
                                                    <th class="ui-state-default"><?php echo $row1['nome']; ?></th>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                
                            <?php endif ?>
                            <?php if($esportes = getEsportesEmComum($db, $usuarioID, $row['id']) and isset($esportes)): ?>
                                <p>Interesses em comum em esportes:</p>
                                     <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                                        <thead>
                                            <tr>
                                                <th class="ui-state-default">Nome</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($esportes as $row1): ?>
                                                <tr <?php echo ("id = \"" . $row1['id'] .  "\"") ?>>
                                                    <th class="ui-state-default"><?php echo $row1['nome']; ?></th>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                            <?php endif ?>
                            <?php if($outros = getOutrosEmComum($db, $usuarioID, $row['id']) and isset($outros)): ?>
                                <p>Interesses em comum em outros:</p>
                                     <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                                        <thead>
                                            <tr>
                                                <th class="ui-state-default">Nome</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($outros as $row1): ?>
                                                <tr <?php echo ("id = \"" . $row1['id'] .  "\"") ?>>
                                                    <th class="ui-state-default"><?php echo $row1['nome']; ?></th>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                            <?php endif ?>
                            <br><br>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>

<script>
    $("button").click(function() {
        div_s = "#escondido" + this.id;
        $(div_s).toggle();
    });
</script>
    
</body>
</html>
