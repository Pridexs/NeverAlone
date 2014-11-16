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
}

?>