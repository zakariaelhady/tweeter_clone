<?php session_start(); ?>
<!DOCTYPE html >
<html lang="fr" dir="ltr">
<head>
<meta charset="utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<style>
	html{background-color: #f6f6f6;}
	body
	{background-color: white;
		width: 600px;
		margin: auto;
		font-family: 'Rubik', sans-serif;
		border-radius: 20px;
			box-shadow: 0px 2px 2px #1c1a19;
			height: 85vh;
		padding-left: 10px;
	}
	h2{font-size: x-large;}
header
{
	display:flex;
	align-items: center;
	justify-content: space-between;
	margin-top: 7vh;
}
.fleche{width:30px;
	height: 25px;}

.suivant
{
	border:1px solid #c77dff;
	border-radius: 25px;
	background-color: #c77dff;
	width: 80px;
	height: 28px;
	margin:10px;
	position: relative;
}
.a
{
	position: absolute;
	top:5px;
	left: 13px;
	text-decoration: none;
	color: white;
}
.exp
{
	display: flex;
}
.box
{
height: 60px;
width: 60px;
position: relative;
right: 15px;

}
p{
	text-align: justify;
	margin-right: 30px;

}
.c
{
	text-decoration: none;
	color: #c77dff;
}
.b
{
	color: #6c757d;
}
</style>
<title>Créer un compte</title>

</head>
<body>
<header>
	<a href="page1.php" ><img src="images/fleche.PNG" class="fleche" alt="fleche_retour" width="45" height="40"></a>
	
	<div class="logo">
		
      <img src="images/LOGO.png" alt="logo_twitter" width="70" style="margin-left:10px;">
   </div>
   <div class="suivant">
	<a href="page3.php" class="a">Suivant</a>
   </div>
</header>

<h2>Personnalisez votre expérience</h2> <br>

<h3>Suivez les endroits où vous voyez du contenu WeTweet sur le Web.</h3>
<form method="GET" action="#">
	<div class="exp">
		<p>WeTweet utilise ces données pour personnaliser votre expérience. Cet historique de navigation ne sera jamais stocké avec votre nom, votre adresse email ou votre numéro de téléphone.</p>
	<input type="checkbox" name="experience"  class="box" checked></div> 

</form> <br>

	<span class="b">Pour plus de détails sur ces paramètres, rendez-vous dans le</span> <a href="https://help.twitter.com/fr" class="c">Centre d'assistance.</a>





