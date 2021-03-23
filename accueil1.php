<?php session_start();
$link = mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
	if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0)
	{   
        session_start();
        $i = isset($_SESSION['i']) ? $_SESSION['i'] : 0;
        echo ++$i;
        $_SESSION['i'] = $i;
		$dossier= 'images/';
		$temp_name=$_FILES['fichier']['tmp_name'];
		if(!is_uploaded_file($temp_name))
		{
		exit("le fichier est untrouvable");
		}
		if ($_FILES['fichier']['size'] >= 1000000000){
			exit("Erreur, le fichier est volumineux");
		}
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png,jpeg,jpg)");
		}
		$nom_photo=$i.".".$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
		exit("Problem dans le telechargement de l'image, Ressayez");
		}
		$ph_name=$nom_photo;
	}
    if(isset($_POST['tweetbox'])){
        $tweet1=htmlspecialchars($_POST['tweetbox']);
        echo $tweet1;
    }
    
if(isset($_POST['tweet2'])){

    if(isset($tweet1) and isset($_FILES['fichier'])){ 
        if($tweet1!=NULL){
        $sql="INSERT INTO tweets(user_id,tweet,phototweet)VALUES('$_SESSION[user_id]','$tweet1','$ph_name');";}
    }
    if(isset($_FILES['fichier']) and !isset($tweet1)){
        $sql="INSERT INTO tweets(user_id,phototweet)VALUES('$_SESSION[user_id]','$ph_name');";
    }
    if(isset($tweet1) and !isset($_FILES['fichier'])){
        if($tweet1!=NULL){
        $sql="INSERT INTO tweets(user_id,tweet)VALUES('$_SESSION[user_id]','$tweet1');";}
    }
    
    if(isset($sql)){
     $resultat2=mysqli_query($link,$sql);
    $idtweet=mysqli_insert_id($link); 
    $sql0="SELECT username from user where user_id='$_SESSION[user_id]'";
    $resultat00=mysqli_query($link,$sql0);
    while($data0=mysqli_fetch_assoc($resultat00)){
        $pseudo=$data0['username'];
    }
    $sql00="UPDATE tweets SET retweeted_id='$idtweet$pseudo' WHERE user_id='$_SESSION[user_id]' AND tweet_id='$idtweet' ;";
    $insertion=mysqli_query($link,$sql00);}
    header('location: accueil1.php');
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
        <head>
            <title>Accueil</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
            <script src="javascript/home.js" type="text/javascript" >
        </script>
   
            <style>
            #filechosen{position: absolute;
            bottom: 10px;
            left: 65vh;
            color: #ce9ef3;
            visibility: hidden;
            width: 250px;
            border: none;
            outline: none;
            }
            #tweet{border-bottom: 12px solid rgb(231, 231, 231);}
            .container3{overflow: hidden;
                border-top: 1.5px solid rgba(243, 240, 240, 0.575);
                padding-top: 20px;
                padding-left: 20px;
                margin: 0;
                position: relative;
                }
            .container3:hover{background-color:rgba(235, 235, 235, 0.297) ;}
            .container3>a:first-of-type{margin-right: 5px;
                clip-path: circle();
                height: 65px;
                width: 65px;
                display: inline-block;
                position: relative;
                bottom: 10px;
                }
            .profil{margin-right: 10px;
            clip-path: circle();
            height: 65px;
            width: 65px;}
            .profil:hover{opacity: 0.85;}
            #infos{position: absolute;
            top: 10px;
            width: 100vh;
            left: 90px;}
            .names{font-size: 19px;
            font-weight: bolder;
            color: black;
            margin-left: 6px;}
            .usernames,.date{font-size: 17px;
                display: inline-block;
                color: rgb(121, 121, 121);
                margin-left: 5px;}
            .tweet{
                position: absolute;
                top: 40px;
                left: 96px;
                width: auto;
                height: auto;
                font-size: 22px;
                display: block;
                margin-bottom: 20px;
                }
                .attachedpic{margin-top: 30px;
                    width: 60vh;
                    height: 40vh;
                    margin-left: 20vh;
                    border-radius: 10px;
                }#containericons{padding-left: 50px;}
                #containericons .label{clip-path: circle();
                width: 45px;
                height: 45px;
                display: inline-block;
                }
                .label:hover{background-color: rgb(250, 237, 248);}
                #containericons img{vertical-align: bottom;
                width: 23px;
                height: 23px;
                position: relative;
                left: 11px;
                top: 10px;
                }
                .like,.retweet{display: inline-block;
                margin-left: 60px;
                margin-right: 60px;}
                .count{position: relative;
                top: 8px;
            left: 5px;}
            #retweetedmsg{
                position: absolute;
            top: 4px;
            width: 100vh;
            left: 90vh;
                color: firebrick;
            }
            #retweetedmsg img{
                width: 28px;
                height: 28px;
                display: inline-block;
                position: relative;
                top: 10px;
            }
		#container2{
			left: 90vh;
		}
		#container2 input{
			height: 36px;
			cursor: pointer;
		}
		
        #recherche{background-color: #ce9ef3;
        border: none;}
        #recherche::placeholder{color:white;}
            </style>
    </head>
    <body>
        <form name="my_form" id="my_form" action="" method="POST" enctype="multipart/form-data">
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
                <a href="" class="exist">Add an existing account</a>
                <a href="logout.php">Log out <?php echo $username; ?></a>
                <img src="images/triangle.png" >
            </div></div>
        </nav>
        <header>
            <span class="title">Accueil</span>
            <div id="container2">
            <input type="text" readonly onclick="location.href='explorer1.php';" name="sujet" id="recherche" placeholder="Rechercher sur WeTweet" />
            <img onclick="location.href='explorer1.php';" src="images/search.png" id="search" /></div>
            <a href="#"><img src="images/view.png" id="view"/></a>
            <div style="display: none;" id="derniers">voir les meilleurs Tweets en premier</div>
            <div style="display: none;" id="meilleurs">voir les derniers Tweets en premier</div>
        </header>
        <section>
            <div id="tweet">
                <a href="profile.php"><img src="images/<?php echo $image;?>" alt="photo"class="photoprofil" width="45" height="45"/></a>
                <textarea oninput=check_length(this.form) onKeyDown=check_length(this.form) name="tweetbox" id="tweeting" placeholder="Que ce passe-t-il?" maxlength="255"col="50"
                rows="4" ></textarea>
                <input size="1" value="255" name="counter" id="counter">
               <div id="icons">
                   <label for="fileinput">
                <a><img src="images/images.png" alt="images"  /></a></label><input type="file" onchange="document.getElementById('filechosen').style.visibility='visible';" name="fichier"id="fileinput"/>
                <a href=""><img src="images/gif.png" alt="gif" /></a>
                <a href=""><img src="images/poll.png" alt="poll"/></a>
                <a id="emoji" name="emoji"><img src="images/emoji.png" alt="emoji" /></a>
                    <div style="display: none;" id="emojis">Tapper sur WIN + . en windows</br>ou CTRL + CMD + SPACE en mac</div>
                <a onclick="myFunction1()"><img src="images/scedule.png" alt="scedule" /></a><input style="display: none;" type="date" id="datetweet" max="2021-5-31"/>
            </div><input id="filechosen" value="votre fichier a été choisi avec succès" readonly />
                <input type="submit" value="tweet" id="tweet2" name="tweet2"/>
                <div>

                </div>
            </div>
            <article>
                 <?php $requette1="SELECT retweeted_id,t.tweet_id,t.user_id,tweet,tweet_time,nbre_like,nbre_retweet,name,username,photo,phototweet,r.time_retweet
                        FROM tweets as t,retweet as r,user as u
                        WHERE t.tweet_id=r.tweet_id and u.user_id=t.user_id
                        UNION
                        SELECT retweeted_id,t.tweet_id,t.user_id,tweet,tweet_time,nbre_like,nbre_retweet,name,username,photo,phototweet,t.time_retweet
                       FROM tweets as t,following as f,user as u
                       WHERE t.user_id=f.following_id and f.user_id=$_SESSION[user_id] and u.user_id=t.user_id 
                       ORDER BY  time_retweet DESC, tweet_time DESC ;";
                        $requette2="SELECT tweet_id FROM tweets where tweet_id in (SELECT tweet_id from retweet)";
                     $resultat1=mysqli_query($link,$requette1);
                     $resultat2=mysqli_query($link,$requette2);
					 $table=array();
					 $table1=array();
					 $table2=array();
                        while($data2=mysqli_fetch_assoc($resultat2)){
							array_push($table,$data2['tweet_id']);
						}
                     $numrows=mysqli_num_rows($resultat1);
                     while($data1=mysqli_fetch_assoc($resultat1)){
                        $imagetweet=$data1['phototweet'];
                        $image1=$data1['photo'];
                        $nom1 = $data1['name'];
                        $nom1=trim($nom1);
                        $username1=$data1['username'];
                        $tweet=$data1['tweet'];
                        $time=$data1['tweet_time'];
                        $elapsedtime=timeElapsed($time);
                        $like=$data1['nbre_like'];
						$retweet=$data1['nbre_retweet'];
                        $id=$data1['tweet_id'];
                        $retweeted_id=$data1['retweeted_id'];
						array_push($table1,$id); 
						array_push($table2,$retweeted_id);
                        echo '<div class="container3">';
                        if(in_array($data1['tweet_id'],$table)){
                            echo '<div id="retweetedmsg"><img src="images/retweet.png" />you retweeted this</div>';
                        }
                        echo '
                        <a href="#"><img src="images/'.$image1.'" class="profil" alt="photo" width="40" height="40"/></a>
                        <div id="infos">
                        <span class="names">'.$nom1.'</span>
                        <span class="usernames">'.$username1.'</span>
                        <span class="date">.'.$elapsedtime.'</span></div>
                        <div class="tweet">'.$tweet.'</div>';
                        if($imagetweet!=NULL){
                           echo '<div>
                           <img class="attachedpic" src="images/'.$imagetweet.'"</div>';}
                        echo '
                        <div id="containericons">
                        <div class="like">
                        <span class="count">'.$like.'</span>';?>
                        <label class="label" for='<?php echo $id;?>' ><img  id='<?php echo 'img'.$id;?>' src="images/like.png" /></label>
						<input type="submit" id='<?php echo $id;?>' name='<?php echo $id;?>' class="like" style="display: none;"/>
						<?php echo '
                        </div>
                        <div class="retweet">
                        <span class="count">'.$retweet.'</span>';?>
                        <label class="label"for='<?php echo $retweeted_id?>'><img id='<?php echo 'img'.$retweeted_id;?>' src="images/retweet.png" /></label>
						<input type="submit" id='<?php echo $retweeted_id;?>' name='<?php echo $retweeted_id;?>' class="retweet" style="display: none;"/>
                    </div>
                        <label class="label" for="bookmark" style="margin-left: 60px;"><img src="images/addbookmark.png" /></label>
                        <input type="submit" id="bookmark" style="display: none;"/>
						</div></div></div>
				<?php 
                     }
                     if($numrows!=0){
                    }else { echo'<p align="center">Rechercher des personnes à suivre ou tweeter votre premier tweet
						</br>😊😊😊</p></br>';}
                        
                       ?>
			</article>
			
        </section>
        </form>
    </body>
</html>
<?php 
function timeElapsed($date){
    $months=array();
    for ($i=1; $i < 13; $i++) { 
        $month = date('F',mktime(0,0,0,$i));
        $months += [substr($month,0,3) => $i];
    }
    $date_year = date('Y', strtotime($date));//year of the date
    $date_month = date('m', strtotime($date));//month of the date
    $date_day = date('d', strtotime($date));//day of the date
    $date_hour = date('h', strtotime($date));//hour of the date
    $date_minute = date('i', strtotime($date));//minute of the date
    $current_year = date('Y');//current year(2019 in this case)

    //seconds passed between the given and current date
    $seconds_passed = round((time()-strtotime($date)),0);

    //minutes  passed between the given and current date
    $minutes_passed = round((time()-strtotime($date))/ 60,0);

    //hours passed between the given and current date
    $hours_passed = round((time()-strtotime($date))/ 3600,0);

    //days passed between the given and current date
    $days_passed = round((time()-strtotime($date))/ 86400,0);

    if($seconds_passed<60) return $seconds_passed." second".($seconds_passed == (1) ? " " : "s")." ago";
    //outputs 1 second / 2-59 seconds ago

    else if($seconds_passed>=60 && $minutes_passed<60) return $minutes_passed." minute".($minutes_passed == (1) ? " " : "s")." ago";
    //outputs 1 minute/ 2-59 minutes ago

    else if($minutes_passed>=60 && $hours_passed<24) return $hours_passed." hour".($hours_passed == (1) ? " " : "s")." ago";
    //outputs 1 hour / 2-23 hours ago

    else if($hours_passed>=24 && $days_passed<2) return "Yesterday at ".$date_hour.":".$date_minute;
    //outputs [Yesterday at 11:30] for example

    else{
        if($current_year!=$date_year){
            foreach($months as $month_name => $month_number){
                if($month_number==$date_month){
                    return $month_name." ".$date_day.", ".$date_year." ".$date_hour.":".$date_minute;
                    //echo $date_hour < (12) ? "AM" : "PM " ;
                    //outputs [Dec 11, 2018 11:32] for example
                }
            }
        }
        else{
            foreach($months as $month_name => $month_number){
                if($month_number==$date_month){
                    return $month_name." ".$date_day.", ".$date_hour.":".$date_minute;
                    //echo $date_hour < (12) ? "AM" : "PM " ;
                    //outputs [Dec 11, 11:32] for example
                }
            }
        }
    }
}
?>
     <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
	}
	window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#';
        window.location.reload();
    }
}
</script>
<script src="javascript/home.js" type="text/javascript" >
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
        $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
    }

    $(window).on("scroll", function() {
        localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
    });

  });
</script>
<?php
            if(isset($table1) and isset($table2)){
foreach($table1 as $tweetid){ 
							if(isset($_POST["$tweetid"])){ $b=1;
								$requette3="SELECT * FROM likedtweets WHERE tweet_id='$tweetid' and user_id='$_SESSION[user_id]';";
								$existe=mysqli_query($link,$requette3); 
					   if(mysqli_fetch_assoc($existe)){
						   $requette4="UPDATE tweets SET nbre_like=nbre_like-1 WHERE tweet_id='$tweetid';";
						   $requette6="DELETE from likedtweets where user_id='$_SESSION[user_id]' AND tweet_id='$tweetid';";
						   $resultat4=mysqli_query($link,$requette4);
						   $resultat6=mysqli_query($link,$requette6);
						   echo"<script> localStorage.removeItem('like$tweetid');
                            document.getElementById(\"img$tweetid\").src='images/like.png';
                            location.reload();
						</script>";
							}
					   else{$requette5="UPDATE tweets SET nbre_like=nbre_like+1 WHERE tweet_id='$tweetid';";
							$requette7="INSERT INTO likedtweets (user_id,tweet_id) VALUES ('$_SESSION[user_id]','$tweetid');";
							$resultat5=mysqli_query($link,$requette5);
							$resultat7=mysqli_query($link,$requette7);
							echo"<script> localStorage.setItem('like$tweetid','like')
                            document.getElementById(\"img$tweetid\").src='images/liked.png';  
                            location.reload(); 
						</script>";
					   }
                    }echo "<script> 
                    if (localStorage.getItem('like$tweetid')) {
                        document.getElementById(\"img$tweetid\").src='images/liked.png';  
                        }</script>";}
                    
                    foreach($table2 as $idretweeted){ 
                        if(isset($_POST["$idretweeted"])){
                            $sql7="SELECT tweet_id FROM tweets WHERE retweeted_id='$idretweeted';";
                            $resultsql7=mysqli_query($link,$sql7);
                            while($data3=mysqli_fetch_assoc($resultsql7)){
                                $retweetid=$data3['tweet_id'];
                            }
                            $sql1="SELECT * FROM retweet WHERE tweet_id='$retweetid' and user_id='$_SESSION[user_id]';";
                            $resultat0=mysqli_query($link,$sql1);
                   if(mysqli_fetch_assoc($resultat0)){
                       $sql2="UPDATE tweets SET nbre_retweet=nbre_retweet-1 WHERE tweet_id='$retweetid';";
                       $resultsql2=mysqli_query($link,$sql2);
                       $sql3="DELETE from retweet where user_id='$_SESSION[user_id]' AND tweet_id='$retweetid';";
                       $resultsql3=mysqli_query($link,$sql3);
                       $sql6="UPDATE tweets SET time_retweet=tweet_time WHERE tweet_id='$retweetid';";   
                       $resultsql6=mysqli_query($link,$sql6);
                       echo"<script>
                       localStorage.removeItem('image$idretweeted');
                        document.getElementById(\"img$idretweeted\").src='images/retweet.png';
                        location.reload(); 
                    </script>";
                        }
                   else{
                       $sql4="UPDATE tweets SET nbre_retweet=nbre_retweet+1 WHERE tweet_id='$retweetid';";
                       $resultsql4=mysqli_query($link,$sql4);
                        $sql5="INSERT INTO retweet (user_id,tweet_id) VALUES ('$_SESSION[user_id]','$retweetid');";
                        $resultsql5=mysqli_query($link,$sql5);
                        $sql8="SELECT time_retweet FROM retweet WHERE user_id='$_SESSION[user_id]' AND tweet_id='$retweetid';";
                        $resultsql8=mysqli_query($link,$sql8);
                        while($data4=mysqli_fetch_assoc($resultsql8)){
                           $retweettime=$data4['time_retweet'];
                        }
                        $sql9="UPDATE tweets SET time_retweet='$retweettime' WHERE tweet_id='$retweetid';";
                        $resultsql9=mysqli_query($link,$sql9);
                        echo"<script>
                        localStorage.setItem('image$idretweeted','retweeted')
                        document.getElementById(\"img$idretweeted\").src='images/retweeted.png';
                        location.reload(); 
                    </script>";
                   }
                }
                echo "<script> 
                if (localStorage.getItem('image$idretweeted')) {
                    document.getElementById(\"img$idretweeted\").src='images/retweeted.png';
                    }</script>";
            } 
        	}	?>