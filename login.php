<?php 
$msg=" ";
   if (isset($_POST['connecter'])) {
   $login=$_POST['connexion'];
   $passe=$_POST['passe'];
   $link= mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
   $sql="SELECT * FROM `user` WHERE `name`='$login' OR `email`='$login' OR `phone`='$login' ";
   $result=mysqli_query($link,$sql);
   while($data=mysqli_fetch_assoc($result)){
   	$mdp=$data['password'];
   if ($passe==$mdp) {
   		session_start();
   		$_SESSION['user_id']=$data['user_id'];
   		$_SESSION['name']=$data['name'];
   		header("Location: accueil1.php");
   } else {
   $msg='login ou mot de passe incorrect! veuillez ressayer ';
   }
   }}
    ?>
<!DOCTYPE html >
<html lang="fr" dir="ltr">
<head>
	<title>Se connecter</title>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	<style>html{background-color: #f6f6f6;}
		body{background-color: white;
			width: 600px;
			margin: auto;
			font-family: 'Rubik', sans-serif;
			border-radius: 20px;
			box-shadow: 0px 2px 2px #1c1a19;
			height: 85vh;
        	padding-left: 10px;
        	margin-top: 7vh;
        	position: relative;
		}
		.logo{width: 70px;
    		margin: auto;
    		position: relative;
    		right: 20px;
		}
		h1{text-align: center;}
		#conteneur{border: 1px solid grey;
			border-radius: 5px;
			position: relative;
			width: 97%;
			font-size: 0.8em;
			color: grey;
			margin-left: 5px;
			margin-bottom: 20px; 
		}
		#conteneur:hover {
			border: 3px solid #89608E;
			color: #89608E;
			font-size: 1em;
		}
		#conteneur:focus-within {
			border: 3px solid #89608E;
			color: #89608E;
			font-size: 1em;
		}
		label {margin-left: 5px;}
		input[type="text"]{
			border: none;
			width: 98%;
			font-size: 1.9em;
			margin-left: 2px;
		}
		input[type="text"]:focus {
			outline:none;
			background:#f6f6f6 ;
		}
		input[type="submit"]{cursor: pointer;
			width: 97%;
			height: 50px;
			margin-left: 1%;
			color: white;
			background-color: #b58db6;
			border-radius: 25px;
			border: none;
			font-size: 1.3em;
			font-weight: bolder;
		}
		input[type="submit"]:hover{
			background-color: #89608E;
		}
		a{margin-top: 20px;
			display: inline-block;
			position: absolute;
			width: 200px;
			left: 210px;
			color: #b58db6;
			text-decoration: none;
			text-align: center;
		}
		a:hover{text-decoration: underline;
		}
</style>


</head>
<body>
<header>
   <div class="logo">
      <img src="images/LOGO.png" alt="logo_twitter" width="75" height="55">
   </div>
   <h1>Se connecter à WeTweet</h1>
   <form action="login.php" method="POST">
   	<div id="conteneur"><label for="connexion">Téléphone, email ou nom d'utilisateur</label> 
   	<input type="text" name="connexion" required="required">
	</div>
	<div id="conteneur"><label for="passe">Mot de passe</label> 
   	<input type="text" name="passe" required="required">
	</div>
	<input type="submit" name="connecter" value="Se connecter">
   </form>
   <a href="page1.php"> S'inscrire sur WeTweet</a>
   <br><br>
   <h5><?php echo $msg; ?></h5>
</header>
</body>
</html>

