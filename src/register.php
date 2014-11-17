<?php

    require("adm\common.php");


    if(!empty($_POST)) {

        $query = "SELECT 1 from users WHERE email = :email";
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query."); 
        } 
         
        $row = $stmt->fetch(); 
        $email_taken = false; 
        if($row) { 
            $email_taken = true;
        }

        if(!$email_taken) {
            $query = "INSERT INTO users (password, salt, email, nome, estado, cidade, dataNasc, sexo, numeroCelular) VALUE (:password, :salt, :email, :nome, :estado, :cidade, :dataNasc, :sexo, :numeroCelular)";

            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt); 

            //65536 was the number used
            for($round = 0; $round < 500; $round++)
            {
                $password = hash('sha256', $password . $salt); 
            }

            $dataNascimento = $_POST['BirthYear'] . '/' . $_POST['BirthMonth'] . '/' . $_POST['BirthMonth'];

            $query_params = array( 
                ':password' => $password, 
                ':salt' => $salt, 
                ':email' => $_POST['email'],
                ':nome' => $_POST['nome'],
                ':numeroCelular' => $_POST['numeroCelular'],
                ':estado' => $_POST['estado'],
                ':cidade' => $_POST['cidade'],
                ':sexo' => $_POST['gender'],
                ':dataNasc' => $dataNascimento
            );

            try  { 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) { 
                die("Failed to run query." . $ex); 
            } 

            header("Location: index.php"); 

            die("Redirecting to index.php"); 

        }
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">

    <title>Never Alone &ndash; </title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="css/marketing.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
    <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
    <!--<script type="text/javascript" src="js/cidades-estados-v0.2.js"></script>-->
    
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
    
</head>

<body>

<div class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">Your Site</a>

        <ul>
            <li class="pure-menu-selected"><a href="index.php">Home</a></li>
            <li><a href="#">Tour</a></li>
            <li><a href="register.php">Sign Up</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="register-form">
        <form method="post" id="registerForm"> 
            <p class="contact"><label for="name">Name</label></p> 
            <input id="name" name="nome" placeholder="Nome e Sobrenome" required="" tabindex="1" type="text"> 
             
            <p class="contact"><label for="email">Email</label></p> 
            <input id="email" name="email" placeholder="exemplo@dominio.com" required="" type="email"> 
             
            <p class="contact"><label for="password">Senha</label></p> 
            <input type="password" id="password" name="password" required=""> 

            <p class="contact"><label for="numeroCelular">Numero Celular</label></p> 
            <input id="numeroCelular" name="numeroCelular" required=""> 

            <fieldset> 
                <label>Dia<input class="birthday" maxlength="2" name="BirthDay"  placeholder="Dia" required=""></label>
                <label>Mês</label>
                <label class="month"> 
                <select class="select-style" name="BirthMonth">
                <option  value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03" >Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12" >Dezembro</option>
                </label>
                </select>   
                <label>Ano<input class="birthyear" maxlength="4" name="BirthYear" placeholder="Ano" required=""></label>
            </fieldset>
            
            <select id="estado" class="select-style gender" name="estado">
                
            </select><br><br>

            <select id="cidade" class="select-style gender" name="cidade">

            </select><br><br>

            <select class="select-style gender" name="gender">
                <option value="select"></option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select><br><br>

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Registrar!" type="submit">      
        </form> 
    </div>
</div>
</body>


<script type="text/javascript">
    window.onload = function() {
        new dgCidadesEstados(
            document.getElementById('estado'),
            document.getElementById('cidade'),
            true
        );
    }
</script>


</html>
