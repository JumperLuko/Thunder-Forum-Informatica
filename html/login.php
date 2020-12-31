	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>Thunder</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="icon" 
            type="image/png" 
            href="http://icdn.pro/images/en/l/i/lightning-icone-7684-96.png">
		<style type="text/css" rel="stylesheet">
		body{
			text-align: center;
			font-family: Arial;
			Color: white;
			BAckground-color: #525280;
			}
		ul{
			list-style: none;
		}
		li{
		font-family: Arial;
		color: #ffffff;
		width: 15%;	
		display: block;
		padding: 1%; 
			}


		.myButton {
			-moz-box-shadow:inset 0px 1px 0px 0px #7a8eb9;
			-webkit-box-shadow:inset 0px 1px 0px 0px #7a8eb9;
			box-shadow:inset 0px 1px 0px 0px #7a8eb9;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #546996), color-stop(1, #516ea6));
			background:-moz-linear-gradient(top, #546996 5%, #516ea6 100%);
			background:-webkit-linear-gradient(top, #546996 5%, #516ea6 100%);
			background:-o-linear-gradient(top, #546996 5%, #516ea6 100%);
			background:-ms-linear-gradient(top, #546996 5%, #516ea6 100%);
			background:linear-gradient(to bottom, #546996 5%, #516ea6 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#546996', endColorstr='#516ea6',GradientType=0);
			background-color:#546996;
			border:1px solid #314179;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:6px 76px;
			text-decoration:none;
		}
		.myButton:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #516ea6), color-stop(1, #546996));
			background:-moz-linear-gradient(top, #516ea6 5%, #546996 100%);
			background:-webkit-linear-gradient(top, #516ea6 5%, #546996 100%);
			background:-o-linear-gradient(top, #516ea6 5%, #546996 100%);
			background:-ms-linear-gradient(top, #516ea6 5%, #546996 100%);
			background:linear-gradient(to bottom, #516ea6 5%, #546996 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#516ea6', endColorstr='#546996',GradientType=0);
			background-color:#516ea6;
		}
		.myButton:active {
			position:relative;
			top:1px;
	}

	
	</style>
</head>

<body>

    <form action="../php/processarLogin.php" method="post">
        <ul>
            <li>Email: <input placeholder="Digite seu email" type="text"  name="email"></li>
            <li>Senha:<input placeholder="Digite sua senha" type="password" name="senha"></li>
            <!-- <li><a href="../index-homework.html" class="myButton">ENTRAR</a></li> -->
            <li><a style="color: rgb(79, 79, 119);" href="../index-homework.html" ><input type="submit" class="myButton" value="Logar"/>ENTRAR</a></li>
        </ul>
    </form>

    
</body>

</html>
