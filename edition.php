<?php
$link=mysqli_connect("localhost","root","","wetweet")
or die("echec de connexion a la base de donnees");
session_start();
if (isset($_POST['submit'])) {

		
if (!empty($_POST['nom_prenom']) and !empty($_POST['datedenaissance']) and !empty($_POST['description'])) {
	

	$name=addslashes($_POST['nom_prenom']);
	$birth=$_POST['datedenaissance'];
	$bio=$_POST['description'];
	$log=str_replace(' ', '', $name);
  $login='@'.$log.'';}
  else{
  	$name=$_SESSION['name'];
	$birth=$_SESSION['birthday'];
	$bio=$_SESSION['biographie'];
	$log=str_replace(' ', '', $name);
    $login='@'.$log.'';
  }


$pho=$_SESSION['photo'];
$m=$_SESSION['user_id'];

if(isset($_FILES['profil']) and $_FILES['profil']['error']==0)
{   
	$dossier= 'images/';
	$temp_name=$_FILES['profil']['tmp_name'];
	if(!is_uploaded_file($temp_name))
	{
	exit("le fichier est untrouvable");
	}
	if ($_FILES['profil']['size'] >= 1000000000){
		exit("Erreur, le fichier est volumineux");
	}
	$infosfichier = pathinfo($_FILES['profil']['name']);
	$extension_upload = $infosfichier['extension'];
	
	$extension_upload = strtolower($extension_upload);
	$extensions_autorisees = array('png','jpeg','jpg');
	if (!in_array($extension_upload, $extensions_autorisees))
	{
	exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png,jpg,jpeg)");
	}
	$nom_photo=$m.$m.".".$extension_upload;
	if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
	exit("Problem dans le telechargement de l'image, Ressayez");
	}
	$ph_name=$nom_photo;
	}
	else{
		$ph_name="$pho";
	}
	
	
		
	$requette="UPDATE USER SET name='$name' , username='$login' , birthday='$birth',  photo='$ph_name' , biographie='$bio'  WHERE user_id='$m'";
		$resultat=mysqli_query($link,$requette);
		if ($resultat==true) {
			header("Location:profile.php");
		}
		
	}
	elseif(isset($_POST['couveredit'])) {

		

	if (!empty($_POST['nom_prenom']) and !empty($_POST['datedenaissance']) and !empty($_POST['description'])) {
	

	$name=addslashes($_POST['nom_prenom']);
	$birth=$_POST['datedenaissance'];
	$bio=$_POST['description'];
	$log=str_replace(' ', '', $name);
  $login='@'.$log.'';}
  else{
  	$name=$_SESSION['name'];
	$birth=$_SESSION['birthday'];
	$bio=$_SESSION['biographie'];
	$log=str_replace(' ', '', $name);
    $login='@'.$log.'';
  }



$pho=$_SESSION['photo'];
$m=$_SESSION['user_id'];

if(isset($_FILES['profil']) and $_FILES['profil']['error']==0)
{   
	$dossier= 'images/';
	$temp_name=$_FILES['profil']['tmp_name'];
	if(!is_uploaded_file($temp_name))
	{
	exit("le fichier est untrouvable");
	}
	if ($_FILES['profil']['size'] >= 1000000000){
		exit("Erreur, le fichier est volumineux");
	}
	$infosfichier = pathinfo($_FILES['profil']['name']);
	$extension_upload = $infosfichier['extension'];
	
	$extension_upload = strtolower($extension_upload);
	$extensions_autorisees = array('png','jpeg','jpg');
	if (!in_array($extension_upload, $extensions_autorisees))
	{
	exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png,jpg,jpeg)");
	}
	$nom_photo=$m.$m.".".$extension_upload;
	if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
	exit("Problem dans le telechargement de l'image, Ressayez");
	}
	$ph_name=$nom_photo;
	}
	else{
		$ph_name="$pho";
	}
	
	
		
		$requette="UPDATE USER SET name='$name' , username='$login' ,birthday='$birth',  photo='$ph_name' , biographie='$bio'  WHERE user_id='$m'";
	
		$resultat=mysqli_query($link,$requette);
		header("Location:edition2.php");
	}

	    

	
?>
<!DOCTYPE html>
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


.a
{
	
	top:5px;
	left: 13px;
	color: white;
	border:1px solid #c77dff;
	border-radius: 25px;
	background-color: #c77dff;
	width: 80px;
	height: 28px;
	margin:10px;

}
.a1
{
	position: fixed;
	top:620px;
	left: 620px;
	color: white;
	border:1px solid #c77dff;
	border-radius: 25px;
	background-color: #c77dff;
	width: 180px;
	height: 28px;
	margin:10px;

}
#L1 { cursor: pointer;
			display: inline-block;
			width: 200px;
			height: 200px;
			border-radius: 100px;
			left: 430px;
			position:fixed;
		 }
#L2:hover {
			border: 2px solid #89608E;
		}
		#photo { display: none; }
		#L2 {
			border-radius: 100px;
			width: 150px;
			height: 150px;
			position: relative;
			top: 50px;
			left: 210px;
			border: 3px solid #89608E;
		}
		#L1 { cursor: pointer;
			display: inline-block;
			width: 200px;
			height: 200px;
			border-radius: 100px;
			left: 430px;
			position:fixed;
		 }
#L2:hover {
			border: 2px solid #89608E;
		}
		#couverture { display: none; }
		#L2 {
			border-radius: 100px;
			width: 150px;
			height: 150px;
			position: relative;
			top: 50px;
			left: 210px;
			border: 3px solid #89608E;
		}
.txt
  {
  	position: relative;
  	top: 60px;
    padding-top: 10px;
    padding-left: 10px;
  	height: 55px;
  	border-radius: 10px;
  	border:1px solid #ced4da;
    width: 520px;
    margin:0px 20px 20px 20px;
  }
  .txt label{
    color: #6c757d;
  }
  .txt input{
    outline: none;
    margin-top: 5px;
    border: none;
  }
  
		textarea {
  		border:none;
		width: 500px;
		resize: none;
    	margin-left: 1%;
		}
		textarea:focus {
			outline:none;
		}
		
		label {margin-left: 5px;}
		#conteneur { border: 1px solid #ced4da;
		border-radius: 10px;
        padding-top: 10px;
    padding-left: 10px;
		position: relative;
		top: 60px;
		left: 17px;
		width: 520px;
		font-size: 0.8em;
		color: grey;
		margin-left: 5px;}

		
		
		#char{border: none;
			background: none;
			position: absolute;
			right: 0px;
			color: grey;
			width: 50px;
		}
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
		

</style>
<title>Modifier vos informations</title>

</head>
<body>
<header>
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
}</script>
	
	<a href="profile.php" ><img src="images/fleche.PNG" class="fleche" alt="fleche_retour" width="45" height="40"></a>
	
	<div class="logo">
	 <img src="images/LOGO.png" alt="logo_twitter" width="70" style="margin-left:10px;">
   </div>
   <form action="" method="POST" enctype="multipart/form-data">
   <div class="enregistrer">
	<input type="submit" name="submit" value="Enregistrer" class="a">
   </div>
</header>

 
 

  	<?php

$sql0="SELECT `photo` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
$resu=mysqli_query($link,$sql0);
$row0=mysqli_fetch_assoc($resu);
$photo=$row0['photo'];
if ($photo=='inconnu.jpg') {?>
  	<label for="photo" id="L1" > <img  src="images/photo.jpg" id="L2" />
   <input type="file" name="profil" id="photo"  />
  <?php }
   else
   {
   	echo"<label for=\"photo\" id=\"L1\" ><img  src=\"images/$photo\" id=\"L2\" />";
   echo"<input type=\"file\" name=\"profil\" id=\"photo\"  />";
   }
   ?>
           <div class="txt">
        <label>Nom et prénom</label><br>
        <input type="text" name="nom_prenom"  placeholder="Nom et prénom" >
      </div>
      
      <div class="txt">
        <label>Date de naissance</label><br>
        <input type="text" name="datedenaissance"  placeholder="Date de naissance">
      </div>

	<div id="conteneur"><label for="description">Votre Biographie</label> 
	<input type="text" name="nombre" disabled="disabled" id="char">
	<div id="conteneur2"><textarea oninput=check_length(this.form) name="description" cols="60" rows="3" maxlength="160" ></textarea></div>
	<input type="text" name="count" id="count" value="0/160" readonly/></div>

<input type="submit" name="couveredit" value="Modifier la photo de couverture" class="a1">


