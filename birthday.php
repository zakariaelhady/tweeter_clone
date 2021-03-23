<?php
include("connexion.php");
if(!isset($_SESSION))
{
    session_start();
}
$id=$_SESSION["user_id"];
$user_ = "SELECT * FROM user WHERE user_id='$id' LIMIT 1";
$result = mysqli_query($db, $user_);
$user_1= mysqli_fetch_assoc($result);
if (isset($_POST["modif"])) {
$date=$_POST["datedenaissance"];
    $birth_update="UPDATE user SET birthday='$date' where user_id='$id'";
    $user_query=mysqli_query($db,$birth_update);
    if ($user_query) {
    header("location:parametres.php");
    }
    else{
      echo "Erreur lors de la modification de votre compte";
    }
    mysqli_close($db);}
  ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Modifier la date de naissance</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/home.js" type="text/javascript" ></script>
        <style media="screen">
        article a
        {
          position: relative;
          display: block;
          padding: 20px 36px;
          margin: 10px 0;
          color: black;
          text-decoration: none;
          text-transform: uppercase;
          font-size: 18px;
          letter-spacing: 2px;
          border-radius: 10px;
        }
        article{
          padding-left: 40px;
          padding-top: 20px;
        }
          article input
          {
            font-size: 18px;
          }
          label
          {
            font-size: 24px;
            font-weight: bold;
          }
          input{
            margin-bottom: 20px;
            text-decoration: none;
            padding: 20px 12px;
            border: none;
          }
          input[type=submit]
          {
            margin-left: 50px;
            border-radius: 10px;
          }
        </style>
    </head>
    <body>
        <form name="my_form">
        <nav>
            <a href=accueil1.php><img src="images/LOGO.png" alt="logo" width="95" height="70" id="logo"/></a></br>
            <a href="accueil1.php" onmouseover="homeover0()" onmouseout="homeout0()"><img src="images/home.png" id="homeicon"
                 class="nav"/><span id="home">Accueil</span></a></br>
            <a href="explorer.php" onmouseover="homeover1()" onmouseout="homeout1()"><img src="images/dieze.png" id="explorericon"
                 class="nav"/><span id="explorer">Explorer</span></a></br>
                 <a href="notification.php" onmouseover="homeover2()" onmouseout="homeout2()"><img src="images/notification.png" id="notificon"
                class="nav"/><span id="notif">Notifications</span></a></br>
            <a href="messages.php" onmouseover="homeover3()" onmouseout="homeout3()"><img src="images/messages.png" id="mesgicon"
                class="nav" /><span id="mesg">Messages</span></a></br>
            <a href="signet.php" onmouseover="homeover4()" onmouseout="homeout4()"><img src="images/bookmarks.png" id="signicon"
                class="nav"/><span id="sign">Signets</span></a></br>
            <a href="listes.php" onmouseover="homeover5()" onmouseout="homeout5()"><img src="images/lists.png" id="listicon"
                class="nav" /><span id="list">Listes</span></a></br>
            <a href="profile.php" onmouseover="homeover6()" onmouseout="homeout6()"><img src="images/profil.png" id="profilicon"
                 class="nav"/><span id="profil">Profil</span></a></br>
            <a href="parametres.php"><img src="images/settings.png" id="paramicon"
                 class="nav"/><span id="param" style="color: #87557d;">Paramètres</span></a></br></br>
            <input type="button" value="tweet" id="tweet1"name="tweet"/></br></br></br></br></br>
            <a id="logout" onclick="myFunction()" ><img src="images/anonymous.png" alt="photo" width="40" height="40"/>
            <span class="name"><?php echo $user_1["name"];?></span></br>
            <span class="username"><?php echo $user_1["username"];?></span>
            <img src="images/3cercles.png" width="50" height="50"/></a>
            <div id="container">
            <div id="dropbox">
                <img src="images/anonymous.png" alt="photo" width="40" height="40"/>
                <span class="name"><?php echo $user_1["name"];?></span></br>
                <span class="username"><?php echo $user_1["username"];?></span>
                <img src="images/true.png" />
                <a href="#" class="exist">Add an existing account</a>
                <a href="logout.php">Log out <?php echo $user_1["username"];?></a>
                <img src="images/triangle.png" >
            </div></div>
        </nav>
        </form>
        <header>
          <?php
          $modif1= "SELECT * From user WHERE user_id='$id';";
          $query=mysqli_query($db,$modif1);
          $result=mysqli_fetch_assoc($query);
           ?>

          <h2>Modifier la date de naissance</h2>
        </header>
        <article>
          <form class="modif" action="#" method="post">
            <div class="txt">
              <input type="text" name="datedenaissance" placeholder="Date de naissance" value="<?php echo $result['birthday']; ?>">
              <input type="submit" name="modif" value="Sauvegarder">
            </div>
          </form>
    </body>
</html>
