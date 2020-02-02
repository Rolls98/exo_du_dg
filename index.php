<?php

    try{
        $db = new PDO("mysql:host=localhost;dbname=exo_nan;","root","");
        $sql = "SELECT * FROM videos";
        $req = $db->query($sql);
    }catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Video</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div>
            <h1>UPLOAD VIDEO</h1> 
        </div>
        <div class="videos">
            <?php while($row = $req->fetch()):?>
            <?php
            echo '<div>';
                echo'<video  controls>';
                    echo'<source src="'.$row["path"].'"></source>';
                echo '</video>';
                echo '<div class="info">';
                    echo '<h3>Titre : '.$row["titre"].'</h3>';
                    echo '<p class="descript"> <strong>Description : </strong><br>'.$row["description"].'</p>';
                    echo '<p>Taille :'.$row["taille"] .'mb</p>';
                    echo '<p>Durée :'.$row["duree"]."</p>";
                echo '</div>';
            echo '</div>';
            ?>
            <?php endwhile?>
             <!-- <div>
                <video  controls>
                    <source src="videos/videoplayback_6.mp4"></source>
                </video>
                <div class="info">
                    <h2>Titre</h2>
                    <p class="descript">La video de john</p>
                    <p>Taille : 5mb</p>
                    <p>Durée : 4min:05s</p>
                </div>
                
            </div>
            <div>
                <video  controls>
                    <source src="videos/videoplayback_6.mp4"></source>
                </video>
                <div class="info">
                    <h2>Titre</h2>
                    <p class="descript">La video de john</p>
                    <p>Taille : 5mb</p>
                    <p>Durée : 4min:05s</p>
                </div> 
            </div> -->
            <div id="btn">        
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>