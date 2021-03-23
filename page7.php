<?php session_start();
$_SESSION['user_id']=6;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="css/inscription.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=4.0, minimum-scale=0.5">
        <script src="javascript/signin.js" type="text/javascript" ></script>
    </head>
    <body><div class="container0">
        <img src="images/LOGO.png" alt="logo" width="130" height="95" id="logo"/>
        <form action="#" method="">
        <input type="button" onclick="location.href='page8.php'" name="passer"class="passer" value="Passer pour le moment"/>
        <span class="subject">Quels sont les sujets qui vous intéressent ?</span>
        <p>Sélectionnez des sujets qui vous intéressent afin de personnaliser votre expérience Wetweet,
         notamment pour trouver des personnes à suivre.</p>
         <div class="container">
            <input type="search" name="sujet" id="sujet" placeholder="Recherchez des centres d'intérêts" />
            <img src="images/search.png" id="search" /></div>
        <div>
            <span class="titre">Actualités</span>
            <input type="button" onclick="changecolor()" id="choix" name="actualités[]" value="Actualités Générales" />
            <input type="button" onclick="changecolor1()" id="choix1" name="actualités[]" value="Journalistes" />
            <input type="button" onclick="changecolor2()" id="choix2" name="actualités[]" value="Actualités Internationales" />
        </div>
        <div>
            <span class="titre">Sport</span>
            <input type="button" onclick="changecolor3()" id="choix3" name="sport[]" value="Sports locaux" />
            <input type="button" onclick="changecolor4()" id="choix4" name="sport[]" value="Football" />
        </div>
        <div >
            <span class="titre">Gouvernement & Politique</span>
            <input type="button" onclick="changecolor5()" id="choix5" name="politique[]" value="Politiciens" />
            <input type="button" onclick="changecolor6()" id="choix6" name="politique[]" value="Politique" />
        </div>
        </form></div>
    </body>
</html>
