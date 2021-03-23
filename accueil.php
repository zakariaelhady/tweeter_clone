<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/home.js" type="text/javascript" ></script>
        <style>
            #recherche{background-color: #ce9ef3;
        border: none;
        cursor: pointer;}
        #recherche::placeholder{color:white;}
        </style>
    </head>
    <body>
        <form name="my_form" action="" method="POST">
        <nav>
            <img src="images/LOGO.png" alt="logo" width="95" height="70" id="logo"/></br>
            <a><img src="images/home2.png" id="homeicon" 
                 class="nav"/><span id="home" style="color: #87557d;">Accueil</span></a></br>
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
            <a href="parametres.php" onmouseover="homeover8()" onmouseout="homeout8()"><img src="images/settings2.png" id="paramicon"
                 class="nav"/><span id="param">Paramètres</span></a></br></br>
            <input type="button"type="button" onclick="location.href='accueil1.php'" value="tweet" id="tweet1"name="tweet"/></br></br></br></br></br>
            <?php $link = mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
                  $requette="SELECT * FROM `user` WHERE user_id=$_SESSION[user_id]"; 
                  $resultat=mysqli_query($link,$requette);
                  while($data=mysqli_fetch_assoc($resultat)){
                    $image=$data['photo'];
                    $nom = $data['name'];
                    $nom=trim($nom);
                    $username=$data['username'];
                    echo '<a id="logout" onclick="myFunction()" ><img src="images/'.$image.'" alt="photo" width="40" height="40"/>
                    <span class="name">'.$nom.'</span></br>
                    <span class="username">'.$username.'</span>
                    <img src="images/3cercles.png" width="50" height="50"/></a>
                    <div id="container">
                    <div id="dropbox">
                    <img src="images/'.$image.'" alt="photo" width="40" height="40"/>
                    <span class="name">'.$nom.'</span></br>
                    <span class="username">'.$username.'</span>
                    <img src="images/true.png" />';
                }
                 ?>
                <a href="" class="exist">Add an existing account</a>
                <a href="logout.php">Log out <?php echo $username; ?></a>
                <img src="images/triangle.png" >
            </div></div>
        </nav>
        <header>
            <span class="title">Accueil</span>
            <div id="container2">
            <input type="search" onclick="location.href='explorer1.php'" name="sujet" id="recherche" placeholder="Rechercher sur WeTweet" />
            <img src="images/search.png" id="search" /></div>
            <a href="#"><img src="images/view.png" id="view"/></a>
            <div style="display: none;" id="derniers">voir les meilleurs Tweets en premier</div>
            <div style="display: none;" id="meilleurs">voir les derniers Tweets en premier</div>
        </header>
        <section>
            <div id="tweet">
                <a href="profile.php"><img src="images/<?php echo $image;?>" alt="photo"class="photoprofil" width="45" height="45"/></a>
                <textarea onclick="location.href='accueil1.php'" oninput=check_length(this.form) onKeyDown=check_length(this.form) name="tweetbox" id="tweeting" placeholder="Que ce passe-t-il?" maxlength="255"col="50"
                rows="4" ></textarea> 
                <input size="1" value="255" name="counter" id="counter">
               <div id="icons">
                   <label for="fileinput">
                <a onclick="location.href='accueil1.php'"><img src="images/images.png" alt="images"  /></a></label><input type="file" id="fileinput"/>
                <a href=""><img src="images/gif.png" alt="gif" /></a>
                <a href=""><img src="images/poll.png" alt="poll"/></a>
                <a id="emoji" name="emoji"><img src="images/emoji.png" alt="emoji" /></a>
                    <div style="display: none;" id="emojis">Tapper sur WIN + . en windows</br>ou CTRL + CMD + SPACE en mac</div>
                <a onclick="myFunction1()"><img src="images/scedule.png" alt="scedule" /></a><input style="display: none;" type="date" id="datetweet" max="2021-5-31"/>
            </div>
                <input type="button"onclick="location.href='accueil1.php'" value="tweet" id="tweet2" name="tweet"/>
                <div>

                </div>
            </div>
            <article>
                 <?php 
                    $requette1="SELECT t.user_id,tweet,date,nbre_like,nbre_retweet,name,username,photo 
                    FROM tweets as t,following as f,user as u 
                    WHERE t.user_id=f.following_id and f.user_id=$_SESSION[user_id] and u.user_id=t.user_id 
                    ORDER BY t.date DESC";
                     
                 ?><h3 align="center">Bienvenue sur WeTweet!</h3>
                    <p align="center">C'est le meilleur endroit pour voir ce qui se passe dans votre monde.
                     Trouvez des </br>personnes et des sujets à suivre maintenant.</p></br>
                 <input type="button" onclick="location.href='accueil1.php'" value="Allons-y!" id="start" name="start"/>
                 <?php ?>             
            </article>
        </section>
        </form>
    </body>
</html>