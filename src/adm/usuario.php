<?php

class Usuario {
    protected $_email;
    protected $_id;

    public function __construct($email, $id) {
       $this->_email = $email;
       $this->_id = $id;
    }

    public function getNome($db) {
        $query = "SELECT nome FROM users WHERE email = :email";
        $query_params = array(
            ':email' => $this->_email
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            // Change this later
            die("Failed to run query." . $ex); 
        }

        $rows = $stmt->fetch();
        return $rows['nome'];
    }

    public function getID() {
        return $this->_id;
    }

    public function getListaFilmes($db) {
        $query = "SELECT * FROM Filmes JOIN (SELECT * FROM usuariofilmes WHERE IDUsuario = :idusuario) AS U ON U.IDFilme = Filmes.ID";
        $query_params = array(
            ':idusuario' => $this->_id
        );

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    public function getListaJogos($db) {
        $query = "SELECT * FROM Jogos JOIN (SELECT * FROM usuariojogos WHERE IDUsuario = :idusuario) AS U ON U.IDJogo = Jogos.ID";
        $query_params = array(
            ':idusuario' => $this->_id
        );


        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    public function getListaEsportes($db) {
        $query = "SELECT * FROM Esportes JOIN (SELECT * FROM usuarioesportes WHERE IDUsuario = :idusuario) AS U ON U.IDEsporte = Esportes.ID";
        $query_params = array(
            ':idusuario' => $this->_id
        );


        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }

    public function getListaOutros($db) {
        $query = "SELECT * FROM Outros JOIN (SELECT * FROM usuariooutros WHERE IDUsuario = :idusuario) AS U ON U.IDOutro = Outros.ID";
        $query_params = array(
            ':idusuario' => $this->_id
        );


        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        }

        return $stmt->fetchAll();
    }
}

?>