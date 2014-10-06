<?php
    
    require("adm\common.php");

    $q = '0';

    if(isset($_GET['q'])) {
        $q = $_GET['q'];
    }    

    $submitted_username = '';

    $login_failed = false;

    if(!empty($_POST)) {

        $query = "SELECT id, username, password, salt, email from users WHERE username = :username";
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 

        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query."); 
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

            header("Location: home.php");
            die("Redirecting to: notes.php");
        } else {
            $login_failed = true;
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        }
    }
?>

<html>
<<<<<<< HEAD
    <head>
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <title>Never Alone</title>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <img src="../imgs/na_logo_min.png" id="logo" height="70%"  />
                <div id="main-header">
                    <form class="pure-form" action="index.php" method="post">
                        <fieldset>
                            <input id="name" name="username" type="text" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="pure-button pure-button-primary">Sign in</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div id="gradient-div">
                <div id="content">
                    <h1>balbalbalba</h1>
                    <a>xzxads</a>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>
=======
    <head>
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <title>Never Alone!</title>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <img src="../imgs/na_logo_min.png" id="logo" height="70%"  />
                <div id="main-header">
                    <form class="pure-form" action="index.php" method="post">
                        <fieldset>
                            <input id="name" name="username" type="text" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="pure-button pure-button-primary">Sign in</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div id="gradient-div">
                <div id="content">
                    <h1>balbalbalba</h1>
                    <a>xzxads</a>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>
>>>>>>> 9cb70611446a100e3c3245c66fc4a022293cfeb9
