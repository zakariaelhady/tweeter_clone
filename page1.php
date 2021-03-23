<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$link=mysqli_connect("localhost","root","","wetweet")
or die("echec de connexion a la base de donnees");


if(isset($_POST['suivant'])){
if(isset($_POST['telephone'])){
	$name=addslashes($_POST['nom_prenom']);
	
	$phone=$_POST['telephone'];

	$date=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];

$sql="INSERT INTO `user`( `name`, `phone`,`birthday`) VALUES ('$name','$phone','$date')";
$resultat=mysqli_query($link,$sql);

}
elseif(isset($_POST['email'])) {
	$name=addslashes($_POST['nom_prenom']);
	$mail=addslashes($_POST['email']);
	$date=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
$sql="INSERT INTO `user`( `name`, `email`,`birthday`) VALUES ('$name','$mail','$date')";
$resultat=mysqli_query($link,$sql);


}
$sql1="SELECT `user_id` FROM `user` WHERE name='$name'";
$resultat1=mysqli_query($link,$sql1);
$row=mysqli_fetch_assoc($resultat1);
$_SESSION['user_id']=$row['user_id'];


if($resultat==true){
	header('Location:page2.php');
}
}


?>

<!DOCTYPE html >
<html lang="fr" dir="ltr">
<head>
<meta charset="utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<style>html{background-color: #f6f6f6;}
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
header
{
	display: flex;
	margin-top: 7vh;
	justify-content: flex-end;
	margin-left: 60px;

}
.logo
{width: 70px;
	margin-right: 180px;
}
.suivant
{
	border:1px solid #c77dff;
	border-radius: 25px;
	background-color: #c77dff;
	width: 80px;
	height: 28px;
	margin:10px;
	position: relative;
	color: white;
}


h1
{
	text-transform: capitalize;
}
input
{
	height: 55px;
	border-radius: 10px;
	border:1px solid #ced4da;
	outline: none;
}
.usemail,.usephone
{
	border:none;
	color:#c77dff;
	background: none;
}
.h3
{
	font-weight: bold;
}
label
{
	color:#6c757d ;
	font-size: 14px;

}
.mois
{
	width: 250px;
	height: 60px;
	border:1px solid #ced4da;
	border-radius: 5px;
}
.jour,.annee
{
	width: 150px;
	height: 60px;
	border:1px solid #ced4da;
	border-radius: 5px;
}
input[type="submit"]{cursor: pointer;}
</style>
<script type="text/javascript" src="javascript/inscription.js"></script>
<title>Créer un compte</title>

</head>
<body>
<header>
   <div class="logo">
      <img src="images/LOGO.png" alt="logo_twitter" width="75" height="55">
   </div>
   <form method="POST" action="#">
   
	<input type="submit" name="suivant" value="Suivant" class="suivant" >
   
</header>

<h2>créer votre compte</h2> <br>

	
	<input type="text"  name="nom_prenom" placeholder="Nom et prénom" size="80" /><br><br>
	
	<?php
	
	if(!isset($_POST['utilisermail'])) { ?>
    <input type="tel"  name="telephone" placeholder="Téléphone" maxlength="15" size="80" >
    <input type="submit" name="utilisermail" value="Utiliser un email" class="usemail"> 
	
<?php 
	} else { ?>
	
	<input type="email" name="email" placeholder="Adresse mail" size="80" /> 
	<input type="submit" name="utilisertelephone"  value="Utiliser un téléphone" class="usephone"> 
	<?php } ?><br><br>
	

	<span class="h3">Date de naissance</span>
    <br><label>Cette information ne sera pas affichée publiquement. Confirmer votre âge même si ce compte est pour une entreprise, un animal de compagnie ou autre  hose.<label> <br>


       <br> <select  name="mois" class="mois" >
       	
          <option value="01">Janvier</option>
          <option value="02">Février</option>
          <option value="03">Mars</option>
          <option value="04">Avril</option>
          <option value="05">Mai</option>
          <option value="06">Juin</option>
          <option value="07">Juillet</option>
          <option value="08">Août</option>
          <option value="09">Septembre</option>
          <option value="10">Octobre</option>
          <option value="11">Novembre</option>
          <option value="12">Décembre</option>
        </select>
         <select name="jour" class="jour">
 
<?php
 
for ($i = 1; $i <= 31; $i++)
 
{
 
echo '<option value="'.$i.'">'.$i.'</option>';
 
}
 
?>
 
</select>


           <select name="annee" class="annee">
 
<?php
 
for ($i = 2020; $i >=1950 ; $i--)
 
{
 
echo '<option value="'.$i.'">'.$i.'</option>';
 
}
 
?>
 
</select>
</form>













