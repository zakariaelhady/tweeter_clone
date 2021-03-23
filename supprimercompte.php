<?php
include("connexion.php");
if(!isset($_SESSION))
{
    session_start();
}
$id=$_SESSION["user_id"];
if (isset($_POST["oui"])) {
  $sql3="DELETE FROM user where user_id='$id'";
  $query3=mysqli_query($db,$sql3);
  if ($query3) {
    echo "votre compte a été supprimé avec succès" ;
    header("location:index.php");
  }
  else {
    echo "Désolé votre compte ne peut pas étre supprimer maintenant".mysqli_close($link);
  }
  mysqli_close($db);
}
else {
  header("Location:parametres.php");
}

 ?>
