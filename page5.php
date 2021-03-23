<?php 
	session_start();
	$link= mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
	
	$id=$_SESSION['user_id'];
	if(isset($_POST['submit'])){
	
	if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){
	 	$dossier= 'images/';
	 	$temp_name=$_FILES['photo']['tmp_name'];
	 	if(!is_uploaded_file($temp_name)){
	 		exit("le fichier est untrouvable");}
	 	if ($_FILES['photo']['size'] >= 1000000){
			exit("Erreur, le fichier est volumineux");}
		$infosfichier = pathinfo($_FILES['photo']['name']);
		$extension_upload = $infosfichier['extension'];
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees)){
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");}
		$nom_photo=$id.".".$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
			exit("Problem dans le telechargement de l'image, Ressayez");}
		$ph_name=$nom_photo;}
	else{
		$ph_name="anonymous.png";}

	$requette1="UPDATE `user` SET `photo`='$ph_name' WHERE `user_id`='$id' ";
	$resultat1=mysqli_query($link,$requette1);
	}
	  ?>
	  <script>
	function previewFile() {
  var preview = document.getElementById('L2');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

	</script>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<title>Choisir une image</title>
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
				left: 200px; }
		h3 { display: inline-block;
		position: absolute;
		right: 40px; 
		color:#89608E}
		h2,p { margin-left: 10px; }
		
		#L1 { cursor: pointer;
			display: inline-block;
			width: 200px;
			height: 200px;
			border-radius: 100px;
			left: 205px;
			position:relative;
		 }
		#L2:hover {
			border: 3px solid #89608E;
		}
		#photo { display: none; }
		#L2 {
			border-radius: 100px;
			width: 200px;
			height: 200px;
		}
		input[type=submit]{
			padding-top: 10px;
			padding-bottom: 10px;
			display: inline-block;
			margin-left:200px;
			width: 200px;
			text-align: center;
			border: 3px solid #B58DB6;
			margin-bottom: 15px;
			background: #B58DB6;
			color: white;
			margin-right: 20px;
			border-radius: 5px;
		}
		
	</style>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
	<img src="images/LOGO.png" id="logo" align="middle">
	<a href="page6.php"><h3>Passer pour le moment</h3></a>
	<h2>Choisissez une image de profil</h2>
	<p>Vous avez un selfie préféré? Télécharger-le vite.</p><br><br>
	<label for="photo" id="L1" ><img id="L2" src="images/anonymous.png"></label>
	<input type="file" name="photo" id="photo" onchange="previewFile()" accept="image/png, image/jpeg , image/jpg" >
	<br><br>
	<input type="submit" name="submit" value="telecharger la photo">
	
	</form>
	
</body>
</html>
