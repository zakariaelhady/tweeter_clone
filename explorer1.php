<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>recherche</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/home.js" type="text/javascript" ></script>
        <style>
        body{border-right: none;}
section{width: 150vh;
    border-right: 1.5px solid rgba(243, 240, 240, 0.575);
    height: 100vh;}
.container1{
    border-top: 1px solid rgb(230, 226, 226);
    border-bottom:1px solid rgb(230, 226, 226) ;
    position: relative;
}
.profil{clip-path: circle();
height: 78px;
width: 78px;
margin-top: 5px;
margin-left: 20px;
display: inline-block;}
.container2{position: absolute;
    left: 120px;
    top: 13px;
}
.verified{height: 25px;
width: 25px;
}
.name2{font-size: 20px;
    display: inline-block;
    vertical-align: top;
    font-weight: bolder;
    color: black;
    text-transform: capitalize;}
.username2{font-size: 20px;
    display: inline-block;
    vertical-align: top;
    position: absolute;
    left: 120px;
    top: 40px;
    color: rgb(121, 121, 121);}
.description2{display: inline-block;
    position: relative;
    left: 120px;
    bottom: 20px;
}
.follow,.following{
    color:rgb(98, 59, 90);
    background-color: white;
    border-radius: 40px;
    height: 42px;
    width: 100px;
    outline: none;
    font-size: 20px;
    font-weight: bolder;
border: 2px solid rgb(98, 59, 90);
position: absolute;
right: 25px;
top: 30px;}
.follow:hover{background-color:  rgb(98, 59, 90);
color: white;}
.following{border: none;
    color:white;
    background-color: #c77dff;
}
.following:hover{background-color: #bc64ff;}
#sujet{border-color: rgb(98, 59, 90);
border-radius: 40px;
height: 45px;
width: 590px;
padding-left: 60px;
outline: none;
font-size: 19px;
margin-top: 5px;
}
#sujet::placeholder{font-size: 20px;}
.container{position: relative; 
width: 60vh;
margin: auto;
bottom: 37px;
left: 150px;
}
#search{width: 33px;
height: 33px;
position: absolute;
left: 10px;
top: 9px;
}
#cancel{
    position: relative;
    right: 0vh;
    top: 10px;
    left: 10px;
}
#cancel img{
    height: 22px;
    width: 27px;
    position: relative;
    top: 7px;
}
        </style>
    </head>
    <body>
        <form name="my_form" action="" method="POST">
        <nav>
            <img src="images/LOGO.png" alt="logo" width="95" height="70" id="logo"/></br>
            <a href="accueil1.php" onmouseover="homeover0()" onmouseout="homeout0()"><img src="images/home.png" id="homeicon"
                 class="nav"/><span id="home">Accueil</span></a></br>
            <a><img src="images/diese2.png" id="explorericon" 
                 class="nav"/><span id="explorer" style="color: #87557d;">Explorer</span></a></br>
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
            <input type="button" value="tweet" id="tweet1"name="tweet"/></br></br></br></br></br>
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
                <a href="#" class="exist">Add an existing account</a>
                <a href="logout.php">Log out @username</a>
                <img src="images/triangle.png" >
            </div></div>
        </nav><section>
            <header>
            <a id="cancel" href="explorer.php"><img src="images/fleche.PNG" /></a>
            <div class="container">
            <input type="search" name="sujet" id="sujet" placeholder="Recherchez des personnes" />
            <img src="images/search.png" id="search" /></div>
            </header>
            <article>
            <?php 
            if(isset($_POST['sujet'])){
                $recherche=$_POST['sujet'];
                $requette1="SELECT * FROM user where user_id<>'$_SESSION[user_id]' and name like '%$recherche%';"; 
				$resultat1=mysqli_query($link,$requette1);
				$table=array();
                while($data1=mysqli_fetch_assoc($resultat1)){
                    $nom1=$data1['name'];
                    $username1=$data1['username'];
                    $image1=$data1['photo'];
                    if($data1['biographie']!=NULL){
					$biographie1=$data1['biographie'];}
					$id=$data1['user_id'];
					array_push($table,$id);
					echo "<div class='container1'>
                    <img src='images/$image1' alt='profil' class='profil'/>
                    <div class='container2'> <span class='name2'>$nom1</span>
                    <img src='images/verified.png' class='verified'/></div></br>
                    <span class='username2'>$username1</span>
                    <span class='description2' >$biographie1</span>";?>
					
					<input type="submit"  name="<?php echo$id;?>" id="<?php echo$id;?>" class="follow" value="suivre"/>
			<?php } echo '</div>';
		
		foreach($table as $value){
			if(isset($_POST["$value"])){
			   $requette5="SELECT following_id,user_id FROM `following` WHERE user_id=$_SESSION[user_id] AND following_id='$value';";
			   $existe=mysqli_query($link,$requette5);
			   if(mysqli_fetch_assoc($existe)){
				   $requette3="DELETE FROM following WHERE following_id='$value' and user_id='$_SESSION[user_id]';";
				   $result2=mysqli_query($link,$requette3);
				   echo"<script>
                   localStorage.removeItem('suivre$value');
                   document.getElementById('$value').setAttribute('class','follow');
                   document.getElementById('$value').value='suivre';
				</script>";
					}
			   else{
			   $requette2="INSERT INTO following(following_id,user_id)VALUES('$value','$_SESSION[user_id]');";
			   $result=mysqli_query($link,$requette2);
			   echo"<script>
               localStorage.setItem('suivre$value','suivie')
               document.getElementById('$value').setAttribute('class','following');
               document.getElementById('$value').value='suivie';
			</script>";
			   }
		   }echo "<script> 
           if (localStorage.getItem('suivre$value')) {
            document.getElementById('$value').setAttribute('class','following');
            document.getElementById('$value').value='suivie';
               }</script>";}} ?>
            </article></section>
        </form>
    </body>
</html>

