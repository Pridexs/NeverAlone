<?php
    require ('..\..\adm\common.php');

    if(empty($_SESSION['usuario'])) { 
        header("Location: index.php"); 
        die("home.php"); 
    }

    function buscaFilmes($param, $db) {
        $query = "SELECT * FROM filmes WHERE nome LIKE :nome";
        $query_params = array( 
            ':nome' => '%' . $param . '%'
        ); 
        
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        } 
        $data = $stmt->fetchAll();
        $sResults =  "";
        foreach($data as $row) {
            $sResults .= '<tr id="'. $row['ID'] . '">';
            $sResults .= '<td>' . $row['nome'] . '</td>';
            $sResults .= '<td>' . $row['tipo'] . '</td>';
            $sResults .= '<td>' . $row['tema'] . '</td>';
            $sResults .= '<td>' . $row['ano'] . '</td>';
            $sResults .= '<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="add(this.value)">+</button</center></td></tr>';
        }
        echo $sResults;
    }

    function buscaJogos($param, $db) {
        $query = "SELECT * FROM jogos WHERE nome LIKE :nome";
        $query_params = array( 
            ':nome' => '%' . $param . '%'
        ); 
        
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        } 

        $data = $stmt->fetchAll();
        $sResults =  "";
        foreach($data as $row) {
            $sResults .= '<tr id="'. $row['ID'] . '">';
            $sResults .= '<td>' . $row['nome'] . '</td>';
            $sResults .= '<td>' . $row['tipoJogo'] . '</td>';
            $sResults .= '<td>' . $row['qtdParticipantes'] . '</td>';
            $sResults .= '<td>' . $row['temaJogo'] . '</td>';
            $sResults .= '<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="add(this.value)">+</button</center></td></tr>';
        }
        echo $sResults;
    }
    
    function buscaEsportes($param, $db) {
        $query = "SELECT * FROM esportes WHERE nome LIKE :nome";
        $query_params = array( 
            ':nome' => '%' . $param . '%'
        ); 
        
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        } 
        
        $data = $stmt->fetchAll();
        $sResults =  "";
        foreach($data as $row) {
            $sResults .= '<tr id="'. $row['ID'] . '">';
            $sResults .= '<td>' . $row['nome'] . '</td>';
            $sResults .= '<td>' . $row['qtdParticipantes'] . '</td>';
            $sResults .= '<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="add(this.value)">+</button</center></td></tr>';
        }
        echo $sResults;
    }

    function buscaOutros($param, $db) {
        $query = "SELECT * FROM outros WHERE nome LIKE :nome";
        $query_params = array( 
            ':nome' => '%' . $param . '%'
        ); 
        
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        } 
        
        $data = $stmt->fetchAll();
        $sResults =  "";
        foreach($data as $row) {
            $sResults .= '<tr id="'. $row['ID'] . '">';
            $sResults .= '<td>' . $row['nome'] . '</td>';
            $sResults .= '<td>' . $row['dadosAdicionais'] . '</td>';
            $sResults .= '<td><center><button type="submit" value = "' . $row['ID'] . '" class="pure-button" onclick="add(this.value)">+</button</center></td></tr>';
        }
        echo $sResults;
    }

    /* The search input from user ** passed from jQuery .get() method */
    $param = $_GET["searchData"];
    $location = $_GET["location"];

    if($location === "filme.php") {
        buscaFilmes($param, $db);
    } else if ($location === "jogo.php") {
        buscaJogos($param, $db);
    } else if ($location === "esporte.php") {
        buscaEsportes($param, $db);
    } else {
        buscaOutros($param, $db);
    }

    

    

?>