<?php

    require("adm\common.php");

    if(!empty($_POST)) {

    }
?>

<html lang="en">
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
        <form id="contactform"> 
            <p class="contact"><label for="name">Name</label></p> 
            <input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text"> 
             
            <p class="contact"><label for="email">Email</label></p> 
            <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

            <p class="contact"><label for="username">Create a username</label></p> 
            <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
             
            <p class="contact"><label for="password">Create a password</label></p> 
            <input type="password" id="password" name="password" required=""> 
            <p class="contact"><label for="repassword">Confirm your password</label></p> 
            <input type="password" id="repassword" name="repassword" required=""> 

            <fieldset>
                <label>Birthday</label>
                <label class="month"> 
                <select class="select-style" name="BirthMonth">
                <option value="">Month</option>
                <option  value="01">January</option>
                <option value="02">February</option>
                <option value="03" >March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12" >December</option>
                </label>
                </select>    
                <label>Day<input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>
                <label>Year <input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>
            </fieldset>
			
            <select id="estado" class="select-style gender" name="estado">
				
            </select><br><br>

            <select id="cidade" class="select-style gender" name="cidade">

            </select><br><br>

            <select class="select-style gender" name="gender">
                <option value="select">i am..</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
                <option value="others">Other</option>
            </select><br><br>

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit">      
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
