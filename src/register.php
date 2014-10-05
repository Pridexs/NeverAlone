<?php


?>

<html>
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
				<div id="content-center">
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

						    <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Register</button>
						</form>
					</div>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>