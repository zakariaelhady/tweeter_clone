<!DOCTYPE html>
<html>
<head>
	<title>WeTweet.C'est ce qui se passe/WeTweet</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Rubik', sans-serif;
			position: relative;
		}
		.logo{width: 100px;
    		
		}
		.part1 {
			display: inline-block;
			position: absolute;
			right: 0px;
			width: 600px;
			margin-top: 40px;

		}
		h1,h4 {
			margin-left: 25px;
		}

		a {
			padding-top: 15px;
			padding-bottom: 15px;
			display: inline-block;
			margin-left: 25px;
			width: 400px;
			text-align: center;
			border: 3px solid #B58DB6;
			text-decoration: none;
			margin-bottom: 15px;
			border-radius: 30px;
		}
		#inscription {
			background: #B58DB6;
			color: white;
		}
		#connexion {
			color: #B58DB6;
		}
	</style>
</head>
<body>
	<div class="part1">
	<div class="logo">
      <img src="images/LOGO.png" alt="logo_twitter" width="100" height="80">
      </div>
      <h1>Voir ce qui se passe<br>actuellement dans le <br>monde</h1><br>
      <h4>Rejoignez WeTweet dès aujourd'hui.</h4>
      <nav>
      <a href="page1.php" id="inscription">S'inscrire</a><br>
      <a href="login.php" id="connexion">Se connecter</a></nav>
   </div>
</body>
</html>