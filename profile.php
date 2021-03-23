<?php
session_start();
$link=mysqli_connect("localhost","root","","wetweet")
or die("echec de connexion a la base de donnees");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <style >
            body{
    margin: auto;
    width: 90%;
    border-right: 1.5px solid rgba(243, 240, 240, 0.575);
    height: 100vh;
    overflow: auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/*navigation bar*/
#logo{
    position: relative;
    left: -10px;
}

nav{
    float: left;
    display: inline;
    overflow: hidden;
    width: 20%;
    top: 0;
    border-right: 1.5px solid rgba(243, 240, 240, 0.575);
    height: 100vh;
    overflow-y: auto;
    position: relative;
}
nav a:not(:last-of-type):not(.exist){
    display: inline-block;
    width: auto;
    border-radius: 40px;
    height: 30px;
    text-decoration: none;
    font-weight: 700;
    font-size: 22px;
    color: rgb(43, 39, 39);
    padding: 9px 30px 10px 10px ;
    margin-left: 10px;
    }
.nav{width: 25px;
    height: 25px;
vertical-align: bottom;
display: inline-block;
margin-right: 25px;
}
#tweet1{
    width: 85%;
    margin-left: 10px;
    color: white;
    background-color: #c77dff;
    border: 0px;
    height: 57px;
    border-radius: 40px;
    text-transform: capitalize;
    font-weight: bolder;
    font-size: 18px;
    outline: none;
}
#tweet1:hover,#start:hover{background-color:#bc64ff;}
#logout{display: inline-block;
    width: 75%;
    border-radius: 60px;
    height: 50px;
    text-decoration: none;
    padding: 10px 40px 10px 15px;
    position: relative;
    }
nav>a:last-of-type img:nth-last-of-type(1){position: absolute;
    right: 15px;
    width: 20px;
    height: 7px;
top: 33px;}
nav>a:nth-last-of-type(1)>img:first-of-type{width: 65px;
    height: 55px;
    clip-path: circle();
    vertical-align: bottom;
    display: inline-block;
    position: absolute;
    left: 8px;
    top: 10px;
    }
.name{font-size: 19px;
    display: inline-block;
    vertical-align: top;
    position: absolute;
    top: 10px;
    left: 80px;
    font-weight: bolder;
    color: black;
        }
.username{font-size: 19px;
    display: inline-block;
    vertical-align: top;
    position: absolute;
    left: 80px;
    top: 33px;
    color: rgb(121, 121, 121);}
#container{position: relative;}
#dropbox{display: none;
    position: absolute;
top: -315px;
border-radius: 23px;
background-color: white;
width: 99%;
border:1px solid rgb(180, 180, 180);
box-shadow: 1.5px 1.5px 1.5px rgb(180, 180, 180);
}
#dropbox img:first-of-type{
    height: 55px;
    width: 65px;
    clip-path: circle();
    vertical-align: bottom;
    display: inline-block;
    position: relative;
    left: 8px;
    top: 12px;}
#dropbox .name{
top: 14px;}
#dropbox .username{top: 35px;
border-radius: none;}
#dropbox img:nth-last-of-type(2){
    position: absolute;
    right: 18px;
    width: 25px;
    height: 20px;
top: 28px;
}
#dropbox img:last-of-type{right: 15px;
    width: 25px;
position: absolute;
bottom: -18px;
left: 45%;
}
#dropbox a:hover{background-color:rgba(243, 240, 240, 0.473);
}
#dropbox a:first-of-type{margin-top: 15px;}
#dropbox a:last-of-type{margin-bottom: 10px;}
#dropbox a{text-decoration: none;
    color: black;
    display: inline-block;
    height: 40px;
    padding: 15px 20px ;
    width: 90%;
    font-size: 20px;
    border-top: 1.5px solid rgba(243, 240, 240, 0.575);
}
.bouton:hover{
    background-color: white;
}
#fleche
{
    display: flex;
    justify-content: space-between;
}
#fleche img
{
   position: relative;
   top: 25px;
   left: 10px;

}
#h2
{
    position: absolute;
    font-size: 19px;
    top:-5px;
    left: 390px;

}
h2 #ver
{
    position: relative;
    top: 4px;

}
.img1
{
    position: relative;
    top: -20px;
    width: 50%;
    height: 50%;
}
.img
{
    position: absolute;
    top: 200px;
    left:360px;
    border:2px solid #89608E;
    border-radius: 80px;
    height: 130px;
    width: 130px;
}
.img:hover
{
    transform: scale(1.2);
}
#img1
{
    height: 200px;
    width: 400px;
}
#nbr
{
    color: #778794;
    font-size: 15px;
    position: relative;
    top: -24px;
    left: 58px;
}
#nm
{
    position: relative;
    top:250px;
    left: 40px;
    font-size: 19px;

}
#login
{
    position: relative;
    top: 200px;
    left: 40px;
    color: #778794;
}
.h3
{
    position: relative;
    top: 189px;
    left: 40px;
    font-size: 15px;
    text-transform: capitalize;
}
.birth
{
    position: relative;
    top: 180px;
    left: 40px;
    color: #778794;
}
.abonne,.abonnement
{
    margin-right: 15px;
    position: relative;
    top: 190px;
    left: 40px;
    font-weight: bold;
}
#row5,#row6
{
    color: #7400b8;
}

#but
{
    text-decoration: none;
    position: relative;
    top: 40px;
    left: 230px;
    background-color: white;
    color: #735d78;
    font-weight: bold;
    border:1px solid #735d78;
    border-radius: 20px;
    padding: 10px;
}
#but:hover
{
    background-color: rgba(209, 179, 196,0.5);
}
.tw
{
   border-bottom: 2px solid #e5e5e5;
   width:636px;
   position: relative;
   top: 223px;
   left: 260px;
}
.tweets
{
    position: absolute;
    top: -43px;
    left: 275px;
    font-weight:600;
    border-bottom:2px solid #735d78;
    font-size: 19px;
    color: #735d78;
}

        #photo { display: none; }
        #img1 {
            border-radius: 0px;
            width: 43.7%;
            
            position: absolute;
            top: 70px;
            left: 332px;
            border: 2px solid #735d78;
        }
header
{
    border-right: 1px solid #e5e5e5;
   margin-right: 400px;
   height: 720px;
}
.tw1
{
    position: absolute;
    top: 530px;
    left: 410px;
    font-weight: bold;
}
.img2
{
    position:absolute;
    top: 4px;
    left:-50px;
    border:1px solid #89608E;
    border-radius: 80px;
    height: 40px;
    width: 40px;
}
.tw2
{
    position: absolute;
    top: 550px;
    left:410px;
}
        </style>
        <title>Profil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        
        <script src="javascript/home.js" type="text/javascript" ></script>
        
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
            <a href="messages.php" onmouseover="homeover3()" onmouseout="homeout3()"><img src="images/messages.png" id="mesgicon"
                class="nav" /><span id="mesg">Messages</span></a></br>
            <a href="signet.php" onmouseover="homeover4()" onmouseout="homeout4()"><img src="images/bookmarks.png" id="signicon"
                class="nav"/><span id="sign">Signets</span></a></br>
            <a href="listes.php" onmouseover="homeover5()" onmouseout="homeout5()"><img src="images/lists.png" id="listicon"
                class="nav" /><span id="list">Listes</span></a></br>
            <a><img src="images/profil2.png" id="profilicon"
                 class="nav"/><span id="profil" style="color: #87557d;">Profil</span></a></br>
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
            </div>
        </div> </nav>

        <header>   
          <div id="fleche">

        <a href="accueil.php"><img src="images/fleche.PNG"  alt="back" width="25" height="20" /> </a>
        <h2 id="h2"><?php 
            $sql="SELECT `name` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);
            $name=$row['name'];
            $_SESSION['name']=$name;
            echo $row['name'];
            ?><img src="images/verified.png" alt="verified" height="20" id="ver" width="20"/></h2>
    </div><br>
    <p id="nbr"> <?php
        $sql="SELECT COUNT(*) FROM tweets WHERE user_id='".$_SESSION['user_id']."'";
        $resultat=mysqli_query($link,$sql);
        $row1=mysqli_fetch_assoc($resultat);
        echo $row1['COUNT(*)'].' Tweets'.'';
        ?></p>
  <?php
  
     $sql00="SELECT `couverture` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
     $req=mysqli_query($link,$sql00);
     $roww=mysqli_fetch_assoc($req);
     $couverture=$roww['couverture'];
     if(empty($couverture)){
        echo"<img  src=\"images/anonymous.png\" id=\"img1\">";
     }else{
        echo"<img  src=\"images/$couverture\" id=\"img1\">";
     }
     ?>


    <?php

$sql0="SELECT `photo` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
$resu=mysqli_query($link,$sql0);
$row0=mysqli_fetch_assoc($resu);
$photo=$row0['photo'];
$_SESSION['photo']=$photo;
if ($photo=='inconnu.jpg') {
   echo"<img  src=\"images/photo.jpg\" class=\"img\">";
}
else{
echo"<img  src=\"images/$photo\" class=\"img\">";}

    ?>
    
     <h2 id="nm"><?php echo $name;
    ?> <img src="images/verified.png" alt="verified" height="20" id="ver" width="20"/></h2><br>
    <p id="login">
        <?php 
        $sql="SELECT `username` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
        $res=mysqli_query($link,$sql);
        $row2=mysqli_fetch_assoc($res);
        echo $row2['username'];?>
        <br>
        <?php
        $sql="SELECT `biographie` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
        $res1=mysqli_query($link,$sql);
        $row3=mysqli_fetch_assoc($res1);
        $_SESSION['biographie']=$row3['biographie'];
        echo '<p class="h3">'.$row3['biographie'].'</p>';
        $sql="SELECT `birthday` FROM `user` WHERE user_id='".$_SESSION['user_id']."'";
        $res2=mysqli_query($link,$sql);
        $row4=mysqli_fetch_assoc($res2);
        $_SESSION['birthday']=$row4['birthday'];
        echo'<span class="birth">Naissance le: '.$row4['birthday'].' </span>';
       ?>
       <br>
        <?php
        $sql="SELECT COUNT(following_id) FROM following WHERE user_id='".$_SESSION['user_id']."'";
        $res3=mysqli_query($link,$sql);
        $row5=mysqli_fetch_assoc($res3);
        echo '<span class="abonnement"><span id="row5">'.$row5['COUNT(following_id)'].'</span> abonnements</span>'.' ';
        $sql="SELECT COUNT(user_id) FROM following WHERE following_id='".$_SESSION['user_id']."'";
        $res4=mysqli_query($link,$sql);
        $row6=mysqli_fetch_assoc($res4);
        echo '<span class="abonne"><span id="row6">'.$row6['COUNT(user_id)'].' </span> abonnés</span>'.'';

        ?>
        
        <a href="edition.php" id="but">Éditer le profil</a><br>
        <div class="tw">
        <p class="tweets">Tweets</p>
       
        </div>
        <?php 
         $sql="SELECT COUNT(tweet) AS nb from tweets WHERE user_id='".$_SESSION['user_id']."'";
         $resu=mysqli_query($link,$sql);
         $row=mysqli_fetch_assoc($resu);
         $nb=$row['nb'];
        
         	
         
         	
        ?>

        <?php
        $sql="SELECT tweet FROM `tweets` WHERE user_id='".$_SESSION['user_id']."'";
        $requette=mysqli_query($link,$sql);
        
     while($row=mysqli_fetch_assoc($requette)) {
        	
        
       ?>
        	
        
        <div class="tw1">
        	<?php
        
           echo"<img  src=\"images/$photo\" class=\"img2\">";
           echo''.$name.'<br>';
          
        
        ?>
    </div>
    <div class="tw2">
    <?php
       echo''.$row['tweet'].'';

   } ?>
</div>


</header>
        
  
        
 


       



    

    
        
            
        
        
        </form>
    </body>
</html>

