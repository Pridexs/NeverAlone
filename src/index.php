<?php
    
    require("adm\common.php");

    $q = '0';

    if(isset($_GET['q'])) {
        $q = $_GET['q'];
    }    

    $submitted_email = '';

    $login_failed = false;

    if(!empty($_POST)) {

        $query = "SELECT id, nome, password, salt, email FROM users WHERE email = :email";
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query." . $ex); 
        } 

        $login_ok = false;

        $row = $stmt->fetch();
        if($row) {

            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 500; $round++) { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 

            if($check_password === $row['password']) {
                $login_ok = true;
            }
        }

        if($login_ok) {
            unset($row['salt']);
            unset($row['password']);
            
            $_SESSION['user'] = $row;

            header("Location: login.php");
            die("Redirecting to: login.php");
        } else {
            $login_failed = true;
            $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
        }
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">

    <title>Never Alone &ndash; </title>


    <!-- Baixar as dependecias e colocar no servidor depois -->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="css/marketing.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

</head>

<body>

<div class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="#">Never Alone</a>

        <ul>
            <li class="pure-menu-selected"><a href="#">Início</a></li>
            <li><a href="#sobre">O que é?</a></li>
            <li><a href="#login">Entrar</a></li>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">Never Alone</h1>
        <p class="splash-subhead">
            A melhor maneira, para conhecer as melhores pessoas
        </p>
        <p>
            <a href="register.php" class="pure-button pure-button-primary">participar</a>
        </p>
    </div>
</div>

<div class="content-wrapper"><a name="sobre">
    

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <img class="pure-img-responsive" alt="File Icons" width="230" src="img/common/users2.png">
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon"></a>Conheça o Never Alone</h2>

            <p>
                Nosso objetivo é fazer com que ninguém se sinta sozinho. Utilizamos de um grande banco de dados
                para termos certeza de que há alguém com os mesmos gostos que você. Talvez um futuro grande amigo, 
                ou então, uma futura namorada ;) <br/>Está esperando o que? Cadastre-se! Entre nessa rede e conheça as melhores pessoas.
            </p>
        </div>
    </div>

    <div class="content"><a name="login">
        <h2 class="content-head is-center">A melhor maneira, para conhecer as melhores pessoas</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked" method="post">
                    <fieldset>

                        <label for="name">Email</label>
                        <input id="name" name="email" type="text" placeholder="exemplo@teste.com.br">

                        <label for="password">Senha</label>
                        <input id="password" name="password" type="password" placeholder="Senha">

                        <button type="submit" class="pure-button">Entrar</button>
                    </fieldset>
                </form>

                <?php if($login_failed): ?> <p style="color: red;">O login falhou. Seu e-mail ou senha estão incorretos.</p> <?php endif ?>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Ainda é um BETA :/</h4>
                <p>
                    Estamos em período de testes, então gostaríamos de pedir sua compreensão:D<br/>
                    Never Alone está operando e cheio de atividade, porém eventuais falhas podem aparecer,
                    assim que estivermos 100%, você, que nos acompanhou desde o começo, será o primeiro a saber. 
                </p>

                <h4>O seu DEVER</h4>
                <p>
                    Você tem tem apenas um dever, APROVEITAR. Curta o Never Alone, use e abuse de suas funcionalidades.
                    Ache um novo amigo, uma namorada, um confidente. Ajude-nos a achar pessoas interessantes à você, que em troca só 
                    exigimos sua satisfação.
                </p>
            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
        Never Alone by Team Balão Vermelho.
    </div>

</div>

</script>
</body>
</html>
