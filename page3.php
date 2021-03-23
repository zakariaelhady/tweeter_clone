<?php 
include("connexion.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_POST['button'])) {
  $name=addslashes($_POST['nom_prenom']);
  
  $phone=$_POST['telephone'];

  $date=$_POST['datedenaissance'];
  $log=str_replace(' ', '', $name);;
  $login='@'.$log.'';
$sql="UPDATE user SET name='$name' , pseudo='$login' , phone='$phone' , birthday='$date' WHERE user_id='".$_SESSION['user_id']."'";
$resultat=mysqli_query($db,$sql);
if($resultat==true){
  header('Location:page4.php');
}
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <meta charset="utf-8">
    <title></title>
    <style media="screen">html{background-color: #f6f6f6;}
    body
  	{background-color: white;
  		width: 600px;
  		margin: auto;
      font-family: 'Rubik', sans-serif;
      height: 85vh;
    padding-left: 10px;
    border-radius: 20px;
			box-shadow: 0px 2px 2px #1c1a19;
  	}
    .fleche
    {
      margin-right: 10px;
      width: 30px;
      height: 25px;
    }
  header
  {
  	display: flex;
    align-items: center;
    margin-top: 7vh;

  }

  h2
  {
  	text-transform: capitalize;
  }
.txt
  {
    padding-top: 10px;
    padding-left: 10px;
  	height: 55px;
  	border-radius: 10px;
  	border:1px solid #ced4da;
    width: 550px;
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
  
  .h3
  {
  	font-weight: bold;
  }
  .conditions
  {
    margin-top: 40px;
    margin-left: 20px;
    margin-bottom: 10px;
  }
  .conditions a{
    color:#c77dff;
  }
  .submit input {
    border:1px solid #c77dff;
  	border-radius: 25px;
  	background-color: #c77dff;
    margin-left: 220px;
    width: 10em;
    margin-top: 20px;
    height: 2em;
    color: white;
    font-weight: bold;
    outline: none;
  }
  .submit input:focus{
    background-color: #36013f;
    border-radius: 25px;
    border: 1px solid #36013f;
  }
  #tele::-webkit-inner-spin-button{display: none;}
  </style>
  </head>
  <body>
    <header>
  <div class="fleche">
    	<a href="page2.php" ><img src="images/fleche.PNG" class="fleche" alt="fleche_retour" width="45" height="40"></a>
      </div>
      <h3>Étape 3/5</h3>
    </header>
    <h2>Créer votre compte</h2> <br>
    <form action="#"  method="post">
      <div class="txt">
        <label>Nom et prénom</label><br>
        <input type="text" name="nom_prenom"  placeholder="Nom et prénom" >
      </div>
      <div class="txt">
        <label id="telelab">Téléphone</label><br>
        <input type="number" name="telephone" id="tele"placeholder="téléphone">
      </div>
      <div class="txt">
        <label>Date de naissance</label><br>
        <input type="text" name="datedenaissance"  placeholder="Date de naissance">
      </div>
      <div class="conditions">
          En vous inscrivant, vous acceptez les <a href="conditiond'utilisation.php">Conditions d'utilisation</a> et la <a href="Politique.php">Politique de confidentialité</a>, ainsi que l'<a href="cookies.php">utilisation des cookies</a>. Les utilisateurs pourront vous trouver grâce à votre adresse email et à votre numéro de téléphone, si vous les avez fournis. <a href="Optionsconf.php">Options de confidentialité</a>
      </div>
      <div class="submit">
    <input type="submit" name="button" value="S'inscrire">
  </div>

    </form>

    </div>

  </body>
</html>
