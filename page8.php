<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=4.0, minimum-scale=0.5">
        <link href="css/inscription.css" rel="stylesheet" type="text/css"/>
        <style>
            .suivre{position: absolute;
    right: 15px;
    top: 20px;
    color:rgb(98, 59, 90);
    background-color: white;
    border-radius: 40px;
    height: 42px;
    width: 100px;
    outline: none;
    font-size: 20px;
    font-weight: bolder;
border: 2px solid rgb(98, 59, 90);}
.suivre:hover{background-color:rgb(98, 59, 90) !important;
color: white;
}
.suivie{
    position: absolute;
    right: 15px;
    top: 20px;
    color:white;
    background-color: #c77dff;
    border-radius: 40px;
    height: 42px;
    width: 100px;
    outline: none;
    border: none;
    font-size: 20px;
    font-weight: bolder;
}
.suivie:hover{background-color:#bc64ff !important;
}
        </style>
        <script type="text/javascript" src="javascript/signin.js">
             </script>
    </head>
    <body><div class="container0">
        <img src="images/LOGO.png" alt="logo" width="130" height="95" id="logo"/>
        <form action="" method="POST">
        <input type='button' onclick="location.href='accueil.php'"class="suivant" name="suivant" value="suivant">
        <span class="subject">Suggestions d'abonnements</span>
        <p>Quand vous suivez quelqu'un, vous voyez ses Tweets dans votre fil d'actualités.</p>
        <span class="titre" style="text-indent: 20px;">Vous pourriez être intéressé par</span>
        <?php $link = mysqli_connect("localhost","root","","wetweet") or die("Echec de connexion à la base");
             $requette="SELECT * FROM USER 
			 WHERE user.user_id<>'$_SESSION[user_id]'and
			  user.user_id in (SELECT following_id FROM following GROUP BY following_id 
			  HAVING COUNT(following_id)>=0 
			  ORDER BY COUNT(following_id) desc ) 
			  LIMIT 0,4;"; 
             $resultat=mysqli_query($link,$requette);
             $table=array();
             while($data=mysqli_fetch_assoc($resultat)){
                 $image=$data['photo'];
                 $nom = $data['name'];
                 $nom=trim($nom);
                 $username=$data['username'];
                 if($data['biographie']!=NULL){
                    $biographie=$data['biographie'];}
                 $id=$data['user_id'];
                array_push($table,$id);
            echo '<div class="container1">
            <img src="images/'.$image.'" alt="profil" class="profil"/>
            <div class="container2"> <span class="name">'.$nom.'</span>
            <img src="images/verified.png" id="verified"/></div></br>
            <span class="username">'.$username.'</span>
            <span class="description" >'.$biographie.'</span>';?>
            <input type="submit" id="<?php echo$id;?>" class="suivre"value="suivre" name="<?php echo$id;?>"/>
            <?php 
             }    echo '</div>';
            foreach($table as $value){
             if(isset($_POST["$value"])){
				$requette5="SELECT following_id,user_id FROM `following` WHERE user_id=$_SESSION[user_id] AND following_id='$value';";
				$existe=mysqli_query($link,$requette5);
				if(mysqli_fetch_assoc($existe)){
                    $requette3="DELETE FROM following WHERE following_id='$value' and user_id='$_SESSION[user_id]';";
					$result2=mysqli_query($link,$requette3);
						echo"<script>
						localStorage.removeItem('suivre$value');
                    document.getElementById('$value').setAttribute('class','suivre');
                    document.getElementById('$value').value='suivre';
					</script>";}
				else{
					echo"<script>
					localStorage.setItem('suivre$value','suivie')
                document.getElementById('$value').setAttribute('class','suivie');
                document.getElementById('$value').value='suivie';
                </script>";
                $requette2="INSERT INTO following(following_id,user_id)VALUES('$value','$_SESSION[user_id]');";
				$result=mysqli_query($link,$requette2);
				}
            }
            echo "<script> 
            if (localStorage.getItem('suivre$value')) {
                document.getElementById('$value').className ='suivie';
                document.getElementById('$value').value='suivie';
                }</script>";}
            ?>
        </form></div> 
    </body>
</html>
