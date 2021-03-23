<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Notifications</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/home.js" type="text/javascript" ></script>
        <style>p{position: relative;
        left: 15px;}</style>
    </head>
    <body>
        <form name="my_form">
        <nav>
            <img src="images/LOGO.png" alt="logo" width="95" height="70" id="logo"/></br>
            <a href="accueil1.php" onmouseover="homeover0()" onmouseout="homeout0()"><img src="images/home.png" id="homeicon"
                 class="nav"/><span id="home">Accueil</span></a></br>
            <a href="explorer.php" onmouseover="homeover1()" onmouseout="homeout1()"><img src="images/dieze.png" id="explorericon"
                 class="nav"/><span id="explorer">Explorer</span></a></br>
            <a><img src="images/notification2.png" id="notificon"
                class="nav"/><span id="notif" style="color: #87557d;">Notifications</span></a></br>
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
        </nav>
        <header>
            <span class="title">Notifications</span>
        </header>
        <article>
                <p>Vous n'avez aucune notification !!</p>
        </article>
        </form>
    </body>
</html>