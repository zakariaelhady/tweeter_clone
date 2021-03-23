<?php  
session_start();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Messages</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/home.js" type="text/javascript" ></script>
        <style type="text/css">
            article { width: 900px;
                    display: inline-block;
                    position: absolute;
                    top: 70px; 
                    margin-left: 70px;}
            select{
                margin-left:80px;
                padding-top: 10px;
            padding-bottom: 10px;
            display: inline-block;
            position: absolute;
            width: 380px;
            }
            input[type=submit]{
            padding-top: 10px;
            padding-bottom: 10px;
            display: inline-block;
            margin-left:350px;
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
        <form name="my_form">
        <nav>
            <img src="images/LOGO.png" alt="logo" width="95" height="70" id="logo"/></br>
            <a href="accueil1.php" onmouseover="homeover0()" onmouseout="homeout0()"><img src="images/home.png" id="homeicon"
                 class="nav"/><span id="home">Accueil</span></a></br>
            <a href="explorer.php" onmouseover="homeover1()" onmouseout="homeout1()"><img src="images/dieze.png" id="explorericon"
                 class="nav"/><span id="explorer">Explorer</span></a></br>
                 <a href="notification.php" onmouseover="homeover2()" onmouseout="homeout2()"><img src="images/notification.png" id="notificon"
                class="nav"/><span id="notif">Notifications</span></a></br>
            <a><img src="images/messages2.png" id="mesgicon"
                class="nav" /><span id="mesg" style="color: #87557d;">Messages</span></a></br>
            <a href="signet.php" onmouseover="homeover4()" onmouseout="homeout4()"><img src="images/bookmarks.png" id="signicon"
                class="nav"/><span id="sign">Signets</span></a></br>
            <a href="listes.php" onmouseover="homeover5()" onmouseout="homeout5()"><img src="images/lists.png" id="listicon"
                class="nav" /><span id="list">Listes</span></a></br>
            <a href="profile.php" onmouseover="homeover6()" onmouseout="homeout6()"><img src="images/profil.png" id="profilicon"
                 class="nav"/><span id="profil">Profil</span></a></br>
            <a href="parametres.php" onmouseover="homeover8()" onmouseout="homeout8()"><img src="images/settings2.png" id="paramicon"
                 class="nav"/><span id="param">Paramètres</span></a></br></br>
            <input type="button" value="tweet" id="tweet1"name="tweet"/></br></br></br></br></br>
            <a id="logout" onclick="myFunction()" ><img src="images/anonymous.png" alt="photo" width="40" height="40"/>
            <span class="name">nom prenom</span></br>
            <span class="username">@username</span>
            <img src="images/3cercles.png" width="50" height="50"/></a>
            <div id="container">
            <div id="dropbox">
                <img src="images/anonymous.png" alt="photo" width="40" height="40"/>
                <span class="name">nom prenom</span></br>
                <span class="username">@username</span>
                <img src="images/true.png" />
                <a href="#" class="exist">Add an existing account</a>
                <a href="logout.php">Log out @username</a>
                <img src="images/triangle.png" >
            </div></div>
        </nav></form>
        <header>
            <span class="title">Messages</span>
        </header>
         
        <article>
          <form action="chat.php" method="GET">
            <label>choisir un ami</label>
    <select name="user"><?php 
      $link= mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
      $sql1="SELECT * FROM user";
      $result1=mysqli_query($link,$sql1);
      while ($liste_user=mysqli_fetch_assoc($result1)){
        echo'<option value='.$liste_user["user_id"].'>';
        echo $liste_user["name"];
        echo '</option>';
        }
        
      ?>
    </select>
    <br><br>
    <input type="submit" name="submit" value="selectionner">
        </form>
        </article>
    </body>
</html>