<?php
include('connexion.php');
if (!isset($_SESSION))
{
    session_start();
}$id=$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
  	display:flex;
  	align-items: center;
    margin-top: 7vh;
    justify-content: space-between;

  }
  .suivant input
  {
  	border:1px solid #c77dff;
  	border-radius: 25px;
  	background-color: #c77dff;
  	width: 80px;
  	height: 28px;
  	margin:10px;
  	position: relative;
    color:white;
    outline: none;
  }
  .suivant input:focus
  {
    background-color: #36013f;
    border-radius: 25px;
    border: 1px solid #36013f;
  }
  .logo
  {width: 70px;
    margin-left: 250px;
  }
  .motdepasse label {

    color:#ced4da;
  }
  .motdepasse input{
  outline: none;
border:none;
margin-top: 5px;
font-size: 13pt;
width: 20em;

}
  .motdepasse
  {
    padding-top: 20px;
    padding-left: 15px;
    height: 55px;
    border-radius: 10px;
    border:1px solid #ced4da;
    width: 550px;
    outline: none;
  }
  h5
  {
    color: red;

  }
  h6{
  	color: #6c757d;
  }
  .consigne{
    margin-left: 30px;

    }
    #showpw
    {
    display: none
    }
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.eye{
  position: absolute;
  margin-top: 3px;
  margin-left:160px;
}
      </style>
  </head>
  <body>
    <form  action="page4.php" method="post">

    <header>
    	<div class="logo">

          <img src="images/LOGO.png" alt="logo_wetweet" width="75" height="55">
       </div>
       <div class="suivant">
    	<input type="submit" name="suivant" value="suivant">
       </div>
    </header>
    <div class="consigne">


    <h2>Il vous faut un mot de passe</h2>
    <h6>Vérifier qu'il contient au moins 8 caractère</h6>
  </div>
    <div class="motdepasse">
      <input type="password" name="mdp" placeholder="Mot de passe" id="myinput" maxlength="30">
      <span class="eye" onclick="myfunction()">
       <i id="showpw" class="fa fa-eye" aria-hidden="true" style="font-size:25px"></i>
      <i id="hidepw"class="fa fa-eye-slash " aria-hidden="true"style="font-size:25px"></i></span>
    </div>
    <?php if (isset($_POST["suivant"])) {
      $mdp=$_POST["mdp"];
      if ($mdp) {
        if (strlen($mdp)>=8) {
          $inser="UPDATE user set password='$mdp' where user_id='$id'";
          $insertion=mysqli_query($db,$inser);
          if ($insertion) {
            header("Location:page5.php");
          }
        }
        else {
          echo "<h5>*Le mot de passe est court</h5>";
        }
      }
      else {
        echo "<h5>*Veuillez saisir un mot de 8 caractères en moins</h5>";
      }
    } ?>

</form>
<script>
function myfunction(){
    var x=document.getElementById("myinput");
    var y=document.getElementById("showpw");
    var z=document.getElementById("hidepw");
    if(x.type=== 'password')
    {
      x.type="text";
      y.style.display ="block";
      z.style.display ="none";
    }
    else {
      x.type="password";
      y.style.display ="none";
      z.style.display ="block";

    }

}

</script>
  </body>
</html>
