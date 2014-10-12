<?php

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
        <a class="pure-menu-heading" href="">Your Site</a>

        <ul>
            <li class="pure-menu-selected"><a href="index.php">Home</a></li>
            <li><a href="#">Tour</a></li>
            <li><a href="register.php">Sign Up</a></li>
        </ul>
    </div>
</div>

<div class="content">
   <div class="splash">
        <div class="l-box-lrg pure-u-1 pure-u-md-4-5">
            <div id="registerform">
                <form class="pure-form">
                    <label id="label-left"> Register Information </label>
                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1-2" placeholder="Username">
                        <input type="text" class="pure-input-1-2" placeholder="Password">
                        <input type="email" class="pure-input-1-2" placeholder="Email">
                    </fieldset>

                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1-2" placeholder="whatever whatever">
                        <input type="text" class="pure-input-1-2" placeholder="whatever 2 whatever">
                        </fieldset>
                    <label id="label-left"> Where do you live ? </label>
                    <!--
                        FAZER AS CIDADES LOADAR DEPOIS DE ESCOLHER O ESTADO
                    -->
                    <fieldset>
                        <select id="state" class="pure-input-1-2">
                            <option>AL</option>
                            <option>CA</option>
                            <option>IL</option>
                        </select>

                        <select id="city" class="pure-input-1-2">
                            <option>Rio Negrinho</option>
                            <option>Joinville</option>
                            <option>Laguna</option>
                        </select>
                    </fieldset>

                    <button type="submit" class="pure-button">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>



</script>
</body>
</html>
