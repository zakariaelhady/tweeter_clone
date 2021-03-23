<?php 
session_start();
$id=$_SESSION['user_id'];
	if(isset($_POST['submit'])){
		$bio=$_POST['description'];
$link= mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
$requette1="UPDATE `user` SET `biographie`='$bio' WHERE `user_id`='$id' ";
$resultat1=mysqli_query($link,$requette1);}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<title>Déscription</title>
	<meta charset="utf-8">
	<style type="text/css">html{background-color: #f6f6f6;}
		body { background-color: white;
			width: 600px;
			margin: auto;
			font-family: arial,sans-serif;
			
			border-radius: 20px;
			box-shadow: 0px 2px 2px #1c1a19;
			height: 85vh;
			margin-top: 7vh;
			position:relative;

			 }
		#logo { width: 70px;
				display: inline-block;
				position: relative;
				left: 250px; }
		h3 { display: inline-block;
		position: absolute;
		right: 40px; 
		color:#89608E}
		h2,p { margin-left: 10px; }
		
		textarea {
  		border: none;
		width: 550px;
		resize: none;
    	margin-left: 1%;
		}
		textarea:focus {
			outline:none;
		}
		label {margin-left: 5px;}
		#conteneur { border: 1px solid grey;
		border-radius: 5px;
		position: relative;
		width: 97%;
		font-size: 0.8em;
		color: grey;
		margin-left: 5px;}

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
		#char{border: none;
			background: none;
			position: absolute;
			right: 0px;
			color: grey;
			width: 50px;}
		#conteneur2{position: relative; width: 550px;}
		#count{border: none;
		outline: none;
		font-size: 1em;
		color: grey;
		width: 70px;
		position: absolute;
		top: 2px;
		right: -8px;
		overflow: visible;
		z-index: 9;
		background: none;
		}
		input[type=submit]{
			margin-top: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
			display: inline-block;
			margin-left: 200px;
			width: 200px;
			text-align: center;
			border: 3px solid #B58DB6;
			margin-bottom: 15px;
			background: #B58DB6;
			color: white;
			border-radius: 5px;
		}
		
	</style>
	<script type="text/javascript">
	function check_length(my_form)
{
maxLen = 160;
if (my_form.description.value.length >= maxLen) {
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
my_form.description.value = my_form.description.value.substring(0, maxLen);
 }
else{ 
	my_form.count.value = my_form.description.value.length+'/160';
}
}
	</script>
</head>
<body>
	<form action="" method="POST">
	<img src="images/LOGO.png" id="logo">
	<a href="page7.php" ><h3>Passer pour le moment</h3></a>
	<h2>Décrivez-vous</h2>
	<p>Qu'est-ce qui fait de vous une personne spéciale? Ne réfléchissez pas trop et amusez-vous.</p>
	<div id="conteneur"><label for="description">votre biographie</label> 
	<div id="conteneur2">
	<textarea oninput=check_length(this.form) name="description" cols="60" rows="3" maxlength="160"></textarea></div>
	<input type="text" name="count" id="count" value="0/160" readonly/>
	</div>
	<input type="submit" name="submit" value="enregistrer la biographie">
	
	</form>
	
	 
</body>
</html>