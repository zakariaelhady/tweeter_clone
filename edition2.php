<?php
$link=mysqli_connect("localhost","root","","wetweet")
or die("echec de connexion a la base de donnees");
session_start();
if (isset($_POST['submit'])) {
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
	$nom_photo=$m."1.".$extension_upload;
	if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
	exit("Problem dans le telechargement de l'image, Ressayez");
	}
	$ph_name=$nom_photo;
	}
	else{
		$ph_name="photo.jpg";
	}
	
	
		
		$requette="UPDATE USER SET couverture='$ph_name'  WHERE user_id='$m'";
	
		$resultat=mysqli_query($link,$requette);
		header("location:profile.php");
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
			height: 55vh;
			margin-top: 60px;
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


.a
{
	position: fixed;
	top:70px;
	left: 913px;
	color: white;
	border:1px solid #c77dff;
	border-radius: 25px;
	background-color: #c77dff;
	width: 80px;
	height: 28px;
	margin:10px;

}
#L1 { cursor: pointer;
			display: inline-block;
			width: 200px;
			height: 200px;
			border-radius: 0px;
			left: 430px;
			position:fixed;
		 }
		 #L2:hover {
			border: 2px solid #89608E;
		}
		#photo { display: none; }
		#L2 {
			border-radius: 0px;
			width: 230px;
			height: 230px;
			position: relative;
			top: 50px;
			left: 180px;
			border: 3px solid #89608E;
		}
</style>

<body>
	<div class="logo">
	 <img src="images/LOGO.png" alt="logo_twitter" width="70" style="margin-left:260px;">
   </div>
   <form action="" method="POST" enctype="multipart/form-data">
   <div class="enregistrer">
	<input type="submit" name="submit" value="Enregistrer" class="a">
   </div>

<?php
  
     $sql00="SELECT `couverture` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
     $req=mysqli_query($link,$sql00);
     $roww=mysqli_fetch_assoc($req);
     $couverture=$roww['couverture'];
     if(empty($couverture)){?>
      <label for="photo" id="L1" > <img  src="images/photo.jpg" id="L2" />
   <input type="file" name="profil" id="photo"  />
    <?php }else{
           echo"<label for=\"photo\" id=\"L1\" ><img  src=\"images/$couverture\" id=\"L2\" />";
   echo"<input type=\"file\" name=\"profil\" id=\"photo\"  />";
    }
  
  
   ?>
</body>